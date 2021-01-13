<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'price' => 'required',
            'quantity'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'quantity.required' => 'Vui lòng nhập số lượng sản phẩm',
        ];
    }
}
