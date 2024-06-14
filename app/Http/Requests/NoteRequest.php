<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'status' => 'required',
            'name' => 'required|array',
            'name.*' => 'required|max:255',
        ];
    }

    /**
     * messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Judul wajib diisi.',
            'title.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'status.required' => 'Status wajib diisi.',
            'name.required' => 'Nama wajib diisi.',
            'name.array' => 'Nama harus berupa array.',
            'name.*.required' => 'Setiap nama dalam array wajib diisi.',
            'name.*.max' => 'Setiap nama dalam array tidak boleh lebih dari 255 karakter.',
        ];
    }

}
