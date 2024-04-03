<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property int|null $price
 * @property string $status
 * @property string $image
 * @property string $description
 * @property int $division_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Division $division
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SubCourse> $subCourse
 * @property-read int|null $sub_course_count
 * @method static \Database\Factories\CourseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subCourse()
    {
        return $this->hasMany(SubCourse::class);
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

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
