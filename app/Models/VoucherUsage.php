<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $vouchers_id
 * @property int $students_id
 * @property string $used_at
 * @method static \Database\Factories\VoucherUsageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherUsage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherUsage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherUsage query()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherUsage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherUsage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherUsage whereStudentsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherUsage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherUsage whereUsedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherUsage whereVouchersId($value)
 * @mixin \Eloquent
 */
class VoucherUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'vouchers_id',
        'students_id',
        'used_at',
    ];
}
