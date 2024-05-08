<?php

namespace App\Models;

use App\Base\Interfaces\HasActiveCourses;
use App\Models\Attendance;
use App\Models\WarningLetter;
use App\Models\ResponseLetter;
use App\Base\Interfaces\HasAttendances;
use App\Base\Interfaces\HasOneActiveFeature;
use App\Base\Interfaces\HasOneUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Division;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model implements HasAttendances, HasOneActiveFeature, HasActiveCourses, HasOneUser
{
    use HasFactory;

    protected $guarded = [];

    /**
     * hasOneUser
     *
     * @return HasOne
     */
    public function hasOneUser(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * activeFeature
     *
     * @return HasOne
     */
    public function activeFeature(): HasOne
    {
        return $this->hasOne(ActiveFeature::class);
    }

    /**
     * attendances
     *
     * @return HasMany
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
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

    public function warningLetters(): HasMany
    {
        return $this->hasMany(WarningLetter::class);
    }

    public function responseLetters(): HasMany
    {
        return $this->hasMany(ResponseLetter::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function mentorstudent()
    {
        return $this->hasMany(MentorStudent::class);
    }

    /**
     * Get all of the studentTasks for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentTasks(): HasMany
    {
        return $this->hasMany(StudentTask::class);
    }
    public function studentChallenge(): HasMany
    {
        return $this->hasMany(StudentChallenge::class);
    }

    /**
     * Get all of the studentProjects for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentProjects(): HasMany
    {
        return $this->hasMany(StudentProject::class);
    }
    public function faces(): HasMany
    {
        return $this->hasMany(Face::class);
    }

    /**
     * Get all of the studentTeams for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentTeams(): HasMany
    {
        return $this->hasMany(studentTeam::class);
    }
}
