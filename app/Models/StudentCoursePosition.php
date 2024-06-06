<?php

namespace App\Models;

use App\Base\Interfaces\HasStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentCoursePosition extends Model implements HasStudent
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = [
        'student_id',
        'position',
    ];

    /**
     * student
     *
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
