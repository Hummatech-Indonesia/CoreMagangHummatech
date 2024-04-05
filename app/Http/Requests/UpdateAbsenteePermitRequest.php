<?php

namespace App\Http\Requests;

use App\Enum\AbsenteePermitApprovalEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAbsenteePermitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'admin_note' => 'nullable',
            'status' => [
                'required',
                Rule::in(AbsenteePermitApprovalEnum::APPROVE, AbsenteePermitApprovalEnum::REJECT, AbsenteePermitApprovalEnum::PENDING),
            ],
        ];
    }

    public function messages()
    {
        return [
            'admin_note.required' => 'Admin tidak boleh kosong',
           'status.required' => 'status tidak boleh kosong',
        ];
    }
}
