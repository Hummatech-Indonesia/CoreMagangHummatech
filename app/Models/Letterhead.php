<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $logo
 * @property string $letterhead_top
 * @property string $letterhead_middle
 * @property string $letterhead_bottom
 * @property string $footer
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\LetterheadFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead query()
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereFooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereLetterheadBottom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereLetterheadMiddle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereLetterheadTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereUserId($value)
 * @mixin \Eloquent
 */
class Letterhead extends Model
{
    use HasFactory;
    protected $guarded = [];

}
