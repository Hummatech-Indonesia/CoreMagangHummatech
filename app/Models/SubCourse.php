<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $file_course
 * @property string $video_course
 * @property string $image_course
 * @property int $course_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @property-read \App\Models\SubCourseUnlock|null $subCourseUnlock
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Task> $task
 * @property-read int|null $task_count
 * @method static \Database\Factories\SubCourseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereFileCourse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereImageCourse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereVideoCourse($value)
 * @mixin \Eloquent
 */
class SubCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'file_course',
        'video_course',
        'image_course',
        'course_id',
    ];

    public function subCourseUnlock(): mixed
    {
        return $this->hasOne(SubCourseUnlock::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
