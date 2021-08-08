<?php

namespace App\Http\Requests\Api;

use App\Traits\ApiTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;


class StoreUserRequest extends FormRequest
{
    use ApiTrait;
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
        return[
            'first_name'=>'required|min:2|max:60',
            'last_name'=>'max:60',
            'email' => 'required|unique:App\Models\User,email',
            'phone_number'=>'nullable|min:11|numeric',
            'password' => 'required|confirmed',
            'address'=>'required',
            'nationality_id'=>'required|exists:nationalities,id',
            'has_wife'=>'boolean|nullable',
            'has_sons'=>'boolean|nullable',
            'has_driver'=>'boolean|nullable',
            'has_servant'=>'boolean|nullable',
        ];

    }

    public function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator,$this->returnValidationError($validator)) ;
    }


}
