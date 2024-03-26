<?php

namespace App\Enum;

enum TaskSubmissionStatusEnum: string
{
    case PENDING = 'pending';
    case CURATED = 'curated';
    case COMPLETED = 'completed';
    case REJECTED = 'rejected';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Menunggu',
            self::CURATED => 'Sedang Dikurasi',
            self::COMPLETED => 'Selesai',
            self::REJECTED => 'Ditolak',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'warning',
            self::CURATED => 'primary',
            self::COMPLETED => 'success',
            self::REJECTED => 'danger',
        };
    }
}
