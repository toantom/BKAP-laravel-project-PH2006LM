<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'name' => 'required|unique:categories|max:100',
            'status'=> 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'slug' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'name.unique' => 'Tên danh mục này đã tồn tại',
            'name.max' => 'Tên danh mục không quá 100 kí tự',
            'status.required' => 'Vui lòng chọn trạng thái',
            'image.required' => 'Vui lòng chọn ảnh cho danh mục',
            'image.mimes' => 'Ảnh phải có định dạnh jpeg,png,gif',
            'slug.required' => 'Vui lòng nhập đường dẫn'
        ];
    }
}
