<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBoardRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'category_board_id' => 'required',
            'hummatask_team_id' => 'required',
            'label' => 'nullable',
            'priority' => 'nullable',
            'status' => 'nullable',
            'student_project_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'judul tugas harus diisi',
            'description.required' => 'deskripsi harus diisi',
            'start_date.required' => 'tanggal mulai harus diisi',
            'end_date.required' => 'tanggal akhir harus diisi',
            'category_board_id.required' => 'categori harus diisi',
            'hummatask_team_id.required' => 'tim harus diisi',
            'student_project_id.required' => 'siswa harus diisi'

        ];
    }
}
