<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required',
            'identify_number' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'class' => 'required',
            'school' => 'required',
            'school_address' => 'required',
            'school_phone' => 'required',
            'avatar' => 'required',
            'cv' => 'required',
            'self_statement' => 'required',
            'parents_statement' => 'required',
            'start_date' => 'required|date',
            'finish_date' => 'required|date',
            'major' => 'required',
            'rfid' => 'nullable',
            'internship_type' => 'required',
            'division_id' => 'required_if:internship_type,online|nullable',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'identify_number.required' => 'NIM / NISN wajib diisi.',
            'birth_place.required' => 'Tempat lahir wajib diisi.',
            'birth_date.required' => 'Tanggal lahir wajib diisi.',
            'gender.required' => 'Jenis kelamin wajib diisi.',
            'address.required' => 'Alamat wajib diisi.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'class.required' => 'Kelas wajib diisi.',
            'school.required' => 'Asal sekolah wajib diisi.',
            'school_address.required' => 'Alamat sekolah wajib diisi.',
            'school_phone.required' => 'Nomor telepon sekolah wajib diisi.',
            'avatar.required' => 'Avatar wajib diisi.',
            'cv.required' => 'CV wajib diisi.',
            'self_statement.required' => 'Kartu identitas wajib diisi.',
            'parents_statement.required' => 'Kartu keluarga wajib diisi.',
            'start_date.required' => 'Tgl. mulai wajib diisi.',
            'finish_date.required' => 'Tgl. selesai wajib diisi.',
            'major.required' => 'Jurusan wajib diisi.',
            'internship_type.required' => 'Jenis magang wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'division_id.required_if' => 'Divisi wajib diisi.',
            'confirm_password.same' => 'Konfirmasi password tidak sama.',
            'confirm_password.required' => 'Konfirmasi password wajib diisi.'
        ];
    }
}
