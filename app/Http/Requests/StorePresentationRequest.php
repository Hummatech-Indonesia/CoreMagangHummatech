<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePresentationRequest extends FormRequest
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
            'start_date' => 'required|array|min:1',
            'start_date.*' => 'required',
            'schedule_to' => 'required|array|min:1',
            'schedule_to.*' => 'required',
            'end_date' => 'required|array|min:1',
            'end_date.*' => 'required',
            'callback' => 'nullable',
            'mentor_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'start_date.required' => 'Waktu awal harus diisi',
            'end_date.required' => 'Waktu akhir harus diisi',

        ];
    }
}
