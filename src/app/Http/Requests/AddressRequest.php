<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NumericStringRule;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'postal_code' => ['required', new NumericStringRule],
            'address' => ['required', 'string',  'max:255'],
            'building' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'postal_code.required' => '郵便番号を入力してください',
            'postal_code.numeric_string' => '数字7文字で入力してください（ハイフンは不要です）',

            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'address.max' => '住所を255文字以下で入力してください',

            'building.string' => '建物名を文字列で入力してください',
            'building.max' => '建物名を255文字以下で入力してください',
        ];
    }
}
