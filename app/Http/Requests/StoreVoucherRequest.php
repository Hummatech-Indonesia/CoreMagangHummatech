<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoucherRequest extends FormRequest
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
            'code_voucher' => 'required|string|unique:vouchers,code_voucher',
            'presentase' => 'required|numeric|between:0,100',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required',
            'quota' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'code_voucher.required' => 'Kode voucher tidak boleh kosong',
            'code_voucher.string' => 'Kode voucher harus berupa string',
            'code_voucher.unique' => 'Kode voucher sudah digunakan',
            'presentase.required' => 'Persentase tidak boleh kosong',
            'presentase.numeric' => 'Persentase harus berupa angka',
            'presentase.between' => 'Persentase harus antara 0 hingga 100',
            'start_date.required' => 'Tanggal mulai tidak boleh kosong',
            'start_date.date' => 'Tanggal mulai harus tanggal yang valid',
            'start_date.after_or_equal' => 'Tanggal mulai harus hari ini atau tanggal yang lebih besar',
            'end_date.required' => 'Tanggal akhir tidak boleh kosong',
            'end_date.date' => 'Tanggal akhir harus tanggal yang valid',
            'end_date.after_or_equal' => 'Tanggal akhir harus tanggal yang lebih besar atau sama dengan tanggal mulai',
        ];
    }
}
