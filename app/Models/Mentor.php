<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Division|null $division
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MentorDivision> $mentordivision
 * @property-read int|null $mentordivision_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MentorStudent> $mentorstudent
 * @property-read int|null $mentorstudent_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Student> $students
 * @property-read int|null $students_count
 * @method static \Database\Factories\MentorFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Challenge> $challenge
 * @property-read int|null $challenge_count
 * @mixin \Eloquent
 */
class Mentor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class , 'division_id');
    }

    public function mentorstudent()
    {
        return $this->hasMany(MentorStudent::class);
    }

    public function mentordivision()
    {
        return $this->hasMany(MentorDivision::class);
    }

    public function challenge()
    {
        return $this->hasMany(Challenge::class);
    }
}
