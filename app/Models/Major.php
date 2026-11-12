<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Major extends Model
{
    public $table = 'majors';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = ['name'];

    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * Get all of the students for the Major
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
