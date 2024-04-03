<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Mentor> $Mentor
 * @property-read int|null $mentor_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Course> $course
 * @property-read int|null $course_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MentorDivision> $mentordivision
 * @property-read int|null $mentordivision_count
 * @method static \Database\Factories\DivisionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Division newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division query()
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Division extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Mentor()
    {
        return $this->hasMany(Mentor::class);
    }

    public function course()
    {
        return $this->hasMany(Course::class);
    }

    public function mentordivision()
    {
        return $this->hasMany(MentorDivision::class);
    }


}
