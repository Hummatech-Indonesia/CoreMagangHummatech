<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJournalRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required|min:150',
            'image' => 'mimes:png,jpg|max:500'
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Judul harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'description.min' => 'Deskripsi harus minimal 150 karakter.',
            'image.mimes' => 'Gambar harus berupa png, jpg atau jpeg',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 500 KB.'

        ];
    }
}
