<?php

namespace App\Models;

use App\Enum\PresentationTypeEnum;
use App\Enum\ProjectAcceptStatus;
use App\Enum\TaskStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'type_project' => PresentationTypeEnum::class,
        'status' => ProjectAcceptStatus::class,
        'status_project' => TaskStatusEnum::class,
    ];
    public function presentation(): HasOne
    {
        return $this->hasOne(Presentation::class);
    }

    public function members(): HasMany
    {
        return $this->hasMany(HummataskTeamMembers::class);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    // public function revision(): HasMany
    // {
    //     return $this->hasMany(ProjectRevision::class);
    // }

    public function getStatus(): ProjectAcceptStatus
    {
        return ProjectAcceptStatus::tryFrom($this->status->value) ?? ProjectAcceptStatus::WAITING;
    }

    public function getProjectStatus(): TaskStatusEnum
    {
        return $this->status_project instanceof TaskStatusEnum
            ? $this->status_project
            : TaskStatusEnum::tryFrom($this->status_project) ?? TaskStatusEnum::PENDING;
    }
}
