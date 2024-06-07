<?php

namespace App\Http\Requests;

use App\Rules\StatusSubmitTaskRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusSubmitTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => [new StatusSubmitTaskRule],
        ];
    }
}
