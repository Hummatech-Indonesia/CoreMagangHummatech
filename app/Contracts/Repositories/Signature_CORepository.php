<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\DataAdminInterface;
use App\Contracts\Interfaces\Signature_COInterface;
use App\Contracts\Interfaces\SignatureInterface;
use App\Models\AbsenteePermit;
use App\Models\DataAdmin;
use App\Models\Signature;
use App\Models\Signature_CO;
use App\Models\Student;

class Signature_CORepository extends BaseRepository implements Signature_COInterface
{
    public function __construct(Signature_CO $signature)
    {
        $this->model = $signature;
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
        return $this->model->query()->findOrFail($id)->delete($id);
    }

    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }
}
