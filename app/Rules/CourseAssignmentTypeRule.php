<?php

namespace App\Rules;

use App\Enum\AnswerTypeEnum;
use Illuminate\Contracts\Validation\Rule;

class CourseAssignmentTypeRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array($value, [AnswerTypeEnum::FILE->value, AnswerTypeEnum::IMAGE->value, AnswerTypeEnum::LINK->value]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Jenis tidak valid.';
    }
}
