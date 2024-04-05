<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePicketingReportRequest extends FormRequest
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
            'description' => 'required|max:1000',
            'proof' => 'required|mimes:png,jpg,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Deskripsi harus diisi',
            'description.max' => 'Deskripsi tidak boleh lebih dari 1000 karakter',
            'proof.required' => 'Bukti pembayaran harus diisi',
            'proof.mimes' => 'Bukti pembayaran harus berupa png, jpg, jpeg'
        ];
    }
}
