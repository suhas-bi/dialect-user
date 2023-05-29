<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AtLeastOneCheckboxSelected implements Rule
{
    public function passes($attribute, $value)
    {
        return is_array($value) && count(array_filter($value)) > 0;
    }

    public function message()
    {
        return 'At least one checkbox must be selected.';
    }
}
