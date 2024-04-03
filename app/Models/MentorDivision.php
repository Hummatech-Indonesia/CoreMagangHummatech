<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $mentor_id
 * @property int $division_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Division $division
 * @property-read \App\Models\Mentor $mentor
 * @method static \Database\Factories\MentorDivisionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision query()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision whereMentorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MentorDivision extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class , 'division_id');
    }
}
