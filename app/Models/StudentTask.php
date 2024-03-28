<?php

namespace App\Models;

use App\Models\Task;
use App\Enum\TaskStudentStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class StudentTask extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public static function getStatuses(): Collection
    {
        return collect(TaskStudentStatusEnum::cases())->pluck('value');
    }

    public function getStatus(): TaskStudentStatusEnum
    {
        return match($this->status) {
            'pending' => TaskStudentStatusEnum::PENDING,
            'completed' => TaskStudentStatusEnum::COMPLETED,
            default => TaskStudentStatusEnum::PENDING
        };
    }
}
