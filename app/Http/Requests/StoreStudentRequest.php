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
            'birth_date' => 'required|date|before:'.today()->subYear()->format('Y-m-d'),
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'class' => 'required',
            'school' => 'required',
            'school_address' => 'required',
            'school_phone' => 'required',
            'avatar' => 'required|max:5000|mimes:png,jpg,jpeg',
            'cv' => 'required|max:5000|mimes:png,jpg,jpeg',
            'self_statement' => 'required|max:5000|mimes:png,jpg,jpeg',
            'parents_statement' => 'required|max:5000|mimes:png,jpg,jpeg',
            'start_date' => 'required|date|after_or_equal:today',
            'finish_date' => 'required|date|after_or_equal:start_date',
            'major' => 'required',
            'rfid' => 'nullable',
            'internship_type' => 'required',
            'division_id' => 'required_if:internship_type,online|nullable',
            'email' => 'required|email|unique:users,email',
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
            'cv.max' => 'CV maksimal 5 MB.',
            'avatar.max' => 'Ukuran avatar maksimal 5 MB.',
            'self_statement.required' => 'Surat pernyataan diri wajib di isi.',
            'self_statement.max' => 'Ukuran Surat pernyataan diri maksimal 5 MB.',
            'parents_statement.required' => 'Surat pernyataan orang tua wajib diisi.',
            'parents_statement.max' => 'Ukuran Surat pernyataan orang tua maksimal 5 MB.',
            'start_date.required' => 'Tgl. mulai wajib diisi.',
            'start_date.after_or_equal' => 'Tgl. mulai harus sama atau setelah tanggal sekarang.',
            'finish_date.required' => 'Tgl. selesai wajib diisi.',
            'finish_date.after_or_equal' => 'Tgl. selesai harus sama atau setelah tgl. mulai.',
            'major.required' => 'Jurusan wajib diisi.',
            'internship_type.required' => 'Jenis magang wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'division_id.required_if' => 'Divisi wajib diisi.',
            'confirm_password.same' => 'Konfirmasi password tidak sama.',
            'confirm_password.required' => 'Konfirmasi password wajib diisi.',

        ];
    }
}
