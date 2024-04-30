<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property int $course_id
 * @property int $sub_course_id
 * @property int $unlock
 * @property-read \App\Models\Course $course
 * @property-read mixed $next
 * @property-read mixed $previous
 * @property-read \App\Models\SubCourse $subCourse
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\SubCourseUnlockFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock whereSubCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock whereUnlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock whereUserId($value)
 * @property int $student_id
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock whereStudentId($value)
 * @mixin \Eloquent
 */
class SubCourseUnlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'sub_course_id',
        'unlock',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function subCourse(): BelongsTo
    {
        return $this->belongsTo(SubCourse::class);
    }

    public function getNextAttribute()
    {
        return $this->where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }

    public function getPreviousAttribute()
    {
        return $this->where('id', '<', $this->id)->orderBy('id', 'asc')->first();
    }
}
