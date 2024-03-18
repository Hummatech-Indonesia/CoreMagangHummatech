<?php

namespace App\Models;

use App\Base\Interfaces\HasAttendance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
