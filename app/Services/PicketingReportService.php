<?php

namespace App\Services;

use App\Enum\TypeEnum;
use App\Http\Requests\StorePicketingReportRequest;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdatePicketingReportRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Sale;
use App\Models\PicketingReport;

class PicketingReportService
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
    public function store(StorePicketingReportRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('proof') && $request->file('proof')->isValid()) {
            $data['proof'] = $request->file('proof')->store(TypeEnum::PICKET->value, 'public');
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
    public function update(PicketingReport $picketingReport, UpdatePicketingReportRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('proof') && $request->file('proof')->isValid()) {
            $this->remove($picketingReport->file);
            $data['proof'] = $request->file('proof')->store(TypeEnum::PICKET->value, 'public');
        }else {
            $data['proof'] = $picketingReport->file;
        }

        return $data;
    }

    public function delete(PicketingReport $picketingReport)
    {
        $this->remove($picketingReport->file);
    }
}
