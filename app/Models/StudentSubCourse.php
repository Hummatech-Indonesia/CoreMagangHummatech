<?php

namespace App\Models;

use App\Base\Interfaces\HasStudent;
use App\Base\Interfaces\HasSubCourse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentSubCourse extends Model implements HasStudent, HasSubCourse
{
    use HasFactory;

    protected $table = 'student_sub_courses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'student_id',
        'sub_course_id',
        'position',
    ];
    protected $guarded = [];

    /**
     *
     * student
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * sub course
     * @return BelongsTo
     */
    public function subCourse(): BelongsTo
    {
        return $this->belongsTo(SubCourse::class);
    }
}
