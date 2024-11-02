<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueuePresentation extends Model
{
    use HasFactory;
    protected $table = 'queue_presentations';
    public $timestamps = false;
    protected $fillable = [
        'queue',
    ];
}
