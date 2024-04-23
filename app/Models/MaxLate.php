<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaxLate extends Model
{
    use HasFactory;

    protected $table = 'max_lates';
    protected $fillable = ['minute'];
    protected $guarded = [];
}
