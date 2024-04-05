<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCourseRequest extends FormRequest
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
            'file_course' => 'required|mimes:pdf',
            'video_course' => 'required',
            'image_course' => 'required',
            'course_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'course_id.required' => 'Pilih kursus terlebih dahulu',
            'title.required' => 'Masukkan judul kursus',
            'description.required' => 'Masukkan deskripsi kursus',
            'file_course.required' => 'Masukkan file kursus',
            'video_course.required' => 'Masukkan video kursus',
            'image_course.required' => 'Masukkan gambar kursus',
        ];
    }
}
