<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'nullable|email',
            'address' => 'required',
            'phone1' =>['required', 'numeric', 'digits:11','regex:/(01)[0-9]{8}/'],
            'phone2' =>['nullable', 'numeric', 'digits:11','regex:/(01)[0-9]{8}/'],
            'city_id' => ['required', 'exists:cities,id'],
        ];
    }
}
