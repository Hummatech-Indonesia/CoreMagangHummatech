<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @method static \Database\Factories\HummataskTeamFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|HummataskTeam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HummataskTeam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HummataskTeam query()
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property int $student_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HummataskTeam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HummataskTeam whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HummataskTeam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HummataskTeam whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HummataskTeam whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HummataskTeam whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HummataskTeam whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HummataskTeam extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get all of the comments for the HummataskTeam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function presentations(): HasMany
    {
        return $this->hasMany(Presentation::class);
    }

    /**
     * Get all of the projects for the HummataskTeam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get the user that owns the HummataskTeam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoryProject(): BelongsTo
    {
        return $this->belongsTo(CategoryProject::class);
    }
    public function categoryBoards()
    {
        return $this->hasMany(CategoryBoard::class);
    }

    /**
     * Get the student that owns the HummataskTeam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

        /**
     * Get all of the studentTeams for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentTeams(): HasMany
    {
        return $this->hasMany(studentTeam::class);
    }
}
