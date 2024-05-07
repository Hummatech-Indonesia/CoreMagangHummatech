<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSoloProjectRequest extends FormRequest
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
            'image' => 'required|mimes:png,jpg,jpeg',
            'name' => 'required|max:255',
            'description' => 'required|max:10000',
            'link' => 'nullable|url|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Foto tidak boleh kosong',
            'image.mimes' => 'Foto harus berupa png, jpg, atau jpeg',
            'name.required' => 'Nama tim tidak boleh kosong',
            'name.max' => 'Nama tim terlalu panjang',
            'description.required' => 'Tema harus diisi',
            'description.max' => 'Tema terlalu panjang',
            'link.url' => 'Link repository harus berupa url',
            'link.max' => 'Link repository terlalu panjang',
        ];
    }
}
