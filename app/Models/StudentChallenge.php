<?php

namespace App\Models;

use App\Enum\ChallengeStatusEnum;
use App\Enum\TaskStudentStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


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
