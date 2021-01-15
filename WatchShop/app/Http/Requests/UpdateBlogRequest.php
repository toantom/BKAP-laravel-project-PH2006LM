<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'name' => 'required|unique:blogs,name,'.$this->id,
            'id_cate' => 'required',
            'content' =>'required',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên bài viết',
            'name.unique' => 'Tên blog này đã tồn tại',
            'id_cate' => 'Vui lòng chọn danh mục cho bài viết',
            'content.required' => 'Vui lòng nhập nội dung bài viết',
            'status.required' => 'Vui lòng chọn trạng thái',
            'image.mimes' => 'Ảnh phải có định dạnh jpeg,png,gif',
        ];
    }
}
