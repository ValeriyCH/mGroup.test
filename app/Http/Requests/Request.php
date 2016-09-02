<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    public function rules()
    {
        return [
            'name'     =>  'required|email|unique:users',
            'password'  =>  'required|min:6|confirmed',
            'company_name' => 'required',
            'email'      =>  'required',
        ];
    }

}
