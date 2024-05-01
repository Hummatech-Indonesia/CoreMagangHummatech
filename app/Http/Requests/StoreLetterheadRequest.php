<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLetterheadRequest extends FormRequest
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
            'logo' => 'nullable|image|max:500',
            'letterhead_top' => 'required',
            'letterhead_middle' => 'required',
            'letterhead_bottom' => 'required',
            'footer' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'letterhead_top.required' => 'Kop Atas tidak boleh kosong',
            'letterhead_middle.required' => 'Kop Tengah tidak boleh kosong',
            'letterhead_bottom.required' => 'Kop Bawah Letterhead tidak boleh kosong',
            'footer.required' => 'Footer tidak boleh kosong',
            'logo.max' => 'Logo tidak boleh lebih dari 500kb'
        ];
    }
}
