<?php

namespace App\Enum;

enum RolesEnum: string
{
    case ADMIN = 'administrator';
    case MENTOR = 'mentor';
    case ONLINE = 'siswa-online';
    case OFFLINE = 'siswa-offline';
    case SCHOOL = 'sekolah';

    public function color(): string
    {
        return match ($this) {
            self::ADMIN => 'primary',
            self::MENTOR => 'success',
            self::ONLINE => 'info',
            self::OFFLINE => 'warning',
            self::SCHOOL => 'secondary',
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Administrator',
            self::MENTOR => 'Pembimbing',
            self::ONLINE => 'Siswa Online',
            self::OFFLINE => 'Siswa Offline',
            self::SCHOOL => 'Sekolah',
        };
    }
}
