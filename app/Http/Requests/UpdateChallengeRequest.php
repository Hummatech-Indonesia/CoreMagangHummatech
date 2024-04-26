<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChallengeRequest extends FormRequest
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
            'level' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'deadline' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul harus diisi',
            'level.required' => 'Level harus diisi',
            'description.required' => 'Description harus diisi',
            'start_date.required' => 'Tanggal mulai harus diisi',
            'deadline.required' => 'Batas pengumpulan harus diisi',
        ];
    }
}
