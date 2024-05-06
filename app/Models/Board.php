<?php

namespace App\Models;

use Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function countdown()
    {
        if (!empty($this->start_date) && !empty($this->end_date)) {
            $start = Carbon::parse($this->start_date);
            $end = Carbon::parse($this->end_date);
            $now = Carbon::now();

            $diffInDays = $start->diffInDays($end);

            if ($now->greaterThan($end)) {
                return 'Melebihi deadline';
            } else {
                return $diffInDays . ' hari lagi';
            }
        } else {
            return '';
        }
    }


    public function categoryBoard()
    {
        return $this->belongsTo(CategoryBoard::class);
    }
    public function studentProject()
    {
        return $this->belongsTo(StudentProject::class);
    }
}
