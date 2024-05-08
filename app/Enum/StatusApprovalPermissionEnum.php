<?php

namespace App\Enum;

enum StatusApprovalPermissionEnum :string
{
    case PENDING = 'pending';
    case AGREE = 'agree';
    case REJECT = 'reject';
}
