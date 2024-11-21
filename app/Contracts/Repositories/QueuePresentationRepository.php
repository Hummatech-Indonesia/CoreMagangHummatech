<?php

namespace App\Contracts\Repositories;

use App\Models\QueuePresentation;

class QueuePresentationRepository extends BaseRepository implements QueuePresentationInterface
{
    function __construct(QueuePresentation $queuePresentation){
        $this->model = $queuePresentation;
    }

    public function getQueueByDivision(int $divisionId)
    {
        return $this->model->query()
            ->with('division')
            ->where('division_id', $divisionId)
            ->first();
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->findOrFail($id)->update($data);
    }
}
