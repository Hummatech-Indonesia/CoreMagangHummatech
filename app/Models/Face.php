<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Face extends Model
{
    use HasFactory;

    protected $table = 'faces';
    protected $primaryKey = 'id';
    public $keyType = 'char';
    public $incrementing = false;

    protected $fillable = ['student_id', 'photo'];
    protected $guarded = [];

    /**
     * student
     *
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

}
