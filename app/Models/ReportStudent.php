<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $student_id
 * @property string $image
 * @property string $description
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ReportStudentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ReportStudent extends Model
{
    use HasFactory;
    protected $guarded = [];
}
