<?php

namespace App\Http\Requests\Initiator;

use Illuminate\Foundation\Http\FormRequest;

class DocumentUploadRequest extends FormRequest
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
            'document_file' => ['required','mimes:jpeg,jpg,png,pdf','max:4096'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your company name',
            'pobox.required' => 'Please enter your PO Box No.',
            'country_id.required' => 'Please choose your country',
            'address.required' => 'Please enter your address',
            'zone.required' => 'Please enter your zone no.',
            'street.required' => 'Please enter your street.',
            'building.required' => 'Please enter your zone no.',
            'unit.required' => 'Please enter your zone no.',
            'region_id.required' => 'Please enter your zone no.',
            'domain.required' => 'Please enter your website address.',
            'country_code.required' => 'Please enter your country code.',
            'fax.required' => 'Please enter your fax no.',
            'logo.required' => 'Please upload your  logo.',
            'document_no.required' => 'Please enter your document no.',
            'expiry_date.required' => 'Please enter your document expiry date.',
            'file.required' => 'Please upload document.',
        ];
    }
}
