<?php

namespace App\Http\Requests\Client\Booking;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_name' => 'required|string|max:255',
            'customer_address' => 'nullable|string',
            'customer_phone' => 'required|string',
            'note' => 'nullable|string',
            'date_booking' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'category_id' => 'required|exists:categories,id',
            'service_id' => 'required|exists:services,id',
        ];
    }
    public function messages()
    {
        return [
            'customer_name.required' => 'Tên khách hàng là trường bắt buộc.',
            'customer_name.string' => 'Tên khách hàng phải là chuỗi.',
            'customer_name.max' => 'Tên khách hàng không được vượt quá :max ký tự.',

            'customer_email.email' => 'Email phải là định dạng hợp lệ.',
            'customer_address.string' => 'Địa chỉ phải là chuỗi.',
            'customer_phone.required' => 'Số điện thoại là trường bắt buộc.',
            'customer_phone.string' => 'Số điện thoại phải là chuỗi.',

        
            'note.string' => 'Ghi chú phải là chuỗi.',
            'date_booking.required' => 'Ngày đặt lịch là trường bắt buộc.',
            'date_booking.date' => 'Ngày đặt lịch phải là ngày hợp lệ.',
            'appointment_time.required' => 'Thời gian hẹn là trường bắt buộc.',
            'appointment_time.date_format' => 'Thời gian hẹn phải theo định dạng H:i.',

            'category_id.required' => 'Danh mục là trường bắt buộc.',
            'category_id.exists' => 'Danh mục không tồn tại.',
            'service_id.required' => 'Dịch vụ là trường bắt buộc.',
            'service_id.exists' => 'Dịch vụ không tồn tại.',
        ];
    }

}
