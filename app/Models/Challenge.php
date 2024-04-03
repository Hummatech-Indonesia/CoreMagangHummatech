<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @method static \Database\Factories\ChallengeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Challenge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Challenge newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Challenge query()
 * @mixin \Eloquent
 */
class Challenge extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
}
