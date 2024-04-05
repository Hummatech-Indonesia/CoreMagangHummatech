<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePicketRequest extends FormRequest
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
            'tim' => 'required',
            'day' => 'required'
          ];
    }


    public function messages()
    {
        return [
            'tim.required' => 'Waktu Wajib diisi',
            'day.required' => 'Hari Wajib diisi',
        ];
    }
}
