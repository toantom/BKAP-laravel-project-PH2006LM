<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInfoRequest extends FormRequest
{
    public function messages()
    {
        return [
            'name.required' => 'Tên đăng nhập không được để trống',
            'name.string' => 'Tên đăng nhập không đúng định dạng',
            'email.string'=> 'Email không đúng định dạng',
            'email.email'=> 'Email không đúng định dạng',
            'email.unique'=> 'Email đã được đăng ký',
            'phone.required'=> 'Số điện thoại không được để trống',
            'phone.min'=> 'Số điện thoại từ 10 đến 13 chữ số',
            'phone.max'=> 'Số điện thoại từ 10 đến 13 chữ số',
            'phone.unique'=> 'Số điện thoại đã được đăng ký',
            'address.required'=> 'Địa chỉ không được để trống',
            'address.string'=> 'Địa chỉ chứ ký tự đặc biệt',
            'birthday.required'=> 'Ngày sinh không được để trống',

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->id,
            'phone' => 'required|min:10|max:13|unique:users,phone,'.$this->id,
            'address'=>'required|string|max:255',
            'birthday'=>'required'
        ];
    }
}
