<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\OrderInterface;
use App\Contracts\Repositories\BaseRepository;
use App\Models\Order;

class OrderRepository extends BaseRepository implements OrderInterface
{
    public function __construct(Order $order)
    {
        $this->model = $order;
    }

    public function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null): mixed
    {
        return $this->model->query()->paginate($perPage, $columns, $pageName, $page);
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }
    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->find($id)->update($data);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()->find($id)->delete();
    }
}
