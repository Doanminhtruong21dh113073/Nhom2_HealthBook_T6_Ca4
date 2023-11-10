<?php

namespace App\Http\Requests\Admin\Date_off;

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
            'barber' => 'required|max:100',
            'reason' => 'required|max:10000',
            'start_day' => 'required|date',
            'end_day' => 'required|date|after_or_equal:start_day',
        ];
    }
    
    public function messages()
    {
        return [
            'barber.max' => 'Vui lòng nhập tên hợp lệ',
            'barber.required' => 'Vui lòng nhập tên',
            'reason.required' => 'Vui lòng nhập lí do',
            'reason.max' => 'Viết ngắn gọn dùm cái',
            'start_day.required' => 'Vui lòng nhập ngày bắt đầu',
            'start_day.date' => 'Ngày bắt đầu không hợp lệ',
            'end_day.required' => 'Vui lòng nhập ngày kết thúc',
            'end_day.date' => 'Ngày kết thúc không hợp lệ',
            'end_day.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu',
        ];
    }
    
}