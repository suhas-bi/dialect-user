<?php

namespace App\Http\Requests\Procurement;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AtLeastOneCheckboxSelected;

class NewMemberRequest extends FormRequest
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
            'name' => ['required','max:255'],
            'email' => ['required','email','unique:company_users,email','max:255'],
            'approval_status' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter name',
            'email.required' => 'Please enter email address',
            'approval_status.required' => 'Please choose enquiry permission',
        ];
    }
}
