<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Enum\PresentationTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHummataskTeamRequest extends FormRequest
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
            'project_name' => 'required|string',
            'description' => 'required|string',
            'link' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'type_project' => 'string',
            'members' => [
                'nullable',
                'array',
                Rule::requiredIf(function () {
                    $optionalCategories = [
                        PresentationTypeEnum::SOLO->value,
                        PresentationTypeEnum::PREMINI->value,
                        PresentationTypeEnum::INTERVIEW->value,
                        PresentationTypeEnum::LIVECODING->value
                    ];
                    return !in_array(request()->input('type_project'), $optionalCategories);
                }),
            ],
            'planning_date_presentation' => 'required|date',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.unique' => 'Nama sudah ada.',
            'image.required' => 'Gambar tidak boleh kosong.',
            'description.required' => 'Deskripsi tidak boleh kosong.',
            'image.mimes' => 'Gambar hanya diizinkan dalam format PNG atau JPG.',

            'projectCategory.string' => 'Kategori proyek harus berupa teks.',
            'members.required' => 'Anggota wajib diisi untuk jenis proyek ini.',
            'members.array' => 'Anggota harus lebih dari 1.',

            'link.string' => 'Link harus berupa teks.',
            'startDate.date' => 'Tanggal mulai harus berupa tanggal yang valid.',
            'endDate.date' => 'Tanggal selesai harus berupa tanggal yang valid.',
        ];
    }
}
