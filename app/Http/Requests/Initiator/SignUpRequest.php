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
            'phone' => ['required'],
            'country_id' => ['required'],
            'pobox' => ['required'],
        ];
    }
}
