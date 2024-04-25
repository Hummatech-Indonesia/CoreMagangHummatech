<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property string $transaction_histories_id
 * @property int $products_id
 * @method static \Database\Factories\OrderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProductsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTransactionHistoriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_histories_id',
        'name',
        'price',
        'amount',
        'products_id',
        'courses_id',
        'image',
    ];

    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the transaction into course data
     *
     * @return HasOne
     */
    public function course(): HasOne
    {
        return $this->hasOne(Course::class, 'id', 'courses_id');
    }

    /**
     * Get the transaction into course subscribe data
     *
     * @return HasOne
     */
    public function subscribe(): HasOne
    {
        return $this->hasOne(Product::class);
    }

    /**
     * Get the transaction into course subscribe data
     *
     * @return HasOne
     */
    public function transaction(): HasOne
    {
        return $this->hasOne(TransactionHistory::class, 'id', 'transaction_histories_id');
    }
}
