<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $qr
 * @property int $data_admin_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SignatureFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Signature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Signature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Signature query()
 * @method static \Illuminate\Database\Eloquent\Builder|Signature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Signature whereDataAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Signature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Signature whereQr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Signature whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Signature extends Model
{
    use HasFactory;

    protected $guarded = [];
}
