<?php

namespace App\Models;

use App\Enum\StatusHummaTeamEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HummataskTeam extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = ['name', 'image', 'description', 'slug', 'category_project_id', 'student_id', 'division_id', 'status'];
    protected $guarded = ['id'];
    protected $casts = [
        'status' => StatusHummaTeamEnum::class,
    ];

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
        return $this->belongsTo(CategoryProject::class , 'category_project_id');
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

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    // public function presentation(): HasMany
    // {
    //     return $this->hasMany(Presentation::class);
    // }
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

}
