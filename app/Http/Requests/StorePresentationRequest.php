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
            'planning_date_presentation' => 'required|after:yesterday|date',
            'project_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'planning_date_presentation.required' => 'Waktu presentasi harus diisi',
            'planning_date_presentation.after' => 'Waktu presentasi harus lewat hari kemarin',
            'project_id.required' => 'Mentor harus diisi',
        ];
    }
}
