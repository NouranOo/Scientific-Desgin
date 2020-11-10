<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditCityRequest;
use App\Repository\PublicRepository;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function index()
    {
        $govs = PublicRepository::findAll('Government');
        $cities = PublicRepository::findAll('City', ['gov']);
        return view('admin.city', compact('govs', 'cities'));
    }

    public function create(EditCityRequest $request)
    {
        PublicRepository::save('City', $request->validated());
        return back()->with('success', 'Created');
    }

    public function edit($id, EditCityRequest $request)
    {
        PublicRepository::update('City', $id, $request->validated());
        return back()->with('success', 'Updated');
    }

    public function delete($id)
    {
        if (PublicRepository::findById('City', $id)) {
            PublicRepository::delete('City', $id);
            return back()->with('success', 'Deleted');
        } else {
            return back()->withErrors('Not Found');
        }
    }
}
