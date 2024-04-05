<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required',
            'division_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama produk wajib diisi',
            'division_id.required' => 'Division wajib diisi',
            'price.required' => 'Harga wajib diisi',
            'description.required' => 'Deskripsi wajib diisi',
            'image.required' => 'Gambar wajib diisi'
        ];
    }
}
