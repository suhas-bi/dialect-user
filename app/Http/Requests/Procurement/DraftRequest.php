<?php

namespace App\Http\Requests\Procurement;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AtLeastOneCheckboxSelected;

class DraftRequest extends FormRequest
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
            'subject' => ['nullable','max:255'],
            'body' => ['nullable','max:255'],
            'country_id' => ['nullable'],
            'region_id' => ['nullable'],
            'expired_at' => ['nullable']
        ];
    }

    public function messages()
    {
        return [
            'subject.required' => 'Please enter subject line',
            'body.required' => 'Please enter you content',
            'country_id.required' => 'Please choose your country',
            'region_id.required' => 'Please choose a region',
            'expired_at.required' => 'Please choose a timeframe'
        ];
    }
}
