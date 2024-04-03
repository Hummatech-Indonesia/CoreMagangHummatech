<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property string $id
 * @property string $checkin_starts
 * @property string $checkin_ends
 * @property string $break_starts
 * @property string $break_ends
 * @property string $return_starts
 * @property string $return_ends
 * @property string $checkout_starts
 * @property string $checkout_ends
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule query()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereBreakEnds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereBreakStarts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereCheckinEnds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereCheckinStarts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereCheckoutEnds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereCheckoutStarts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereReturnEnds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereReturnStarts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AttendanceRule extends Model
{
    use HasFactory;
    protected $table = 'attendance_rules';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType = 'char';

    protected $guarded = [];
}
