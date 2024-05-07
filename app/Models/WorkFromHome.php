<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkFromHome extends Model
{
    use HasFactory;

    protected $table = 'work_from_homes';
    protected $primaryKey = 'id';

    protected $fillable = ['is_on', 'date'];
    protected $guarded = [];
}
