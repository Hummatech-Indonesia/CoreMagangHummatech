<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AlumniInterface;
use App\Models\Alumni;

class AlumniRepository extends BaseRepository implements AlumniInterface
{
    private Alumni  $alumni;

    public function __construct(Alumni $alumni)
    {
        $this->model = $alumni;
    }

    public function get(): mixed
    {
        return $this->model->query()
        ->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()
        ->create($data);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()
        ->findOrFail($id)
        ->delete($id);
    }
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()
        ->findOrFail($id)
        ->update($data);
    }
}
