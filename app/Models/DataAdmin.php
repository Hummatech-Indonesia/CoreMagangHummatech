<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $image
 * @property string $name
 * @property string $company
 * @property string $field
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\DataAdminFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin query()
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DataAdmin extends Model
{
    use HasFactory;

    protected $guarded = [];
}
