<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $student_id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Student $student
 * @method static \Database\Factories\JournalFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Journal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Journal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Journal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Journal extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function student()
    {
        return $this->belongsTo(Student::class ,'student_id');
    }
}
