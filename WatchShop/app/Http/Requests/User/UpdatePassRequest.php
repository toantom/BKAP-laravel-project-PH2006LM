<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassRequest extends FormRequest
{
    public function messages()
    {
        return [
            'password.required' => 'Mật khẩu không được để trống',
            'password.string' => 'Mật khẩu không đúng định dạng',
            'password.min' => 'Mật khẩu cần ít nhất 8 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
            'old_password.required' => 'Mật khẩu không được để trống',
            'old_password.string' => 'Mật khẩu không đúng định dạng',
            'old_password.min' => 'Mật khẩu cần ít nhất 8 ký tự',
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
            'old_password' =>'required|string|min:8',
            'password' =>'required|string|min:8|confirmed',
        ];
    }
}
