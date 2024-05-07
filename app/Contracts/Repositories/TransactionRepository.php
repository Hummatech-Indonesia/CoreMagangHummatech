<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TransactionInterface;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionRepository extends BaseRepository implements TransactionInterface
{
    public function __construct(Transaction $transaction)
    {
        $this->model = $transaction;
    }

    /**
     * search
     *
     * @param  mixed $request
     * @return mixed
     */
    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->get();
    }

    /**
     * getByUser
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getByUser(mixed $id): mixed
    {
        return $this->model->query()
            ->where('user_id', $id);
    }

    /**
     * get
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->get();
    }

    /**
     * getByMerchantRef
     *
     * @param  mixed $merchantRef
     * @return mixed
     */
    public function getByMerchantRef(string $merchantRef): mixed
    {
        return $this->model->query()
            ->where('merchant_ref', $merchantRef)
            ->first();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id);
    }

    /**
     * update
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {
        return $this->show($id)
            ->update($data);
    }
}
