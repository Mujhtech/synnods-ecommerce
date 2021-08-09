<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyRequest extends FormRequest
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
            'email_code' => 'required',
            'sms_code' => 'required'
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
            'email_code.required' => 'The email verification code field is required',
            'sms_code.required' => 'The sms verification code field is required',
        ];
    }
}
