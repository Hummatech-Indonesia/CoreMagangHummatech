<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Logo;
use App\Models\Sale;
use App\Models\Team;
use App\Enum\TypeEnum ;
use App\Models\Journal;
use App\Models\Product;
use App\Models\Service;
use App\Models\Student;
use App\Models\Structure;
use Illuminate\Support\Facades\Log;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreLogoRequest;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateLogoRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Http\Requests\StoreJournalRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateJournalRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\StoreStructureRequest;
use App\Http\Requests\UpdateStructureRequest;

class JournalService
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
    public function store(StoreJournalRequest $request): array|bool
    {
        $data = $request->validated();

        $currentDate = Carbon::now()->locale('id_ID')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
        if ($currentDate < '16:00:00' && $currentDate > '00:00:00') {
            return $data;
        } else{
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = $request->file('image')->store(TypeEnum::JOURNAL->value, 'public');
                return $data;
            }
            return false;
        }
    }

    /**
     * Handle update data event to models.
     *
     * @param Sale $sale
     * @param UpdateSaleRequest $request
     *
     * @return array|bool
     */
    public function update(Journal $journal, UpdateJournalRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($journal->image);
            $data['image'] = $request->file('image')->store(TypeEnum::JOURNAL->value, 'public');
        } else {
            $data['image'] = $journal->image;
        }

        return $data;
    }

    public function delete(Journal $journal)
    {
        $this->remove($journal->image);
    }
}
