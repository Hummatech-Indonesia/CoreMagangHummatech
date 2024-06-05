<?php

namespace App\Enum;

enum SubmitTaskStatusEnum: string
{
    case AGREE = "agree";
    case REJECT = "reject";
    case PENDING = "pending";
}
