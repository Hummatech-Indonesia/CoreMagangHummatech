<?php

namespace App\Enum;

enum TaskStatusEnum: string
{
    case PENDING = 'pending';
    case INPROGRESS = 'inprogress';
    case REVISION = 'revision';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Belum Selesai',
            self::INPROGRESS => 'Sedang dikerjakan',
            self::REVISION => 'Revisi',
            self::COMPLETED => 'Selesai',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'bg-light-warning text-warning',
            self::INPROGRESS => 'bg-light-info text-info',
            self::REVISION => 'bg-light-danger text-danger',
            self::COMPLETED => 'bg-light-success text-success',
        };
    }
}
