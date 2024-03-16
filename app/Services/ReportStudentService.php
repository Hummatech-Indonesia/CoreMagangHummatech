<?php

namespace App\Services;

use App\Enums\TypeEnum;
use App\Http\Requests\StoreJournalRequest;
use App\Http\Requests\StoreLogoRequest;
use App\Http\Requests\StoreReportStudentRequest;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\StoreStructureRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateJournalRequest;
use App\Http\Requests\UpdateLogoRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateReportStudentRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Requests\UpdateStructureRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Journal;
use App\Models\Logo;
use App\Models\Product;
use App\Models\ReportStudent;
use App\Models\Sale;
use App\Models\Service;
use App\Models\Structure;
use App\Models\Student;
use App\Models\Team;
use Illuminate\Support\Facades\Log;

class ReportStudentService
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
    public function store(StoreReportStudentRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store($request->image, 'public');
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
    public function update(ReportStudent $reportStudent, UpdateReportStudentRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($reportStudent->image);
            $data['image'] = $request->file('image')->store($request->image, 'public');
        } else {
            $data['image'] = $reportStudent->image;
        }

        return $data;
    }

    public function delete(ReportStudent $reportStudent)
    {
        $this->remove($reportStudent->image);
    }
}
