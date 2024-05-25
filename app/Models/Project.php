<?php

namespace App\Models;

use App\StatusProjectEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['hummatask_team_id', 'title', 'description', 'link', 'start_date', 'end_date', 'status'];
    protected $casts = [
        'status' => StatusProjectEnum::class,
    ];

    /**
     * Get the hummataskTeam that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hummataskTeam(): BelongsTo
    {
        return $this->belongsTo(HummataskTeam::class);
    }

      /**
     * Get all of the studentProjects for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentProjects(): HasMany
    {
        return $this->hasMany(StudentProject::class);
    }

    /**
     * Get the studentTeam associated with the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function studentTeam(): HasOne
    {
        return $this->hasOne(studentTeam::class);
    }
}
