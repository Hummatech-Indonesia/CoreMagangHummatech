<?php

namespace App\Services;

use App\Enum\TypeEnum;
use App\Http\Requests\StoreAlumniRequest;
use App\Http\Requests\StoreReportStudentRequest;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateAlumniRequest;
use App\Http\Requests\UpdateReportStudentRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Alumni;
use App\Models\ReportStudent;
use App\Models\Sale;

class AlumniService
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
    public function store(StoreAlumniRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store(TypeEnum::ALUMNI->value, 'public');
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
    public function update(Alumni $alumni, UpdateAlumniRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($alumni->image);
            $data['image'] = $request->file('image')->store(TypeEnum::ALUMNI->value, 'public');
        } else {
            $data['image'] = $alumni->image;
        }

        return $data;
    }

    public function delete(Alumni $alumni)
    {
        $this->remove($alumni->image);
    }
}
