<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcceptedAprovalRequest extends FormRequest
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
            'letter_number' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'letter_number.required' => 'Harus diisi',
            'letter_number.numeric' => 'Harus berupa angka'
        ];
    }
}
