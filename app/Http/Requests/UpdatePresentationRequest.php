<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePresentationRequest extends FormRequest
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
            'start_date' => 'nullable|string',
            'end_date' => 'nullable|string',
            'schedule_to' => 'nullable|string',
            'hummatask_team_id' => 'nullable|exists:hummatask_teams,id',
            'mentor_id' => 'nullable|exists:mentors,id',
            'status_presentation' => 'nullable',
            'callback' => 'nullable|string',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ];
    }
    public function messages()
    {
        return [
            'start_date.nullable' => 'Tanggal mulai diperlukan.',
            'start_date.string' => 'Tanggal mulai harus berupa teks.',
            'end_date.nullable' => 'Tanggal berakhir diperlukan.',
            'end_date.string' => 'Tanggal berakhir harus berupa teks.',
            'schedule_to.nullable' => 'Jadwal ke diperlukan.',
            'schedule_to.string' => 'Jadwal ke harus berupa teks.',
            'hummatask_team_id.exists' => 'ID tim Hummatask tidak valid.',
            'mentor_id.nullable' => 'ID mentor diperlukan.',
            'mentor_id.exists' => 'ID mentor tidak valid.',
            'callback.string' => 'Callback harus berupa teks.',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'description.string' => 'Deskripsi harus berupa teks.',
        ];
    }
}
