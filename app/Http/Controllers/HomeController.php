<?php

namespace App\Http\Controllers;

use App\Helper\OrderStatus;
use App\Helper\PostHelper;
use App\Helper\UsersStatus;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\OrderWithPhoneRequest;
use App\Models\Balance;
use App\Models\Category;
use App\Models\City;
use App\Models\ContactUs;
use App\Models\Government;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Supplier;
use App\Repository\PublicRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $phones = Order::where('status', '!=', OrderStatus::Completed)->get();
        $govs = PublicRepository::findAll('Government');
        $cities = PublicRepository::findAll('City');
        $products = PublicRepository::findAll('Product');
        $setting = Setting::first();
        return view('front.home', compact('govs', 'cities', 'products', 'phones', 'setting'));
    }

    public function getCity($id)
    {
        return City::where('gov_id', $id)->get();
    }

    public function createOrder(OrderRequest $request)
    {
        if ($oldOrder = Order::where(['phone1' => $request->phone1, 'status' => OrderStatus::Pending])
            ->latest()->first()) {
            PublicRepository::delete('Order', $oldOrder->id);
        }
        $data = $request->except('_token', 'qty', 'product_id');
        DB::beginTransaction();
        $order = PublicRepository::save('Order', $data);
        $gov = PublicRepository::findById('City', $request->city_id, ['gov']);
        $govPrice = $gov->gov->delivery;
        $arr = [];
        foreach ($request->qty as $key => $value) {
            if ($value <= 0) {
                continue;
            }
            if ($value >= 10) {
                $govPrice = 0;
            }
            $pro['product_id'] = $request->product_id[$key];
            $product = PublicRepository::findById('Product', $pro['product_id']);
            $pro['qty'] = $value;
            $pro['order_id'] = $order->id;
            $pro['price'] = (floor($value / 10) * 225) + (($value % 10) * $product->price);
            $pro['created_at'] = Carbon::now();
            $pro['updated_at'] = Carbon::now();
            array_push($arr, $pro);
        }
        if (count($arr) == 0) {
            return back()->withErrors('من فضلك ادخل عدد المساطر');
        }
        OrderProduct::insert($arr);
        $order['total_price'] = $order->products->sum('price') + $govPrice;
        $order['delivery_price'] = $govPrice;
        $order->save();
        DB::commit();
        return back()->with('success', 'تم طلب الاوردر بنجاح');
    }

    public function orderDetails(OrderWithPhoneRequest $request)
    {
        $order = Order::with('city', 'city.gov')->where(['phone1' => $request->phone])
            ->whereNotIn('status', [OrderStatus::Completed])->latest()->first();
        return view('front.orderDetails', compact('order'));
    }
}
