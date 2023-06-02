<?php

namespace App\Http\Requests\Initiator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cache;
use App\Models\Company;

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
        $rule_mobile_unique = '';
        $rule_phone_unique = '';
        $comp = Company::where('phone',$this->mobile)->first();
        if($comp){
            $rule_phone_unique = Rule::unique('companies', 'phone')->ignore($comp->id,'id');
            $rule_mobile_unique = Rule::unique('company_users', 'mobile')->ignore($comp->id,'company_id');
        }
       
 

        return [
            'name' => ['required',],
            'email' => ['required','email'],
            'country_code' => ['required'],
            'mobile' => ['required','numeric','digits_between:4,12',$rule_mobile_unique,$rule_phone_unique],
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
