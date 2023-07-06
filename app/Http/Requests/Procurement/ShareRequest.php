<?php

namespace App\Http\Requests\Procurement;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AtLeastOneCheckboxSelected;

class ShareRequest extends FormRequest
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
            'shared_to' => ['required'],
            'share_priority' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'shared_to.required' => 'Please select a team member.',
            'share_priority.required' => 'Please select priority.',
        ];
    }
}
