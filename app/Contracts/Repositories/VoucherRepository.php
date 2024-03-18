<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Interfaces\VoucherInterface;
use App\Models\Product;

class VoucherRepository extends BaseRepository implements VoucherInterface
{
    private VoucherInterface  $voucher;
    public function __construct(VoucherInterface $voucher)
    {
        $this->model = $voucher;
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
