<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReportStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'image' => 'required',
            'description' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Judul Tidak boleh kosong',
            'image.required' => 'Gambar Tidak boleh kosong',
            'description.required' => 'Deskripsi Tidak boleh kosong'
        ];
    }
}
