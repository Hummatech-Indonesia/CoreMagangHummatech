<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseUnlock extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function subCourse()
    {
        return $this->belongsTo(SubCourse::class);
    }
}
