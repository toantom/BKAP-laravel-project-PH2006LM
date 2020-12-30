<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    
    public function messages()
    {
        return [
            'name.required' => 'Tên người nhận không được để trống',
            'name.string' => 'Tên người nhận không đúng định dạng',
            'email.required'=> 'Email không được để trống',
            'email.email'=> 'Email không đúng định dạng',
            'phone.required'=> 'Số điện thoại không được để trống',
            'phone.min'=> 'Số điện thoại từ 10 đến 13 chữ số',
            'phone.max'=> 'Số điện thoại từ 10 đến 13 chữ số',
            'address_ship.required'=> 'Địa chỉ không được để trống',
            'address_ship.string'=> 'Địa chỉ chứa ký tự đặc biệt',

        ];
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|min:10|max:13',
            'address_ship'=>'required|string|max:255',
        ];
    }
}
