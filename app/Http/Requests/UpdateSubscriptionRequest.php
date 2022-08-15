<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateSubscriptionRequest extends FormRequest
{
    public function authorize()
     {
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
             'description'=>"required",
             'price'=>"required",
             'services'=>"required"
         ];
     }
 
     public function messages (){
        return [
        "required" => "The value of the :Attribute is required!"
    ];
    }
 
}


