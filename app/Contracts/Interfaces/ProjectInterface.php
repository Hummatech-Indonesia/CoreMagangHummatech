<?php
namespace App\Contracts\Interfaces;

use Illuminate\Http\Request;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface ProjectInterface extends GetInterface, StoreInterface, UpdateInterface, DeleteInterface, ShowInterface
{
    /**
     *
     * update by team id
     * @param mixed $id
     * @param array $data
     * @return mixed
     *
     */
    public function updateByTeamId(mixed $id, array $data): mixed;

    public function where($parameter, $value): mixed;

    public function whereIn($parameter, array $values): mixed;

    public function accProject(mixed $id, array $data): mixed;
    public function rejectProject(mixed $id, array $data, Request $request): mixed;
    public function getProjectAccepted($id): mixed;

    public function getQueueProjectPresentation($id): mixed;

    public function upcomingproject(int $userId): mixed;

    public function getProjectRevision(int $projectId): mixed;

    public function getProjectWithRevision(int $projectId, $parameter = null, $value = null);

}
