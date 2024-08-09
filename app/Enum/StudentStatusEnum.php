<?php

namespace App\Enum;

enum StudentStatusEnum :string
{
    case ACCEPTED = 'accepted';
    case DECLINED = 'declined';
    case PENDING = 'pending';
    case BANNED = 'banned';
    case ALUMNUS = 'alumnus';

    public function label(): string
    {
        return match ($this) {
            self::ACCEPTED => 'accepted',
            self::DECLINED => 'declined',
            self::PENDING => 'pending',
            self::BANNED => 'banned',
            self::ALUMNUS => 'alumni',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::ACCEPTED => 'success',
            self::DECLINED => 'danger',
            self::PENDING => 'warning',
            self::BANNED => 'danger',
            self::ALUMNUS => 'primary',
        };
    }
}
