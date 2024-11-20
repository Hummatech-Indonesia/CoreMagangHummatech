<?php

namespace App\Contracts\Interfaces;

interface ProjectSubmissionInterface
{
    public function getProjectsWithSearch(?string $search);
    public function updateProjectStatus(int $projectId, string $status);
}
