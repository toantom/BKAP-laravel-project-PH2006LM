<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'name' => 'required|unique:banners,name,'.$this->id,
            'image' => 'mimes:jpg,jpeg,png,gif',
            'title' => 'required',
            'content' => 'required',
            'status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên banner',
            'name.unique' => 'Tên banner này đã tồn tại',
            'title.required' => 'Vui lòng nhập tiêu đề banner',
            'content.required' => 'Vui lòng nhập nội dung banner',
            'status.required' => 'Vui lòng chọn trạng thái',
            'image.required' => 'Vui lòng chọn ảnh cho danh mục',
            'image.mimes' => 'Ảnh phải có định dạnh jpeg,png,gif',
        ];
    }
}
