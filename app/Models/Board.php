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
        $end = Carbon::parse($this->end_date);
        $now = Carbon::now();

        // Hitung selisih hari
        $diffInDays = $now->diffInDays($end);

        if ($diffInDays > 0) {
            // Selisih hari masih positif, menampilkan waktu yang tersisa
            return "Kurang {$diffInDays} hari";
        } elseif ($diffInDays == 0) {
            // Hari ini adalah deadline
            return "Hari ini adalah deadline";
        } else {
            // Deadline telah terlewati
            return "Sudah melewati deadline";
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
