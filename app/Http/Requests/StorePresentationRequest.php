<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePresentationRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diizinkan untuk membuat request ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Mendapatkan aturan validasi yang berlaku untuk request ini.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'project_id' => 'required', // Pastikan project_id harus ada
        ];

        // Validasi planning_date_presentation hanya jika ada di request
        if ($this->has('planning_date_presentation')) {
            $rules['planning_date_presentation'] = 'required|after:yesterday|date';
        }

        // Validasi date_time_presentation hanya jika ada di request
        if ($this->has('date_time_presentation')) {
            $rules['date_time_presentation'] = 'required';
            $rules['category_presentation'] = 'required|in:online,offline';
        }
        // Validasi link_online_presentation hanya jika ada di request
        if ($this->has('link_online_presentation')) {
            $rules['link_online_presentation'] = 'required|regex:/^https:\/\/(www\.)?example\.com/';
        }
        return $rules;
    }

    /**
     * Mendapatkan pesan error kustom untuk validasi.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'date_time_presentation.required' => 'Tanggal dan waktu presentasi harus diisi',
            'link_online_presentation.required' => 'link presentasi harus diisi',
            'link_online_presentation.regex' => 'URL harus dimulai dengan https:// dan berasal dari domain example.com',
            'planning_date_presentation.required' => 'Waktu presentasi harus diisi',
            'planning_date_presentation.after' => 'Waktu presentasi harus lewat hari kemarin',
            'project_id.required' => 'Project harus diisi',
        ];
    }
}
