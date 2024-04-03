<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $minute
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MaxLate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MaxLate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MaxLate query()
 * @method static \Illuminate\Database\Eloquent\Builder|MaxLate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MaxLate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MaxLate whereMinute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MaxLate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MaxLate extends Model
{
    use HasFactory;

    protected $table = 'max_lates';
    protected $fillable = ['minute'];
    protected $guarded = [];
}
