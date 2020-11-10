<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditGovRequest;
use App\Repository\PublicRepository;
use App\Http\Controllers\Controller;

class GovController extends Controller
{
   public function index()
   {
       $govs=PublicRepository::findAll('Government');
       return view('admin.gov',compact('govs'));
   }

   public function edit($id,EditGovRequest $request)
   {
       PublicRepository::update('Government',$id,$request->validated());
       return back()->with('success','Updated');
   }
}
