<?php

namespace App\Models;

use App\Base\Interfaces\HasStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActiveFeature extends Model implements HasStudent
{
    use HasFactory;

    protected $table = 'active_features';
    protected $primaryKey = 'id';
    protected $fillable = ['student_id', 'is_active', 'end_date'];
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
