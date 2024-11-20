<?php

namespace App\Contracts\Repositories;

use App\Models\Project;
use App\Contracts\Interfaces\ProjectSubmissionInterface;

class ProjectSubmissionRepository implements ProjectSubmissionInterface
{
    public function getProjectsWithSearch(?string $search)
    {
        return Project::with('student')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhereHas('student', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function updateProjectStatus(int $projectId, string $status)
    {
        if (!in_array($status, ['accepted', 'rejected'])) {
            throw new \InvalidArgumentException('Status tidak valid.');
        }

        $project = Project::findOrFail($projectId);
        $project->status = $status;
        $project->save();
    }
}
