<?php

namespace App\Http\Requests\Initiator;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required',],
            'email' => ['required','email'],
            'country_code' => ['required'],
            'mobile' => ['required','unique:company_users,mobile','numeric','digits_between:4,12'],
            'country_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your company name',
            'country_id.required' => 'Please choose your country',
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address',
            'mobile.required' => 'Please enter your mobile no.',
        ];
    }
}
