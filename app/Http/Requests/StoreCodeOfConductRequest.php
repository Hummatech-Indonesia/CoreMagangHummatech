<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCodeOfConductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => 'file|max:10240|required',
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'File tidak boleh kosong',
            'file.file' => 'File harus berupa file',
            'file.max' => 'File maksimal 10MB',
        ];
    }
}
