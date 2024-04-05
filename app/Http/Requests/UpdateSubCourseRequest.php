<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubCourseRequest extends FormRequest
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
            'description' => 'required',
            'file_course' => 'nullable|mimes:pdf',
            'video_course' => 'required',
            'image_course' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'file_course.mimes' => 'File harus berupa PDF',
            'video_course.required' => 'Video harus diisi',
            'image_course.required' => 'Gambar harus diisi',
            'title.required' => 'Judul harus diisi',
            'description.required' => 'Deskripsi harus diisi',
        ];
    }
}
