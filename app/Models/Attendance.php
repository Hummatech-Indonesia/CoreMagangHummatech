<?php

namespace App\Models;

use App\Base\Interfaces\HasAttendanceDetails;
use App\Base\Interfaces\HasStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attendance extends Model implements HasStudent, HasAttendanceDetails
{
    use HasFactory;

    protected $table = 'attendances';
    protected $primaryKey = 'id';
    protected $fillable = ['student_id', 'status', 'is_admin', 'created_at', 'updated_at'];
    protected $guarded = [];

    /**
     * student
     *
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * attendanceDetails
     *
     * @return HasMany
     */
    public function attendanceDetails(): HasMany
    {
        return $this->hasMany(AttendanceDetail::class);
    }
}
