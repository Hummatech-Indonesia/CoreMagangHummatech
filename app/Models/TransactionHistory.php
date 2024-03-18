<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionHistory extends Model
{
    use HasFactory;

    /**
     * Mass assignable
     *
     * @param array $fillable
     */
    protected array $fillable = [
        'id',
        'transaction_id',
        'user_id',
        'product_id',
        'amount',
        'issued_at',
        'expired_at',
        'status',
    ];

    /**
     * Get the user that owns the TransactionHistory
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the products that owns the TransactionHistory
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
