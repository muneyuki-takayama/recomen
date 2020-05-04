<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:30',
            'body' => 'required|max:500',
            'pic1' => 'required|file|image|mimes:jpeg,png.jpg,gif|max:5120',
            'pic2' => 'required|file|image|mimes:jpeg,png.jpg,gif|max:5120',
            'pic3' => 'required|file|image|mimes:jpeg,png.jpg,gif|max:5120',
        ];
    }

    public function attributes()
    {
        return [
            'required' => '必須項目です。',
            'title' => 'タイトル',
            'body' => 'コメント',
            'image' => '指定されたファイルが画像ではありません。',
            'mimes' => '指定された拡張子(PNG/JPG/GIF)ではありません。',
            'max' => '指定されたファイル容量(5M)を超えています。',
            
        ];
    }
}
