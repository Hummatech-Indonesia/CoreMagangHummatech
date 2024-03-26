<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorDivision extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class , 'division_id');
    }
}
