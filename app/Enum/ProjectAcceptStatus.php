<?php

namespace App\Enum;

enum ProjectAcceptStatus: string
{
    case ACCEPT = 'accept';
    case REJECTED = 'rejected';
    case WAITING = 'waiting';
}
