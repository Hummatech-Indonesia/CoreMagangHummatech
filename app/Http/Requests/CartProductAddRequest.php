<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartProductAddRequest extends FormRequest
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
            'id' => 'required|exists:products,id|integer',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'id harus diisi',
            'id.exists' => 'id tidak ditemukan',
            'id.integer' => 'id harus berupa angka',
        ];
    }
}
