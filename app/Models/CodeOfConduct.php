<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $file
 * @method static \Database\Factories\CodeOfConductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CodeOfConduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CodeOfConduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CodeOfConduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|CodeOfConduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CodeOfConduct whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CodeOfConduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CodeOfConduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CodeOfConduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'file'
    ];
}
