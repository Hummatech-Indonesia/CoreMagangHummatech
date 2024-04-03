<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property string $start
 * @property string $end
 * @property string $reason
 * @property string $admin_note
 * @property string $proof_of_doctor_notes
 * @property string|null $status
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\AbsenteePermitFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit query()
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereAdminNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereProofOfDoctorNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereUserId($value)
 * @mixin \Eloquent
 */
class AbsenteePermit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @param array $fillable
     */
    protected $fillable = [
        'user_id',
        'date',
        'from',
        'to',
        'reason',
        'admin_note',
        'status',
        'proof_of_doctor_notes',
    ];

    /**
     * Get the user that owns the AbsenteePermit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
