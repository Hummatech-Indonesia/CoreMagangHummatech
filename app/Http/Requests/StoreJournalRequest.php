<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJournalRequest extends FormRequest
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
            'image' => 'mimes:png,jpg|required|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul tidak boleh kosong.',
            'description.required' => 'Deskripsi tidak boleh kosong.',
            'description.min' => 'Deskripsi harus minimal 150 karakter.',
            'image.required' => 'Gambar tidak boleh kosong.',
            'image.mimes' => 'Gambar harus berformat PNG atau JPG.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 500 KB.'
        ];
    }
}
