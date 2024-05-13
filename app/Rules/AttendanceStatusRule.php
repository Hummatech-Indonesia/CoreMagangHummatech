<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class AttendanceStatusRule implements Rule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): bool
    {
        return in_array($value, ['masuk', 'izin', 'sakit', 'alpha']);
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
