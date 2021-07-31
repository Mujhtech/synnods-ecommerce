<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'user_name' => 'required|string|min:8|unique:users'
        ];
    }

    public function messages(){
        return [
            'password.required' => 'Password is required',
            'password.string' => 'Password must be a character',
            'email.required' => 'Email address is required',
            'email.email' => 'Incorrect email address',
            'email.unique' => 'Email already exist',
            'last_name.required' => 'Last name is required',
            'last_name.string' => 'Last name must be a character',
            'first_name.required' => 'Last name is required',
            'first_name.string' => 'Last name must be a character',
            'user_name.required' => 'User name is required',
            'user_name.string' => 'User name must be a character',
            'user_name.min' => 'User name must be 8 character',
            'user_name.unique' => 'Username already exist',
        ];
    }
}
