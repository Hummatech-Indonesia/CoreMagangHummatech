<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHummataskTeamRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|unique:hummatask_teams',
            'description' => 'required',
            'image' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nama Tidak boleh kosong',
            'name.unique' => 'Nama sudah ada',
            'image.required' => 'Image Tidak boleh kosong',
            'description.required' => 'Deskripsi Tidak boleh kosong',
            'image.mimes' => 'Image hanya di perbolehkan Exstensi png,jpg'
        ];
    }
}
