<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCoursePosition extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = [
        'student_id',
        'course_id',
        'position',
    ];
}
