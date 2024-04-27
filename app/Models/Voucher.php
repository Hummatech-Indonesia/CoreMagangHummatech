<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Voucher
 *
 * @property int $id
 * @property string $code_voucher
 * @property string $presentase
 * @property string $start_date
 * @property string $end_date
 * @property string $type
 * @property string|null $quota
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\VoucherFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereCodeVoucher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher wherePresentase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereQuota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\VoucherUsage> $voucherUsage
 * @property-read int|null $voucher_usage_count
 * @mixin \Eloquent
 */
class Voucher extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get relation to voucher usage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function voucherUsage(): HasMany
    {
        return $this->hasMany(VoucherUsage::class, 'id', 'voucher_id');
    }

    /**
     * Checking the availability of voucher
     *
     * @return bool true or false of availability
     */
    public function checkAbvability(): bool
    {
        return $this->voucherUsage()->count() >= $this->quota ? false : true;
    }
}
