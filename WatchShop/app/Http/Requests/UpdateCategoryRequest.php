<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => 'required|unique:products,name,'.$this->id,
            'sku' => 'required|unique:products,sku,'.$this->id,
            'id_cate' => 'required',
            'avatar' => 'required',
            // 'avatars' => 'required',
            'type' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'discount' => 'nullable',
            'des' => 'required',
            'status' => 'required',           
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'sku.required' => 'Vui lòng nhập mã sản phẩm',
            'sku.unique' => 'Mã sản phẩm đã tồn tại',
            'id_cate.required' => 'Vui lòng chọn danh mục',
            'avatar.required' => 'Vui lòng chọn ảnh đại diện',
            // 'avatars.required' => 'Vui lòng chọn ảnh chi tiết',
            'type.required' => 'Vui lòng chọn kiểu dáng',
            'stock.required' => 'Vui lòng nhập tồn kho',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'des.required' => 'Vui lòng nhập miêu tả sản phẩm',
            'status.required' => 'Vui lòng chọn trạng thái sản phẩm'
        ];
    }
}
