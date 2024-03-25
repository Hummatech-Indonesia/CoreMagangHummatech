<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCourse extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
