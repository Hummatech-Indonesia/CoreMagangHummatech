<?php

namespace App\Http\Requests;

use App\Rules\CourseStatusRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'status' => ['required', new CourseStatusRule],
            'price' => 'nullable',
            'division_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul tidak boleh kosong',
            'image.required' => 'Gambar tidak boleh kosong',
            'description.required' => 'Deskripsi tidak boleh kosong',
            'price.required' => 'Harga tidak boleh kosong',
            'status.required' => 'Status tidak boleh kosong',
            'division_id.required' => 'Divisi tidak boleh kosong'
        ];
    }
}
