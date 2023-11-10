<?php

namespace App\Http\Requests\Admin\Bill;

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
            'name'=>'required',
            'product'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'product.required'=>'Vui lòng chọn đối tượng',
            'name.required'=>'Vui lòng chọn Barber',
        ];
    }
}
