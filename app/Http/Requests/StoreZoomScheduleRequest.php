<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreZoomScheduleRequest extends FormRequest
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
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:today',
            'link' => 'required|url'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul tidak boleh kosong.',
            'start_date.required' => 'Tanggal mulai tidak boleh kosong.',
            'start_date.after_or_equal' => 'Tanggal mulai tidak boleh kurang dari hari ini.',
            'end_date.required' => 'Tanggal selesai tidak boleh kosong.',
            'end_date.after_or_equal' => 'Tanggal selesai tidak boleh kurang dari hari ini.',
            'link.required' => 'Link tidak boleh kosong.',
            'link.url' => 'Link harus berupa URL.'
        ];

    }
}
