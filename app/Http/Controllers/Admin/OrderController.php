<?php

namespace App\Http\Controllers\Admin;

use App\Helper\OrderStatus;
use App\Helper\ShippingStatus;
use App\Http\Requests\EditOrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Repository\PublicRepository;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index($status=null)
    {
        $govs=PublicRepository::findAll('Government');
        $cities=PublicRepository::findAll('City');
        $pros=PublicRepository::findAll('Product');
        $shipings = PublicRepository::findWhere('Shiping',['active'=> ShippingStatus::Active]);
        if(isset($status)){
            $orders = PublicRepository::findWhere('Order',['status'=>$status],['products','products.product','city','city.gov']);
        }else{
            $orders = PublicRepository::findAll('Order',['products','products.product','city','city.gov']);
        }
        return view('admin.order', compact('govs','orders','cities','pros','shipings'));
    }

    public function edit($id,EditOrderRequest $request)
    {

        $data = $request->except('_token', 'qty', 'product_id');
        if($data['status'] == OrderStatus::Delivery){
            $order = Order::where('id',$id)->first();
            $order->shipment_date = Carbon::now();
            $order->save();

        }elseif ($data['status'] == OrderStatus::Completed){
            $order = Order::where('id',$id)->first();
            $order->delivery_date = Carbon::now();
            $order->save();


        }

        DB::beginTransaction();
        $order = PublicRepository::update('Order',$id, $data);
        $gov=PublicRepository::findById('City',$request->city_id,['gov']);
        $govPrice=$gov->gov->delivery;
        $arr=[];
        $order->products()->delete();
        foreach ($request->qty as $key => $value) {
            if ($value <= 0) {
                continue;
            }
            if($value>=10){
                $govPrice=0;
            }
            $pro['product_id'] = $request->product_id[$key];
            $product = PublicRepository::findById('Product', $pro['product_id']);
            $pro['qty'] = $value;
            $pro['order_id'] = $order->id;
            $pro['price'] = (floor($value / 10) * 225) + (($value % 10) * $product->price);
            $pro['created_at']=Carbon::now();
            $pro['updated_at']=Carbon::now();
            array_push($arr,$pro);
        }
        OrderProduct::insert($arr);
        $order['total_price']=$order->products->sum('price')+$govPrice;
        $order['delivery_price']=$govPrice;
        $order->save();
        DB::commit();
        return back()->with('success', 'Update');
    }

    public function delete($id)
    {
        if (PublicRepository::findById('Order', $id)) {
            PublicRepository::delete('Order', $id);
            return back()->with('success', 'Deleted');
        } else {
            return back()->withErrors('Not Found');
        }
    }

    public function editOrders(Request $request)
    {
        if($request->order_id[0]==null){
            return back()->withErrors('Please Select Orders First');
        }
        if($request->status==OrderStatus::Completed){
            $data['delivery_date']=Carbon::now();
        }
        $data['status']=$request->status;
        if($request->shiping_id){
        $data['shiping_id']=$request->shiping_id;
        $data['shipment_date']=Carbon::now();
        }
        foreach (explode(',' , $request->order_id[0]) as $order_id){
            PublicRepository::update('Order',$order_id,$data);
        }
        return back()->with('success','Done');

    }

    public function filter(Request $request)
    {
        $govs=PublicRepository::findAll('Government');
        $cities=PublicRepository::findAll('City');
        $pros=PublicRepository::findAll('Product');
        $shipings = PublicRepository::findWhere('Shiping',['active'=> ShippingStatus::Active]);
        $orders=Order::with('products','products.product','city','city.gov');
        if($request->status){
            $orders=$orders->where('status',$request->status);
        }
        if($request->gov){
            $orders=$orders->whereHas('city',function ($q) use ($request){
                $q->where('gov_id',$request->gov);
            });
        }
        if($request->date){
            $orders=$orders->whereDate('created_at',$request->date);
        }
        if($request->shipping_date){
            $orders=$orders->whereDate('shipment_date',$request->shipping_date);
        }
        if($request->price){
            $orders=$orders->where('total_price','>=',$request->price);
        }
        if($request->shipping_id){
            $orders=$orders->where('shiping_id',$request->shipping_id);
        }
        $orders=$orders->get();
        return view('admin.order', compact('govs','orders','cities','pros','shipings'));
    }
}
