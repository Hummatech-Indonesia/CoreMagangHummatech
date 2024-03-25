<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subCourse()
    {
        return $this->hasMany(SubCourse::class);
    }

    /**
     * Count total task
     *
     * @return int
     */
    public function countTotalTask(): int
    {
        return $this->subCourse->map(function($item) {
            return $item->task->count();
        })->sum();
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
