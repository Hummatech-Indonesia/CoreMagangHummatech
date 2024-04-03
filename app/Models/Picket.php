<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $day_picket
 * @property int $student_id
 * @property string $tim
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PicketFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Picket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Picket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Picket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Picket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picket whereDayPicket($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picket whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picket whereTim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picket whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Picket extends Model
{
    use HasFactory;
    protected $guarded = [];
}
