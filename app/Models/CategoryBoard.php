<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBoard extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['title', 'hummatask_team_id', 'status'];

    public function teams()
    {
        return $this->belongsTo(HummataskTeam::class, 'hummatask_team_id');
    }
    public function boards()
    {
        return $this->hasMany(Board::class);
    }
}
