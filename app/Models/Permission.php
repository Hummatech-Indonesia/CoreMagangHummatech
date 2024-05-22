<?php

namespace App\Models;

use App\Base\Interfaces\HasStudent;
use App\Enum\PermissionEnum;
use App\Enum\StatusApprovalPermissionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permission extends Model implements HasStudent
{
    use HasFactory;
    // protected $casts = [
    //     'status' => PermissionEnum::class,
    //     'status_approval' => StatusApprovalPermissionEnum::class,
    // ];

    protected $table = 'student_permissions';
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
