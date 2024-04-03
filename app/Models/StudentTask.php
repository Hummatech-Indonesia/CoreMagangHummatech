<?php

namespace App\Models;

use App\Enum\TaskStudentStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * 
 *
 * @property int $id
 * @property int $student_id
 * @property int $task_id
 * @property string $file
 * @property string $status
 * @property int|null $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Student $student
 * @property-read \App\Models\Task $task
 * @method static \Database\Factories\StudentTaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
