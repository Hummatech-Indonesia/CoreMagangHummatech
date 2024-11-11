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
    protected $casts = [
        'status' => StatusProjectEnum::class,
    ];

    public function presentation(): HasMany
    {
        return $this->hasMany(Presentation::class);
    }

    public function members(): HasMany
    {
        return $this->hasMany(HummataskTeamMembers::class);
    }
}
