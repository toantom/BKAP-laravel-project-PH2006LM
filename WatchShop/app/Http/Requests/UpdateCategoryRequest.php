<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'name' => 'required|max:100|unique:categories,name,'.$this->id,
            'status'=> 'required',
            'image' => 'mimes:jpg,jpeg,png,gif',
            
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'name.unique' => 'Tên danh mục này đã tồn tại',
            'name.max' => 'Tên danh mục không quá 100 kí tự',
            'status.required' => 'Vui lòng chọn trạng thái',
            'image.mimes' => 'Ảnh phải có định dạnh jpeg,png,gif',
        ];
    }
}
