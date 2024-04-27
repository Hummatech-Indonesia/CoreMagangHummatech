<?php

namespace App\Models;

use App\Enum\ChallengeStatusEnum;
use App\Enum\TaskStudentStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


/**
 * 
 *
 * @property int $id
 * @property int $student_id
 * @property int $challenge_id
 * @property string $file
 * @property string $status
 * @property int|null $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Challenge $challenge
 * @property-read \App\Models\Student $student
 * @method static \Database\Factories\StudentChallengeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|StudentChallenge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentChallenge newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentChallenge query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentChallenge whereChallengeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentChallenge whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentChallenge whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentChallenge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentChallenge whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentChallenge whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentChallenge whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentChallenge whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StudentChallenge extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function getStatuses(): Collection
    {
        return collect(ChallengeStatusEnum::cases())->pluck('value');
    }

    public function getStatus(): TaskStudentStatusEnum
    {
        return match($this->status) {
            'pending' => TaskStudentStatusEnum::PENDING,
            'completed' => TaskStudentStatusEnum::COMPLETED,
            default => TaskStudentStatusEnum::PENDING
        };
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }
}
