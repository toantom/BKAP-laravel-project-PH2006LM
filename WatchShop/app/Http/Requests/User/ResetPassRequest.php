<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ResetPassRequest extends FormRequest
{
    public function messages()
    {
        return [
            'password.required' => 'Mật khẩu không được để trống',
            'password.string' => 'Mật khẩu không đúng định dạng',
            'password.min' => 'Mật khẩu cần ít nhất 8 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
            'email.required'=> 'Email không được để trống',
            'email.string'=> 'Email không đúng định dạng',
            'email.email'=> 'Email không đúng định dạng',
            'email.exists'=> 'Email không tồn tại trong hệ thống',
            'phone.required'=> 'Số điện thoại không được để trống',
            'phone.min'=> 'Số điện thoại từ 10 đến 13 chữ số',
            'phone.max'=> 'Số điện thoại từ 10 đến 13 chữ số',
            'phone.exists'=> 'Số điện thoại không tồn tại trong hệ thống',

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email|max:255|exists:users',
            'password' =>'required|string|min:8|confirmed',
            'phone' => 'required|min:10|max:13|exists:users',
        ];
    }
}
