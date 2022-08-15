<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddClientRequest extends FormRequest
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
            "name"=>"required",
            "gender"=>"required",
            "adress"=>"required",
            "birth_date"=>"required",
            "email"=>"required|email",
            "phone_number"=>"required",
            "trainer_name"=>"required",
            "subscription_id"=>"required",
            "subscription_type"=>"required"
        ];
    }

    public function messages (){
        return [
        "required" => "The value of the :Attribute is required!"
    ];
    }


}
