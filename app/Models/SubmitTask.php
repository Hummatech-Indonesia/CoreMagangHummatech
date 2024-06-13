<?php

namespace App\Models;

use App\Base\Interfaces\HasCourseAssignment;
use App\Base\Interfaces\HasStudent;
use App\Enum\SubmitTaskStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubmitTask extends Model implements HasStudent, HasCourseAssignment
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'char';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = [
        'course_assignment_id',
        'student_id',
        'file',
        'status',
    ];


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
     * courseAssignment
     *
     * @return BelongsTo
     */
    public function courseAssignment(): BelongsTo
    {
        return $this->belongsTo(CourseAssignment::class);
    }

    protected $casts = [
        'status' => SubmitTaskStatusEnum::class,
    ];

}
