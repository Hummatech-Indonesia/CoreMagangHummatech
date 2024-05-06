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
            'schedule_to' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
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
            'callback.required' => 'callback harus diisi',
            'hummatask_team_id.required' => 'hummatask_team_id harus diisi',
            'status_presentation.required' => 'status_presentation harus diisi',
            'description.required' => 'description harus diisi',
        ];
    }
}
