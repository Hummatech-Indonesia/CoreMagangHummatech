<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHummataskTeamRequest extends FormRequest
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
            'name' => 'required|max:255',
            'status' => 'required',
            'leader' => 'required',
            'end_date' => 'nullable|date',
            'student_id.*' => 'nullable|exists:students,id',
            'status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'name.max' => 'Maksimal :max karakter',
            'status.required' => 'Pilih salah satu',
            'leader.required' => 'Ketua tim tidak boleh kosong',
            'end_date.date' => 'Deadline harus berupa tanggal',
            'student_id.*.exists' => 'Siswa yang dipilih tidak ada',
        ];
    }
}
