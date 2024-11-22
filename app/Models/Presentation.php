<?php

namespace App\Models;

use App\Models\ProjectRevision;
use App\Enum\StatusPresentationEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presentation extends Model
{
    use HasFactory;
    protected  $guarded = ['id'];


    /**
     * Get the user that owns the Presentation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hummataskTeam()
    {
        return $this->belongsTo(HummataskTeam::class, 'hummatask_team_id');
    }

    /**
     * Get the mentor that owns the Presentation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
    public function students(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function members(): HasMany
    {
        return $this->hasMany(HummataskTeamMembers::class, 'presentation_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function revision(): HasMany
    {
        return $this->hasMany(ProjectRevision::class, 'presentation_id');
    }

    protected $casts = [
        'status_presentation' => StatusPresentationEnum::class,
    ];
}
