<?php

namespace App\Enum;

enum TransactionStatusEnum: string
{
    case PENDING = 'pending';
    case PAID = 'paid';
    case CANCELLED = 'cancelled';
    case EXPIRED = 'expired';

    public function label(): string
    {
        return match ($this) {
            TransactionStatusEnum::PENDING => 'Pending',
            TransactionStatusEnum::PAID => 'Paid',
            TransactionStatusEnum::CANCELLED => 'Cancelled',
            TransactionStatusEnum::EXPIRED => 'Expired',
        };
    }

    public function color(): string
    {
        return match ($this) {
            TransactionStatusEnum::PENDING => 'warning',
            TransactionStatusEnum::PAID => 'success',
            TransactionStatusEnum::CANCELLED => 'danger',
            TransactionStatusEnum::EXPIRED => 'secondary',
        };
    }
}
