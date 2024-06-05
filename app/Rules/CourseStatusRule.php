<?php

namespace App\Rules;

use App\Enum\StatusCourseEnum;
use Illuminate\Contracts\Validation\Rule;

class CourseStatusRule implements Rule
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
        return in_array($value, [StatusCourseEnum::PAID->value, StatusCourseEnum::SUBCRIBE->value]);
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
