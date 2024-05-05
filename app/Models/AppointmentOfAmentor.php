<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentOfAmentor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mentors()
    {
        return $this->belongsTo(Mentor::class , 'mentor_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class , 'course_id');
    }
}
