<?php

namespace App\Http\Requests\Initiator;

use Illuminate\Foundation\Http\FormRequest;

class LogoUploadRequest extends FormRequest
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
            'logo_file' => ['required','mimes:jpeg,jpg,png','max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'logo_file.required' => 'Please upload logo.',
        ];
    }
}
