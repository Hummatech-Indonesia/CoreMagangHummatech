<?php

namespace App\Services;

use App\Enum\TypeEnum;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\StoreTaskAnswerRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Http\Requests\UpdateTaskAnswerRequest;
use App\Models\Sale;
use App\Models\TaskAnswer;

class TaskAnswerService
{
    use UploadTrait;

    /**
     * Handle custom upload validation.
     *
     * @param string $disk
     * @param object $file
     * @param string|null $old_file
     * @return string
     */
    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    /**
     * Handle store data event to models.
     *
     * @param StoreSaleRequest $request
     *
     * @return array|bool
     */
    public function store(StoreTaskAnswerRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $data['file'] = $request->file('file')->store(TypeEnum::TASKANSWER->value, 'public');
            return $data;
        }
        return false;
    }

    /**
     * Handle update data event to models.
     *
     * @param Sale $sale
     * @param UpdateSaleRequest $request
     *
     * @return array|bool
     */
    public function update(TaskAnswer $taskAnswer, UpdateTaskAnswerRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $this->remove($taskAnswer->file);
            $data['file'] = $request->file('file')->store(TypeEnum::TASKANSWER->value, 'public');
        }else {
            $data['file'] = $taskAnswer->file;
        }

        return $data;
    }

    public function delete(TaskAnswer $taskAnswer)
    {
        $this->remove($taskAnswer->file);
    }
}
