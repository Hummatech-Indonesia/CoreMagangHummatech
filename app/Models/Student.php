<?php

namespace App\Models;

use App\Models\Attendance;
use App\Models\WarningLetter;
use App\Models\ResponseLetter;
use App\Base\Interfaces\HasAttendances;
use App\Base\Interfaces\HasOneActiveFeature;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Division;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model implements HasAttendances, HasOneActiveFeature
{
    use HasFactory;

    protected $guarded = [];

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
