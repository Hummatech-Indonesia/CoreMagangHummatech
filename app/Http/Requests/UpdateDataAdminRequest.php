<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDataAdminRequest extends FormRequest
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
            'image' => 'nullable|image',
            'name' => 'required',
            'company' => 'required',
            'field' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'company.required' => 'Perusahaan tidak boleh kosong',
            'field.required' => 'Bidang tidak boleh kosong',
        ];
    }
}
