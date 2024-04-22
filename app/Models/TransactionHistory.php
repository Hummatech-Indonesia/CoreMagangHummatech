<?php

namespace App\Models;

use App\Enum\TransactionStatusEnum;
use App\Trait\HasUuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class TransactionHistory to managing data history of transaction
 *
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $transaction_id
 * @property string $reference
 * @property int $user_id
 * @property int $product_id
 * @property int|null $amount
 * @property \Illuminate\Support\Carbon $issued_at
 * @property \Illuminate\Support\Carbon $expired_at
 * @property string $checkout_url
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $paid_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\TransactionHistoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereCheckoutUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereIssuedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereUserId($value)
 * @mixin \Eloquent
 */
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
        'paid_at' => 'datetime',
    ];

    /**
     * Get the status as TransactionStatusEnum
     *
     * @return TransactionStatusEnum
     */
    public function getTransactionStatus(): TransactionStatusEnum
    {
        return match ($this->status) {
            'pending' => TransactionStatusEnum::PENDING,
            'paid' => TransactionStatusEnum::PAID,
            'cancelled' => TransactionStatusEnum::CANCELLED,
            'expired' => TransactionStatusEnum::EXPIRED,
            'failed' => TransactionStatusEnum::FAILED,
            'refund' => TransactionStatusEnum::REFUND,
            'unpaid' => TransactionStatusEnum::UNPAID,
        };
    }

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
     * Get the user that owns the TransactionHistory
     *
     * @return HasOne
     */
    public function order()
    {
        return $this->hasOne(Order::class, 'transaction_histories_id');
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
