<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
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
            'image' => ['required', 'image', 'max:5120'],
            'category_id' => ['required', 'array', 'min:1'],
            'category_id.*' => ['required'],
            'condition_id' => ['required'],
            'brand' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required','numeric', 'digits_between:3,6'],
        ];
    }

    public function messages()
    {
        return [
            'image.required' => '画像を選択してください',
            'image.image' => '画像形式のファイルを選択してください',
            'image.max' => '5MB以内の画像を選択してください。',

            'category_id.required' => 'カテゴリーを選択してください。',
            'category_id.array' => 'カテゴリーは配列形式で指定してください。',
            'category_id.*.required' => '選択されたカテゴリーが無効です。',

            'condition_id.required' => '商品の状態を選択してください',

            'brand.required' => 'ブランドを入力してください',
            'brand.string' => 'ブランドを文字列で入力してください',
            'brand.max' => 'ブランドを255文字以下で入力してください',

            'name.required' => '名前を入力してください',
            'name.string' => '名前を文字列で入力してください',
            'name.max' => '名前を255文字以下で入力してください',

            'description.required' => '商品の説明を入力してください',
            'description.string' => '商品の説明を文字列で入力してください',
            'description.max' => '商品の説明を255文字以下で入力してください',

            'price.required' => '販売価格を入力してください',
            'price.numeric' => '販売価格を数値で入力してください',
            'price.digits_between'  => '100円〜999,999円の範囲で入力してください',
        ];
    }
}
