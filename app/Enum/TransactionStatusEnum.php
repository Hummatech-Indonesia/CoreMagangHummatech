<?php

namespace App\Enum;

enum TransactionStatusEnum: string
{
    case PENDING = 'pending';
    case PAID = 'paid';
    case CANCELLED = 'cancelled';
    case EXPIRED = 'expired';
    case FAILED = 'failed';
    case REFUND = 'refund';
    case UNPAID = 'unpaid';

    public function label(): string
    {
        return match ($this) {
            TransactionStatusEnum::PENDING => 'Belum Dibayar',
            TransactionStatusEnum::PAID => 'Lunas',
            TransactionStatusEnum::CANCELLED => 'Batal',
            TransactionStatusEnum::EXPIRED => 'Kadaluarsa',
            TransactionStatusEnum::FAILED => 'Gagal',
            TransactionStatusEnum::REFUND => 'Dikembalikan',
            TransactionStatusEnum::UNPAID => 'Belum lunas',
        };
    }

    public function color(): string
    {
        return match ($this) {
            TransactionStatusEnum::PENDING => 'warning',
            TransactionStatusEnum::PAID => 'success',
            TransactionStatusEnum::CANCELLED => 'danger',
            TransactionStatusEnum::EXPIRED => 'danger',
            TransactionStatusEnum::FAILED => 'danger',
            TransactionStatusEnum::REFUND => 'info',
            TransactionStatusEnum::UNPAID => 'warning',
        };
    }

    public function title(): string
    {
        return match ($this) {
            TransactionStatusEnum::PENDING => 'Yuk Segera Bayar Tagihannya...',
            TransactionStatusEnum::PAID => 'Yeay, Tagihannya Udah Lunas!',
            TransactionStatusEnum::CANCELLED => 'Yah, Tagihannya Udah Dibatalkan...',
            TransactionStatusEnum::EXPIRED => 'Yah, Tagihannya Sudah Kadaluarsa...',
            TransactionStatusEnum::FAILED => 'Yah, Tagihannya Gagal Dibayar...',
            TransactionStatusEnum::REFUND => 'Yah, Tagihannya Sudah Dikembalikan...',
            TransactionStatusEnum::UNPAID => 'Yuk Segera Bayar Tagihannya...',
        };
    }

    public function subtitle(): string
    {
        return match ($this) {
            TransactionStatusEnum::PENDING => 'Dan nikmati berbagai macam fitur dan kemudahan dalam proses magang kamu.',
            TransactionStatusEnum::PAID => 'Silahkan nikmati dan jelajahi semua fitur ini dan selamat belajar!',
            TransactionStatusEnum::CANCELLED => 'Maaf ya, kamu belum bisa menikmati semua fitur disini.',
            TransactionStatusEnum::EXPIRED => 'Maaf ya, kamu belum bisa menikmati semua fitur disini.',
            TransactionStatusEnum::FAILED => 'Maaf ya, kamu belum bisa menikmati semua fitur disini.',
            TransactionStatusEnum::REFUND => 'Maaf ya, kamu belum bisa menikmati semua fitur disini.',
            TransactionStatusEnum::UNPAID => 'Dan nikmati berbagai macam fitur dan kemudahan dalam proses magang kamu.',
        };
    }
}
