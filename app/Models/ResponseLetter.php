<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $student_id
 * @property string $letter_number
 * @property string $letter_file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Student $student
 * @method static \Database\Factories\ResponseLetterFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter whereLetterFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter whereLetterNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ResponseLetter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
