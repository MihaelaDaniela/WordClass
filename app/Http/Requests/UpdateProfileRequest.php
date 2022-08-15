<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(){
        if(Auth::check())
        {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'name'=> "required",
            'email'=>"required",
            'adress'=>"required",
            'gender'=>"required",
            'birth_date'=>"required",
            "user_type"=>"required",
            "uploadFile"=>"required|file|mimes:jpeg,png,jpg,gif,svg,JPG"
            
        ];
    }

    public function messages (){
       return [
       "required" => "The value of the :Attribute is required!"
   ];
   }
}
