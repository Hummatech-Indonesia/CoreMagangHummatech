<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enum\StatusPresentationEnum;

class StatusPresentationRequest extends FormRequest
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
            'presentation_id' => 'required|exists:presentations,id',
            'status_presentation' => [
                'required',
                'string',
                new Enum(StatusPresentationEnum::class),
            ],
            'planning_date_presentation' => 'required|date',
            'reason' => 'nullable'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'presentation_id.required' => 'ID presentasi wajib diisi.',
            'presentation_id.exists' => 'ID presentasi tidak ditemukan dalam database.',
            'status_presentation.required' => 'Status presentasi wajib diisi.',
            'status_presentation.string' => 'Status presentasi harus berupa teks.',
            'status_presentation.Enum' => 'Status presentasi yang dipilih tidak valid. Pilihan yang valid adalah: pending, ongoing, finish, notfinish, dan waiting.',
        ];
    }
}
