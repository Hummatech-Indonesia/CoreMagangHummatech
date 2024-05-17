<?php

namespace App\Enum;

enum TaskStatusEnum: string
{
    case PENDING = 'pending';
    case INPROGRESS = 'inprogress';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Belum Dikerjakan',
            self::INPROGRESS => 'Proses Kurasi',
            self::COMPLETED => 'Selesai',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'warning',
            self::INPROGRESS => 'info',
            self::COMPLETED => 'success',
        };
    }
}
