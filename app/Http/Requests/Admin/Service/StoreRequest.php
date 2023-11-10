<?php

namespace App\Http\Requests\Admin\Service;

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
            'service' => 'required|unique:services,service|max:100',
            'category' => 'required',
            'des' => 'required ',
            'price' => 'required|max:1000000',
        ];
    }
    public function messages()
    {
        return [
            'service.required' => 'Vui lòng nhập tên dịch vụ',
             'service.max' => 'Vui lòng không nhập quá nhiều',
            'service.unique' => 'Dịch vụ đã tồn tại',
            'price.required' => 'Vui lòng nhập giá',
            'price.max' => 'Giá không được vượt quá 1000000',
            'category.required' => 'Vui lòng nhập Combo',
            'des.required' => ' Vui lòng nhập mô tả'

        ];
    }
}