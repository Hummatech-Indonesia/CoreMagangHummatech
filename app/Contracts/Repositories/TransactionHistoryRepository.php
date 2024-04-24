<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TransactionHistoryInterface;
use App\Models\TransactionHistory;

class TransactionHistoryRepository extends BaseRepository implements TransactionHistoryInterface
{
    public function __construct(TransactionHistory $transactionHistory)
    {
        $this->model = $transactionHistory;
    }

    public function getId(string $id): mixed
    {
        return $this->model->where('reference', $id);
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null): mixed
    {
        return $this->model->query()->paginate($perPage, $columns, $pageName, $page);
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->where('id', $id)->update($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->where('id', $id)->delete();
    }
}
