<?php

namespace App\Enum;

enum SubmitTaskStatusEnum: string
{
    case AGREE = "agree";
    case REJECT = "reject";
    case PENDING = "pending";

    public function label(): string
    {
        return match ($this) {
            self::AGREE => 'Disetujui',
            self::REJECT => 'Ditolak',
            self::PENDING => 'Menunggu',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::AGREE => 'success',
            self::REJECT => 'danger',
            self::PENDING => 'warning',
        };
    }
}
