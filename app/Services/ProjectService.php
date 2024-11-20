<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Project;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreSaleRequest;

class ProjectService
{
    use UploadTrait;

    /**
     * Handle custom upload validation.
     *
     * @param string $disk
     * @param object $file
     * @param string|null $old_file
     * @return string
     */
    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    /**
     * Handle store data event to models.
     *
     * @param StoreSaleRequest $request
     *
     * @return array|bool
     */
    public function store($data): array|bool
    {
        $data['hummatask_team_id'] = $data->id;
        $data['title'] = $data->name;
        $data['start_date'] = Carbon::now()->toDateString();
        $data['end_date'] = Carbon::now()->addWeek()->toDateString();

        if ($data) {
            return $data;
        }
        return false;   
    }

    public function getProjectsWithSearch(?string $search)
    {
        return Project::with('student')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhereHas('student', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    });
            })
            ->orderBy('created_at', 'desc');
    }

    // public function updateProjectStatus(int $projectId, string $status)
    // {
    //     if (!in_array($status, ['accepted', 'rejected'])) {
    //         throw new \InvalidArgumentException('Status tidak valid.');
    //     }

    //     $project = Project::findOrFail($projectId);
    //     $project->status = $status;
    //     $project->save();
    // }
}
