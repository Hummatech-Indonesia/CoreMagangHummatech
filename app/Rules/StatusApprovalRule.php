<?php

namespace App\Rules;

use App\Enum\StatusApprovalPermissionEnum;
use Closure;
use Illuminate\Contracts\Validation\Rule;

class StatusApprovalRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array($value, [StatusApprovalPermissionEnum::PENDING->value, StatusApprovalPermissionEnum::AGREE->value, StatusApprovalPermissionEnum::REJECT->value]);
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
