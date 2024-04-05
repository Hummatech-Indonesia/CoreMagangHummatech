<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentTaskRequest extends FormRequest
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
            'student_id' => 'required|exists:students,id',
            'task_id' => 'required|exists:tasks,id',
            'file' => 'required|mimes:zip|max:8196',
        ];
    }

    public function messages(): array
    {
        return [
           'student_id.required' => 'Siswa harus dipilih.',
            'task_id.required' => 'Tugas harus dipilih.',
            'file.required' => 'File harus dipilih.',
           'student_id.exists' => 'Siswa tidak ditemukan.',
            'file.mimes' => 'File harus berupa zip.',
            'file.max' => 'File terlalu besar.',
        ];
    }
}
