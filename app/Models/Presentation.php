<?php

namespace App\Models;

use App\Enum\StatusPresentationEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Presentation extends Model
{
    use HasFactory;
    protected  $guarded = ['id'];
    protected $fillable = [
        'start_date',
        'end_date',
        'schedule_to',
        'hummatask_team_id',
        'mentor_id',
        'status_presentation',
        'callback',
        'title',
        'description',
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

    protected $casts = [
        'status_presentation' => StatusPresentationEnum::class,
    ];
}
