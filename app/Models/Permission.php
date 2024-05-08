<?php

namespace App\Models;

use App\Base\Interfaces\HasStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permission extends Model implements HasStudent
{
    use HasFactory;

    protected $table = 'permissions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'student_id',
        'status',
        'description',
        'proof',
        'status_approval',
        'proof',
        'start',
        'end',
    ];
    protected $guarded = [];

    /**
     * student
     *
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
