<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCourse extends Model
{
    use HasFactory;
    protected $guarded = [];

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
