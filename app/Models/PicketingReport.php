<?php

namespace App\Models;

use App\Enum\PicketingStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property string $proof
 * @property string $description
 * @property string $status
 * @method static \Database\Factories\PicketingReportFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport whereProof($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport whereUserId($value)
 * @mixin \Eloquent
 */
class PicketingReport extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    protected $casts = [
        'status' => PicketingStatusEnum::class,
    ];}
