<?php

namespace App\Models;

use App\Enum\TaskSubmissionStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class TaskSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_id',
        'file',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public static function getStatuses(): Collection
    {
        return collect(TaskSubmissionStatusEnum::cases())->pluck('value');
    }

    public function getStatus(): TaskSubmissionStatusEnum
    {
        return match($this->status) {
            'pending' => TaskSubmissionStatusEnum::PENDING,
            'curated' => TaskSubmissionStatusEnum::CURATED,
            'rejected' => TaskSubmissionStatusEnum::REJECTED,
            'completed' => TaskSubmissionStatusEnum::COMPLETED,
            default => TaskSubmissionStatusEnum::PENDING
        };
    }
}
