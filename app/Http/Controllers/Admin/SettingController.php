<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditGovRequest;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Repository\PublicRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
   public function Social()
   {
       $setting=Setting::select('facebook','twitter','youtube','instagram','phone')->first();
       return view('admin.setting.social',compact('setting'));
   }

   public function edit(SettingRequest $request)
   {
       PublicRepository::update('Setting',1,$request->validated());
       return back()->with('success','Updated');
   }
}
