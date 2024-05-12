<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature_CO extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function ceo()
    {
        return $this->belongsTo(DataCO::class ,'data_c_o_s_id');
    }
}
