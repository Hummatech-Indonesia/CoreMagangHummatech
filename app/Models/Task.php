<?php

namespace App\Models;

use App\Enum\TaskLevelEnum;
use App\Enum\TaskStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Task extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function subCourse(): BelongsTo
    {
        return $this->belongsTo(SubCourse::class, 'sub_course_id');
    }

    public function submissions(): HasMany
    {
        return $this->hasMany(TaskSubmission::class, 'task_id');
    }

    public static function getLevels(): Collection
    {
        return collect(TaskLevelEnum::cases())->pluck('value');
    }

    public static function getStatuses(): Collection
    {
        return collect(TaskStatusEnum::cases())->pluck('value');
    }

    public function getStatus(): TaskStatusEnum
    {
        return match($this->status) {
            'pending' => TaskStatusEnum::PENDING,
            'inprogress' => TaskStatusEnum::INPROGRESS,
            'completed' => TaskStatusEnum::COMPLETED,
            default => TaskStatusEnum::PENDING,
        };
    }

    public function getLevel(): TaskLevelEnum
    {
        return match($this->level) {
            'easy' => TaskLevelEnum::EASY,
            'normal' => TaskLevelEnum::NORMAL,
            'hard' => TaskLevelEnum::HARD,
            default => TaskLevelEnum::NORMAL,
        };
    }

    /**
     * Get all of the studentTasks for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentTasks(): HasMany
    {
        return $this->hasMany(StudentTask::class);
    }
}
