<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataAdminRequest extends FormRequest
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
            'image' => 'required',
            'name' => 'required',
            'company' => 'required',
            'field' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Image harus diisi',
            'name.required' => 'Nama harus diisi',
            'company.required' => 'Perusahaan harus diisi',
            'field.required' => 'Bidang harus diisi',
        ];
    }
}
