<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

abstract class MobileApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    abstract public function rules(): array;


    /**
     * Return failed validation
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors()->messages();
        throw new HttpResponseException(response()->json(['errors' => $errors], ResponseCode::HTTP_UNPROCESSABLE_ENTITY));
    }

    /**
     * Return failed authorization
     *
     * @return void
     */

    protected function failedAuthorization(): void
    {
        throw new HttpResponseException(response()->json(['message' => "Form validation errors"],  ResponseCode::HTTP_UNAUTHORIZED));
    }
}
