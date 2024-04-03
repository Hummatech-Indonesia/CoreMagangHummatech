<?php

namespace App\Models;

use App\Enum\TaskSubmissionStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $task_id
 * @property int $user_id
 * @property string|null $file
 * @property string|null $status
 * @property string|null $comment
 * @property int|null $rating
 * @property-read \App\Models\Task $task
 * @method static \Database\Factories\TaskSubmissionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereUserId($value)
 * @mixin \Eloquent
 */
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
