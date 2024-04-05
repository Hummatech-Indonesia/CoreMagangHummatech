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
            'start_date' => 'required',
            'end_date' => 'required',
            'link' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul tidak boleh kosong',
           'start_date.required' => 'Tanggal mulai tidak boleh kosong',
           'end_date.required' => 'Tanggal akhir tidak boleh kosong',
           'link.required' => 'Link tidak boleh kosong',
        ];
    }
}
