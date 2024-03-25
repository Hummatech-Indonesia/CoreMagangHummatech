<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\JournalInterface;
use App\Models\Journal;
use Carbon\Carbon;

class JournalRepository extends BaseRepository implements JournalInterface
{
    public function __construct(Journal $journal)
    {
        $this->model = $journal;
    }

    public function get(): mixed
    {
        return $this->model->query()->where('user_id', auth()->user()->id)->get();
    }

    public function store(array $data): mixed
    {
                    $data['user_id'] = auth()->user()->id;
                    $data['status'] = 'fillin';
                    return $this->model->query()->create($data);
    }

    public function where(): mixed
    {
        return $this->model->query()
                ->where('user_id', auth()->user()->id)
                ->where('created_at', '>=', now()->startOfDay())
                ->where('created_at', '<=', now()->endOfDay())
                ->first();
    }
    public function update(mixed $id, array $data): mixed
    {
        $data['user_id'] = auth()->user()->id;
        return $this->model->query()->findOrFail($id)->update($data);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete($id);
    }
}
