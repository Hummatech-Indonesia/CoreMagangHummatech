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
            'image' => 'mimes:png,jpg|required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul Tidak boleh kosong',
            'description.required' => 'Deskripsi Tidak boleh kosong',
            'description.min' => 'Deskripsi Minimal 150 karakter',
            'image.required' => 'Image Tidak boleh kosong',
        ];
    }
}
