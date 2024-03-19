<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherApplyRequest extends FormRequest
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
            'code' => 'required|exists:vouchers,code_voucher',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Kode voucher harus diisi',
            'code.exists' => 'Kode voucher tidak ditemukan',
        ];
    }
}
