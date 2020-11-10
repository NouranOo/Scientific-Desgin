<?php

namespace App\Http\Requests;



use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class ContactusRequest extends FormRequest
{
    use CustomError;
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
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];
    }
//    protected function failedValidation(Validator $validator)
//    {
//        if ($this->expectsJson()) {
//            $errors = (new ValidationException($validator))->errors();
//            $new2=[];
//            foreach ($errors as $key=>$value){
//                foreach ($value as $k=>$v){
//                    array_push($new2,$v);
//                }
//            }
//            throw new HttpResponseException(
//                response()->json(['code'=>422,'errors' => $new2], 422)
//            );
//        }
//        parent::failedValidation($validator);
//    }
}
