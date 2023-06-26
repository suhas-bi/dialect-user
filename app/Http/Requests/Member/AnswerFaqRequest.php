<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AtLeastOneCheckboxSelected;

class AnswerFaqRequest extends FormRequest
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
            'answer' => ['required','max:255'],
        ];
    }

    public function messages()
    {
        return [
            'answer.required' => 'Please enter your answer.',
        ];
    }
}
