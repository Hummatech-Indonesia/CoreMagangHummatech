<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVoucherRequest extends FormRequest
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
            'code_voucher' => 'required',
            'presentase' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'type' => 'required',
            'quota' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'code_voucher.required' => 'Kode voucher harus diisi',
            'presentase.required' => 'Presentase harus diisi',
            'start_date.required' => 'Tanggal mulai harus diisi',
            'type.required' => 'Type harus diisi',
            'end_date.required' => 'Tanggal akhir harus diisi',
            'quota.required' => 'Quota harus diisi',
        ];
    }
}
