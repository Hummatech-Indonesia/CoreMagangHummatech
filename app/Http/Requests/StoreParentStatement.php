<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParentStatement extends FormRequest
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
            'parent_name' => 'required',
            'identity_card' => 'required',
            'parent_address' => 'required',
            'parent_place_birth' => 'required',
            'parent_date_birth' => 'required',
            'parent_phone' => 'required',
            'student_name' => 'required',
            'place_birth' => 'required',
            'date_birth' => 'required',
            'major' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'parent_name.required' => 'Nama Lengkap harus diisi',
            'identity_card.required' => 'Nomor Induk Kependudukan harus diisi',
            'parent_address.required' => 'Alamat Lengkap harus diisi',
            'parent_place_birth.required' => 'Tempat Lahir harus diisi',
            'parent_date_birth.required' => 'Tanggal Lahir harus diisi',
            'parent_phone.required' => 'Nomor Handphone harus diisi',
            'student_name.required' => 'Nama Lengkap harus diisi',
        ];
    }
}
