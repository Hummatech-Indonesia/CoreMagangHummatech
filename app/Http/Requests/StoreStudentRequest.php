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
            'division_id' => 'nullable',
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
