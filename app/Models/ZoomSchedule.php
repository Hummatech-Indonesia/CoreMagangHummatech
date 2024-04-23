<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string $title
 * @property string $start_date
 * @property string $end_date
 * @property string $link
 * @property int $mentors_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ZoomScheduleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereMentorsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereUserId($value)
 * @mixin \Eloquent
 */
class ZoomSchedule extends Model
{
    use HasFactory;
     protected $guarded = ['id'];
}
