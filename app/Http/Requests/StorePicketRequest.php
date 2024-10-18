<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePicketRequest extends FormRequest
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
            'tim' => 'required',
            'day_picket' => 'required',
            'student_ids' => [
                'required',
                'array',
                'min:1',
            ],
            'student_ids.*' => [
                'required',
                Rule::unique('pickets', 'student_id')->where(function ($query) {
                    return $query->where('day_picket', $this->day_picket);
                }),
                'exists:students,id'
            ],
        ];
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages()
    {
        return [
            'tim.required' => 'Wajib diisi',
            'day_picket.required' => 'Wajib diisi',
            'student_ids.required' => 'Wajib mengisi setidaknya satu student',
            'student_ids.min' => 'Setidaknya satu student harus dipilih',
            'student_ids.*.required' => 'Setiap student harus dipilih',
            'student_ids.*.unique' => 'Siswa sudah terjadwal pada hari yang sama',
            'student_ids.*.exists' => 'Student tidak ditemukan',
        ];
    }
}
