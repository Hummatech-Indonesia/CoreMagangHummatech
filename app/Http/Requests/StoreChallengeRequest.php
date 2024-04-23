<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChallengeRequest extends FormRequest
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
            'mentor_id' => 'exists:mentors,id|required',
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
            'mentor_id.required' => 'Mentor harus diisi',
            'title.required' => 'Title harus diisi',
            'level.required' => 'Level harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'start_date.required' => 'Tanggal mulai harus diisi',
            'deadline.required' => 'Batas pengumpulan harus diisi'

        ];
    }
}
