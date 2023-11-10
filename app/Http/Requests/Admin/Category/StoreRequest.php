<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category'=>'required|unique:categories,category|max:100'
        ];
    }
    public function messages()
    {
        return[
            'category.required'=>'Vui lòng nhập tên',
            'category.unique'=>'Combo đã tồn tại',
            'category.max'=>'Vui lòng nhập combo hợp lệ'
        ];
    }
}
