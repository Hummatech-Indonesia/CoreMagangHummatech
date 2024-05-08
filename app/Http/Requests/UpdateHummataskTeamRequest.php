<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHummataskTeamRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'nullable|mimes:png,jpg',
            'student_id.*' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nama Tidak boleh kosong',
            'image.required' => 'Image Tidak boleh kosong',
            'description.required' => 'Deskripsi Tidak boleh kosong',
            'image.mimes' => 'Image hanya di perbolehkan Exstensi png,jpg'
        ];
    }
}
