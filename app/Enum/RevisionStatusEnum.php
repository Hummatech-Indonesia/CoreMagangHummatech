<?php

namespace App\Enum;

enum RevisionStatusEnum: string
{
    case Todo = "todo";
    case InProgress  = "in progress";
    case Completed = "completed";
}
