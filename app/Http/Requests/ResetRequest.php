<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest
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
            'token' => 'required|min:60|max:60',
            'password' => 'required|min:6|confirmed',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'token.required' => 'Invalid token',
            'token.min' => 'Invalid token',
            'token.max' => 'Invalid token',
            'password.required' => 'The password field is required',
            'password.min' => 'The password must be at least :min characters', ['min' => 6],
            'password.confirmed' => 'The password confirmation does not match',
        ];
    }
}
