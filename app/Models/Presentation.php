<?php

namespace App\Models;

use App\Enum\StatusPresentationEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Presentation extends Model
{
    use HasFactory;
    protected  $guarded = ['id'];
    protected $fillable = [
        'division_id',
        'urutan',
        'project_name',
        'mentor_id',
        'description',
        'start_date',
        'end_date',
        'type_project',
        'status_presentation',
        'planning_date_presentation'
    ];

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

    protected $casts = [
        'status_presentation' => StatusPresentationEnum::class,
    ];
}
