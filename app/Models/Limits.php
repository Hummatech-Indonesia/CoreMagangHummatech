<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $limits
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\LimitsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Limits newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Limits newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Limits query()
 * @method static \Illuminate\Database\Eloquent\Builder|Limits whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Limits whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Limits whereLimits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Limits whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Limits extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
}
