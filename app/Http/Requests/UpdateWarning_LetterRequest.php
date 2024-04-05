<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWarning_LetterRequest extends FormRequest
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
            'status' => 'required',
            'date' => 'required',
            'reference_number' => 'required',
            'file' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Tanggal harus diisi',
            'reference_number.required' => 'Nomor Referensi harus diisi',
            'file.required' => 'Tanggal harus diisi',
            'file.mimes' => 'File harus berupa file PDF'
        ];
    }
}
