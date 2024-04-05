<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaxLateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'minute' => 'required|integer|min:0|max:300',
        ];
    }

    public function messages()
    {
        return [
            'minute.required' => 'Waktu harus diisi',
            'minute.integer' => 'Waktu harus berupa angka',
            'minute.min' => 'Waktu minimal 0 menit',
            'minute.max' => 'Waktu maksimal 300 menit',
        ];
    }
}
