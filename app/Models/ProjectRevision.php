<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectRevision extends Model
{
    use HasFactory;

    protected $table = 'project_revisions';
    protected $guarded = ['id'];

    public function presentation(): BelongsTo
    {
        return $this->belongsTo(Presentation::class);
    }

    public function assignedStudent(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'assigned_task_project_students', 'project_revision_id', 'student_id');
    }
}
