<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            'email' => 'required|unique:App\Models\Admin,email',
            'phone'=>'nullable|min:11|numeric',
            'password' => 'required|confirmed',
            'roles' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'An email is required',
            'email.unique' => 'This email has already been used',
            'password.required' => 'A password is required',
            'password.confirmed' => 'The passwords do not match',
        ];
    }
}
