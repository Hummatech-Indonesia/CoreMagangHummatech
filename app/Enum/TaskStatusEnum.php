<?php

namespace App\Enum;

enum TaskStatusEnum: string
{
    case INPROGRESS = 'inprogress';
    case REVISION = 'revision';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::INPROGRESS => 'Dikerjakan',
            self::REVISION => 'Revisi',
            self::COMPLETED => 'Selesai',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::INPROGRESS => 'bg-light-info text-info',
            self::REVISION => 'bg-light-danger text-danger',
            self::COMPLETED => 'bg-light-success text-success',
        };
    }
}
