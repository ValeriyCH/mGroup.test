<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;


class ProjectRequest extends Request
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
        $rules = [
            'name' => 'required|min:3',
            'role_id' => 'required',
            'people_count' => 'required',
            'talent_id' => 'required',
            'date_start' => 'required',
        ];
        if (Auth::check()) {
            unset($rules['role_id']);
        }
        return $rules;

    }
}
