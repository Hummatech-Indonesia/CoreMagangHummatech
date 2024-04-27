<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Repositories\BaseRepository;
use App\Models\VoucherUsage;

class VoucherUsageRepository extends BaseRepository implements VoucherUsageInterface
{
    public function __construct(VoucherUsage $voucherUsage)
    {
        $this->model = $voucherUsage;
    }

    public function get(): mixed
    {
        return $this->model->query()->first();
    }
    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete();
    }
}
