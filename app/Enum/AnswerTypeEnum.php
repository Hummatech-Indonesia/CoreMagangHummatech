<?php

namespace App\Enum;

enum AnswerTypeEnum :string
{
    case FILE = 'file';
    case LINK = 'link';
    case IMAGE = 'image';
}
