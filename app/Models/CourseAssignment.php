<?php

namespace App\Models;

use App\Base\Interfaces\HasCourse;
use App\Base\Interfaces\HasSubmitTasks;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseAssignment extends Model implements HasCourse, HasSubmitTasks
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'char';
    public $incrementing = false;

    protected $fillable = ['title', 'description', 'course_id'];
    protected $guarded = [];

    /**
     * course
     *
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * submitTasks
     *
     * @return HasMany
     */
    public function submitTasks(): HasMany
    {
        return $this->hasMany(SubmitTask::class);
    }
}
