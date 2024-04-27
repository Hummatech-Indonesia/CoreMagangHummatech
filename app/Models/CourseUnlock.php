<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $student_id
 * @property int $course_id
 * @property int $unlock
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SubCourse|null $subCourse
 * @method static \Database\Factories\CourseUnlockFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUnlock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUnlock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUnlock query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUnlock whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUnlock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUnlock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUnlock whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUnlock whereUnlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUnlock whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
