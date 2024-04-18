<?php

namespace App\Models;

use App\Base\Interfaces\HasAttendance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $attendance_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Attendance $attendance
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail whereAttendanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AttendanceDetail extends Model implements HasAttendance
{
    use HasFactory;

    protected $table = 'attendance_details';
    protected $fillable = ['attendance_id', 'status'];
    protected $guarded = [];

    /**
     * attendance
     *
     * @return BelongsTo
     */
    public function attendance(): BelongsTo
    {
        return $this->belongsTo(Attendance::class);
    }

}
