<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'avatar' => 'image|mimes:jpeg,png,jpg,gif',
            'division_id' => 'nullable|exists:divisions,id',
        ];
    }


    public function messages()
    {
        return [
            'avatar.image' => 'File yang diupload bukan gambar',
            'avatar.mimes' => 'File yang diupload bukan gambar',
            'division_id.exists' => 'Divisi tidak ditemukan',
        ];
    }
}
