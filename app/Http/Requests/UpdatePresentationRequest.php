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
            'schedule_to' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'callback' => 'nullable',
            'hummatask_team_id' => 'required',
            'status_presentation' => 'nullable',
            'title' => 'required',
            'description' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'start_date.required' => 'Waktu awal harus diisi',
            'end_date.required' => 'Waktu akhir harus diisi',
            'schedule_to.required' => 'schedule_to harus diisi',
            'hummatask_team_id.required' => 'hummatask_team_id harus diisi',
            'title.required' => 'Judul harus di isi'
        ];
    }
}
