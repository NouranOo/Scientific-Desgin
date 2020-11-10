<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sitename_ar'=>'nullable|min:3|max:250',
            'sitename_en'=>'nullable|min:3|max:250',
            'logo'=>'nullable|image|mimes:jpg,jpeg,png,gif',
            'slider1'=>'nullable|image|mimes:jpg,jpeg,png,gif',
            'slider2'=>'nullable|image|mimes:jpg,jpeg,png,gif',
            'slider3'=>'nullable|image|mimes:jpg,jpeg,png,gif',
            'slider4'=>'nullable|image|mimes:jpg,jpeg,png,gif',
            'slider5'=>'nullable|image|mimes:jpg,jpeg,png,gif',
            'phone'=>'nullable|numeric|min:5',
            'email'=>'nullable|email|min:5|max:255',
            'address'=>'nullable|string|max:255',
            'lat'=>'nullable|string|max:255',
            'long'=>'nullable|string|max:255',
            'about_us'=>'nullable|string',
            'terms'=>'nullable|string',
            'policy'=>'nullable|string',
            'facebook'=>'nullable|url|max:225',
            'twitter'=>'nullable|url|max:225',
            'instagram'=>'nullable|url|max:225',
            'youtube'=>'nullable|url|max:225',
        ];
    }
}
