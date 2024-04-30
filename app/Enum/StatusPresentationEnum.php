<?php

namespace App\Enum;

enum StatusPresentationEnum : string
{
    case PENNDING = 'pending';
    case ONGOING = 'ongoing';
    case FINISH = 'finish';
    case NOTFINISH ='notfinish';
}
