<?php

namespace App\Services;

use App\Enum\TypeEnum;
use App\Http\Requests\StoreJournalRequest;
use App\Http\Requests\StoreLetterheadRequest;
use App\Http\Requests\StoreLogoRequest;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\StoreStructureRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateJournalRequest;
use App\Http\Requests\UpdateLetterheadRequest;
use App\Http\Requests\UpdateLogoRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Requests\UpdateStructureRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Journal;
use App\Models\Letterhead;
use App\Models\Logo;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Service;
use App\Models\Structure;
use App\Models\Student;
use App\Models\Team;
use Illuminate\Support\Facades\Log;

class LetterheadService
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
    public function store(StoreLetterheadRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $data['logo'] = $request->file('logo')->store(TypeEnum::LETTERHEAD->value, 'public');
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
    public function update(Letterhead $letterhead, UpdateLetterheadRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $this->remove($letterhead->logo);
            $data['logo'] = $request->file('logo')->store(TypeEnum::LETTERHEAD->value, 'public');
        } else {
            $data['logo'] = $letterhead->logo;
        }

        return $data;
    }

    public function delete(Letterhead $letterhead)
    {
        $this->remove($letterhead->logo);
    }
}
