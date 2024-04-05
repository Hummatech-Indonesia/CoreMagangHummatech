<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHummataskTeamRequest extends FormRequest
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
            'name' => 'required|max:255|unique:hummatask_teams',
            'image' => 'required|mimes:png,jpg,webp',
            'description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nama Tidak boleh kosong',
            'name.unique' => 'Nama sudah ada',
            'image.required' => 'Image Tidak boleh kosong',
            'description.required' => 'Deskripsi Tidak boleh kosong',
            'image.mimes' => 'Image hanya di perbolehkan Exstensi png,jpg,webp'
        ];
    }
}
