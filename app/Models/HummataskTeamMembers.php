<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HummataskTeamMembers extends Model
{
    use HasFactory;
    protected $table = 'hummatask_teams_members';
    protected $guarded = ['id'];
    
    public function presentation(): BelongsTo
    {
        return $this->belongsTo(Presentation::class, 'presentation_id');
    }
}
