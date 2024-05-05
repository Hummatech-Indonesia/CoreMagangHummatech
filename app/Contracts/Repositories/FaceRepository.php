<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\FaceInterface;
use App\Models\Face;

class FaceRepository extends BaseRepository implements FaceInterface
{

    public function __construct(Face $face)
    {
        $this->model = $face;
    }

    public function get(): mixed
    {
        return $this->model->query()
        ->get();
    }

}
