<?php

namespace App\Http\Requests;

use App\Rules\AttendanceStatusRule;
use Illuminate\Foundation\Http\FormRequest;

class AttendanceStatusRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:student,id',
            'status' => ['required', new AttendanceStatusRule]
        ];
    }
}
