<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'first_name'=>'required|min:5|max:60',
            'last_name'=>'max:60',
            'email' => 'required|unique:App\Models\User,email',
            'phone_number'=>'nullable|min:11|numeric',
            'password' => 'nullable|confirmed',
            'address'=>'required',
            'gender'=>'required',
            'nationality_id'=>'required|exists:nationalities,id',
            'date1'=>'nullable',
            'date2'=>'nullable',
            'date3'=>'nullable',
            'date4'=>'nullable',
            'has_wife'=>'boolean|nullable',
            'has_sons'=>'boolean|nullable',
            'has_driver'=>'boolean|nullable',
            'has_servant'=>'boolean|nullable',
            'personalCard'=>'nullable | mimes:jpeg,jpg,png | max:1000',
            'birth'=>'nullable | mimes:jpeg,jpg,png | max:1000',
            'residence'=>'nullable | mimes:jpeg,jpg,png | max:1000',
        ];
    }
}
