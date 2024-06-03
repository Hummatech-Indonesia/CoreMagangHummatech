<?php

namespace App\Rules;

use App\Enum\SubmitTaskStatusEnum;
use Illuminate\Contracts\Validation\Rule;

class StatusSubmitTaskRule implements Rule
{
    /**
     * passes
     *
     * @param  mixed $attribute
     * @param  mixed $value
     * @return void
     */
    public function passes($attribute, $value)
    {
        return in_array($value, [SubmitTaskStatusEnum::AGREE->value, SubmitTaskStatusEnum::REJECT->value]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Status tidak valid.';
    }
}
