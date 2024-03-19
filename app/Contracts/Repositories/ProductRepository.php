<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ProductInterface;
use App\Models\Product;

class ProductRepository extends BaseRepository implements ProductInterface
{
    private ProductInterface  $product;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getProductsBasedOnDivision(int $division): mixed
    {
        return $this->model->query()
            ->where('division_id', $division)
            ->get();
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
