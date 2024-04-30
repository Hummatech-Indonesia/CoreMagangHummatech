<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ChallengeInterface;
use App\Contracts\Interfaces\NotePicketInterface;
use App\Models\NotePicket;

class NotePicketRepository extends BaseRepository implements NotePicketInterface
{
    private NotePicketInterface  $notepicket;

    public function __construct(NotePicket $notepicket)
    {
        $this->model = $notepicket;
    }

    public function get(): mixed
    {
        return $this->model->query()
        ->first();
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
