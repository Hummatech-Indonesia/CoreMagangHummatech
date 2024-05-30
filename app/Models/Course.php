<?php

namespace App\Models;

use App\Base\Interfaces\HasActiveCourses;
use App\Enum\StatusCourseEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model implements HasActiveCourses
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = ['title', 'price', 'status', 'image', 'description', 'division_id', 'position',];
    protected $guarded = [];

    public function subCourse()
    {
        return $this->hasMany(SubCourse::class);
    }

    /**
     * activeCourses
     *
     * @return HasMany
     */
    public function activeCourses(): HasMany
    {
        return $this->hasMany(ActiveCourse::class);
    }

    public function getStatus(): StatusCourseEnum
    {
        return match($this->status) {
            'paid' => StatusCourseEnum::PAID,
            'subcribe' => StatusCourseEnum::SUBCRIBE
        };
    }

    /**
     * Count total task
     *
     * @return int
     */
    public function countTotalTask(): int
    {
        return $this->subCourse->map(function($item) {
            return $item->task->count();
        })->sum();
    }

    public function getAllTask()
    {
        return $this->subCourse->map(function($item) {
            return $item->task;
        })->flatten();
    }

    public function courseUnlock()
    {
        return $this->hasMany(CourseUnlock::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
