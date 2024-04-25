<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseUnlock extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = [
        'student_id',
        'course_id',
        'unlock',
    ];

    /**
     * Get the student that owns the CourseUnlock
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subCourse(): BelongsTo
    {
        return $this->belongsTo(SubCourse::class);
    }
}
