<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCourseUnlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'sub_course_id',
        'unlock',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function subCourse(): BelongsTo
    {
        return $this->belongsTo(SubCourse::class);
    }

    public function getNextAttribute()
    {
        return $this->where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }

    public function getPreviousAttribute()
    {
        return $this->where('id', '<', $this->id)->orderBy('id', 'asc')->first();
    }
}
