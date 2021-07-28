<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreFamilyRequest extends FormRequest
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
            //your other rules go here
        ];
        $events = $this->input( 'first_name' );

        if ( !empty( $events ) )
        {
            foreach ( $events as $key => $event ) // add individual rules to each image
            {
                $rules[ sprintf( 'first_name.%d', $key ) ] = 'required';
            }
        }
        return $rules;

    }
}
