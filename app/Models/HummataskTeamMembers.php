<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HummataskTeamMembers extends Model
{
    use HasFactory;
    protected $table = 'hummatask_teams_members';
    protected $guarded = ['id'];
}
