<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NumericStringRule implements Rule
{
    public function passes($attribute, $value)
    {
        return is_string($value) && preg_match('/^[0-9]{7}$/', $value);
    }

    public function message()
    {
        return '数字7文字で入力してください（ハイフンは不要です）';
    }
}
