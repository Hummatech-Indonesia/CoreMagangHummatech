<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceRule extends Model
{
    use HasFactory;
    protected $table = 'attendance_rules';
    protected $primaryKey = 'id';

    protected $guarded = [];
    protected $fillable = ['day', 'checkin_starts', 'checkin_ends', 'break_starts', 'break_ends', 'return_starts', 'return_ends', 'checkout_starts', 'checkout_ends'];
}