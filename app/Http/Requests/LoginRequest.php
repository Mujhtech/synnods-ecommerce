<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            //
            'password' => 'required|string',
            'email' => 'required|email',
            'remember_me' => 'boolean'
        ];
    }

    public function messages(){
        return [
            'password.required' => 'Password is required',
            'password.string' => 'Password must be a character',
            'email.required' => 'Email address is required',
            'email.email' => 'Incorrect email address'
        ];
    }
}
