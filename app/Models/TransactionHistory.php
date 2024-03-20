<?php

namespace App\Models;

use App\Trait\HasUuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionHistory extends Model
{
    use HasFactory, HasUuidTrait;

    /**
     * Mass assignable
     *
     * @param array $fillable
     */
    protected $fillable = [
        'id',
        'transaction_id',
        'user_id',
        'product_id',
        'checkout_url',
        'reference',
        'amount',
        'issued_at',
        'expired_at',
        'status',
    ];

    protected $casts = [
        'issued_at' => 'datetime',
        'expired_at' => 'datetime',
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
