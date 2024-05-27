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

    /**
     * Get the user that owns the Presentation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hummataskTeam()
    {
        return $this->belongsTo(HummataskTeam::class, 'hummatask_team_id');
    }

    protected $casts = [
        'status_presentation' => StatusPresentationEnum::class,
    ];
}
