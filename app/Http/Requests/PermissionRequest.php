<?php

namespace App\Http\Requests;

use App\Rules\StatusApprovalRule;
use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => 'required|string',
            'proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Deskripsi harus diisi.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'proof.required' => 'Bukti harus diunggah.',
            'proof.image' => 'Bukti harus berupa gambar.',
            'proof.mimes' => 'Bukti harus berupa file gambar dengan ekstensi jpeg, png, jpg, gif, atau svg.',
            'proof.max' => 'Ukuran file gambar tidak boleh lebih dari 2MB.',
            'start.required' => 'Tanggal mulai harus diisi.',
            'start.date' => 'Tanggal mulai harus berupa tanggal yang valid.',
            'end.required' => 'Tanggal akhir harus diisi.',
            'end.date' => 'Tanggal akhir harus berupa tanggal yang valid.',
            'end.after_or_equal' => 'Tanggal akhir harus sama dengan atau setelah tanggal mulai.',
            'status.required' => 'Status harus diisi.'
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        session()->flash('showCreateModal', true);
        throw new \Illuminate\Validation\ValidationException($validator, redirect()->back()->withErrors($validator, 'create'));
    }
}
