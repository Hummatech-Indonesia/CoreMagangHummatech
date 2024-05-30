<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAssignment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'char';
    public $incrementing = false;

    protected $fillable = [
        'title',
        'description',
        'type',
    ];
    protected $guarded = [];
}
