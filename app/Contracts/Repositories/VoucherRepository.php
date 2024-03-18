<?php
namespace App\Contracts\Repositories;

use App\Models\Product;
use App\Models\Voucher;
use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Interfaces\VoucherInterface;

class VoucherRepository extends BaseRepository implements VoucherInterface
{
    private Voucher  $voucher;
    public function __construct(Voucher $voucher)
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
