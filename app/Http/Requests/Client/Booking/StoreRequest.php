<?php

namespace App\Http\Requests\Client\Booking;

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
            'phone' => 'required|regex:/^0\d{9}$/',
            'service' => 'required',
            'barber' => 'required',
            'date' => 'required',
            'customer' => 'required|max:100',
            'email' => 'required|max:100'
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.regex' => 'Số điện thoại không hợp lệ. Số điện thoại phải bắt đầu bằng số 0 và có đúng 10 chữ số.',
            'service.required' => 'Vui lòng chọn dịch vụ',
            'barber.required' => 'Vui lòng chọn Barber',
            'date.required' => 'Vui lòng chọn thời gian',
            'customer.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'customer.max' => ' Vui lòng nhập tên hợp lệ',
            'email.max' => ' VUi lòng nhập email hợp lệ'

        ];
    }
}
