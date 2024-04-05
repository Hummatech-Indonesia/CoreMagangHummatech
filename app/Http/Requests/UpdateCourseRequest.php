<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'title' => 'nullable',
            'image' => 'nullable',
            'description' => 'nullable',
            'price' => 'nullable',
            'status' => 'nullable',
            'division_id' => 'nullable',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Judul Tidak boleh kosong',
            'image.required' => 'Image tidak boleh kosong',
            'description.required' => 'Deskripsi tidak boleh kosong',
            'price.required' => 'Harga tidak boleh kosong',
            'status.required' => 'Status tidak boleh kosong',
        ];
    }
}
