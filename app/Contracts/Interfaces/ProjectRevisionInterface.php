<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Enum\RevisionStatusEnum;

interface ProjectRevisionInterface extends UpdateInterface , StoreInterface
{
    public function getRevisionByPresentation(int $presentationId, string $revisionStatus);
    public function getRevisionByProject(int $projectId, string $statusEnum);

}
