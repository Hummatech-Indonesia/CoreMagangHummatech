<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWarning_LetterRequest extends FormRequest
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
            'student_id' => 'required|integer|exists:students,id',
            'status' => 'required|string',
            'date' => 'required',
            'reference_number' => 'required|string|max:255',
            'reason' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'student_id.required' => 'Siswa harus dipilih.',
            'status.required' => 'Status harus dipilih.',
            'date.required' => 'Tgl. harus diisi.',
            'reference_number.required' => 'No. Surat harus diisi.',
            'reason.required' => 'Alasan harus diisi.',
            'student_id.exists' => 'Siswa tidak ditemukan.',
            'reference_number.max' => 'No. Surat terlalu panjang.',
            'reason.max' => 'Alasan terlalu panjang.',
        ];
    }
}
