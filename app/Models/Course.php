<?php

namespace App\Models;

use App\Base\Interfaces\HasActiveCourses;
use App\Base\Interfaces\HasCourseAssignments;
use App\Base\Interfaces\HasOneCourseAssignment;
use App\Base\Interfaces\HasStudentCoursePositions;
use App\Base\Interfaces\HasSubCourses;
use App\Enum\StatusCourseEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model implements HasActiveCourses, HasSubCourses, HasStudentCoursePositions, HasCourseAssignments
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = ['title', 'price', 'status', 'image', 'description', 'division_id', 'position'];
    protected $guarded = [];

    /**
     * courseAssignments
     *
     * @return HasMany
     */
    public function courseAssignments(): HasMany
    {
        return $this->hasMany(CourseAssignment::class);
    }

    /**
     * studentCoursePositions
     *
     * @return HasMany
     */
    public function studentCoursePositions(): HasMany
    {
        return $this->hasMany(StudentCoursePosition::class);
    }

    /**
     * subCourses
     *
     * @return HasMany
     */
    public function subCourses(): HasMany
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
