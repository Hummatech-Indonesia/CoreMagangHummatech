<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSelfStatement extends FormRequest
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
            'birth_place' => 'required',
            'birth_date' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'birth_place.required' => 'Tempat lahir tidak boleh kosong',
            'birth_date.required' => 'Tanggal lahir tidak boleh kosong',
            'address.required' => 'Alamat tidak boleh kosong',
            'phone.required' => 'Nomor telepon tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
        ];
    }
}
