<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $student_id
 * @property string $status
 * @property string $date
 * @property string $reference_number
 * @property string $reason
 * @property string $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Student $student
 * @method static \Database\Factories\WarningLetterFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter query()
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WarningLetter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
