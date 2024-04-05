<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateZoomScheduleRequest extends FormRequest
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
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'link' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul Tidak boleh kosong',
            'start_date.required' => 'Tanggal mulai Tidak boleh kosong',
            'end_date.required' => 'Tanggal akhhir Tidak boleh kosong',
            'link.required' => 'Link Tidak boleh kosong'
        ];
    }
}
