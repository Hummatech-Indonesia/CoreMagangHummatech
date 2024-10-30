<?php

namespace App\Enum;

enum StatusPresentationEnum : string
{
    case PENNDING = 'pending';
    case ONGOING = 'ongoing';
    case FINISH = 'finish';
    case NOTFINISH ='notfinish';
    case WAITING = 'waiting';
    public function label(): string
    {
        return match ($this) {
            self::PENNDING => 'ditunda',
            self::ONGOING => 'sedang presentasi',
            self::FINISH => 'selesai',
            self::NOTFINISH => 'tidak selesai',
            self::WAITING => 'menunggu konfirmasi',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENNDING => 'warning',
            self::ONGOING => 'primary',
            self::FINISH => 'success',
            self::NOTFINISH => 'danger',
            self::WAITING => 'warning',
        };
    }
}
