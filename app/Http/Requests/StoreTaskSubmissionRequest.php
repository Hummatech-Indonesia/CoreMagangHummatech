<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskSubmissionRequest extends FormRequest
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
            'task_id' => 'required|exists:tasks,id',
            'user_id' => 'required|exists:users,id',
            'file' => 'mimes:zip|max:8196',
        ];
    }

    public function messages()
    {
        return [
            'task_id.required' => 'id harus diisi',
            'task_id.exists' => 'id tidak ditemukan',
            'user_id.required' => 'id harus diisi',
            'user_id.exists' => 'id tidak ditemukan',
            'file.required' => 'File tidak boleh kosong',
            'file.mimes' => 'File harus berupa file',
            'file.max' => 'File maksimal 8MB',
        ];
    }
}
