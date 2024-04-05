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
            'logo' => 'nullable|image|max:2048',
            'letterhead_top' => 'required',
            'letterhead_middle' => 'required',
            'letterhead_bottom' => 'required',
            'footer' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'letterhead_top.required' => 'Top Letterhead tidak boleh kosong',
            'letterhead_middle.required' => 'Middle Letterhead tidak boleh kosong',
            'letterhead_bottom.required' => 'Bottom Letterhead tidak boleh kosong',
            'footer.required' => 'Footer tidak boleh kosong'
        ];
    }
}
