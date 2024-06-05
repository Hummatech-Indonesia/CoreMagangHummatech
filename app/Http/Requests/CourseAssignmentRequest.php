<?php

namespace App\Http\Requests;

use App\Rules\CourseAssignmentTypeRule;
use Illuminate\Foundation\Http\FormRequest;

class CourseAssignmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'type' => ['required', new CourseAssignmentTypeRule],
        ];
    }
}
