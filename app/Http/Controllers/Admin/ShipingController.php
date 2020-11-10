<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditShipingRequest;
use App\Repository\PublicRepository;
use App\Http\Controllers\Controller;


class ShipingController extends Controller
{
    public function index()
    {

        $shipings = PublicRepository::findAll('Shiping');
        return view('admin.shiping', compact('shipings'));
    }
    public function create(EditShipingRequest $request)
    {
//        dd($request->all());
        PublicRepository::save('Shiping', $request->validated());
        return back()->with('success', 'Created');
    }

    public function edit($id, EditShipingRequest $request)
    {
        PublicRepository::update('Shiping', $id, $request->validated());
        return back()->with('success', 'Updated');
    }

    public function delete($id)
    {
        if ($shipping=PublicRepository::findById('Shiping', $id)) {
            if($shipping->orders->count()>0){
                return back()->withErrors("Can't Delete This Shipping There Are Order Belongs To It");
            }
            PublicRepository::delete('Shiping', $id);
            return back()->with('success', 'Deleted');
        } else {
            return back()->withErrors('Not Found');
        }
    }
}
