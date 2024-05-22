<?php

namespace App\Enum;

enum StatusApprovalPermissionEnum :string
{
    case PENDING = 'pending';
    case AGREE = 'agree';
    case REJECT = 'reject';

    public function label()
    {
        return match ($this) {
            self::PENDING => 'Menunggu konfirmasi',
            self::AGREE => 'Disetujui',
            self::REJECT => 'Ditolak',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'warning',
            self::AGREE => 'success',
            self::REJECT => 'danger',
        };
    }
}

