<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    public function messages()
    {
        return [
            'name.required' => 'Tên người nhận không được để trống',
            'name.string' => 'Tên người nhận không đúng định dạng',
            'image.required'=>'Ảnh sản phẩm không được để trống',
            'image.mimes'=>'Ảnh không đúng định dạng',
            'content.required'=>'Nội dung không được để trống',
            'content.max'=>'Nội dung không quá 225 ký tự'

        ];
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'content'=>'required|max:255'
        ];
    }
}
