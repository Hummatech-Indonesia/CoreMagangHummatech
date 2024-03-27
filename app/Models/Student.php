<?php

namespace App\Models;

use App\Base\Interfaces\HasAttendances;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model implements HasAttendances
{
    use HasFactory;

    protected $guarded = [];

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
    /**
     * Get all of the taskAnswers for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taskAnswers(): HasMany
    {
        return $this->hasMany(TaskAnswer::class);
    }
}
