<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssessmentChallengeRequest extends FormRequest
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
            'score' => 'required|integer|min:1|max:10',
        ];
    }

    public function messages()
    {
        return [
            'score.required' => 'Score harus diisi.',
            'score.integer' => 'Score harus berupa angka.',
            'score.min' => 'Score tidak boleh kurang dari 1.',
            'score.max' => 'Score tidak boleh lebih dari 10.',
        ];
    }
}
