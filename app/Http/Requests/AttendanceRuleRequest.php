<?php

namespace App\Http\Requests;

use App\Rules\DayRule;
use Illuminate\Foundation\Http\FormRequest;

class AttendanceRuleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            // 'day' => ['required', new DayRule],
            'checkin_starts' => 'required',
            'checkin_ends' => 'required',
            'break_starts' => 'required',
            'break_ends' => 'required',
            'return_starts' => 'required',
            'return_ends' => 'required',
            'checkout_starts' => 'required',
            'checkout_ends' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'checkin_starts.required' => 'Waktu masuk harus diisi',
            'checkin_ends.required' => 'Waktu pulang harus diisi',
            'break_starts.required' => 'Waktu pulang harus diisi',
            'break_ends.required' => 'Waktu pulang harus diisi',
            'return_starts.required' => 'Waktu pulang harus diisi',
            'return_ends.required' => 'Waktu pulang harus diisi',
            'checkout_starts.required' => 'Waktu pulang harus diisi',
            'checkout_ends.required' => 'Waktu pulang harus diisi',
            'day.required' => 'Tanggal harus diisi',
            'day.day' => 'Tanggal harus diisi dengan tanggal yang benar',
        ];
    }
}
