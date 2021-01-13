<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function messages()
    {
        return [
            'name.required' => 'Tên người nhận không được để trống',
            'name.string' => 'Tên người nhận không đúng định dạng',
            'phone.required'=> 'Số điện thoại không được để trống',
            'phone.min'=> 'Số điện thoại từ 10 đến 13 chữ số',
            'phone.max'=> 'Số điện thoại từ 10 đến 13 chữ số',
            'content.required'=>'Nội dung không được để trống',
            'content.max'=>'Nội dung không quá 225 ký tự'

        ];
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|min:10|max:13',
            'content'=>'required|max:255'
        ];
    }
}
