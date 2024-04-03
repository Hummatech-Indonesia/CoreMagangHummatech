<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $mentor_id
 * @property int $student_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Mentor $mentor
 * @property-read \App\Models\Student $student
 * @method static \Database\Factories\MentorStudentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent query()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent whereMentorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MentorStudent extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

}
