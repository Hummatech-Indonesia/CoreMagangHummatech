<?php


namespace App\Services;

use App\Enum\TypeEnum;
use App\Http\Requests\StoreCodeOfConductRequest;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateCodeOfConductRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\CodeOfConduct;
use App\Models\Sale;

class CodeOfConductService
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
        if ($old_file) {
            $this->remove($old_file);
        }

        return $this->upload($disk, $file);
    }

    /**
     * Handle store data event to models.
     *
     * @param StoreSaleRequest $request
     *
     * @return array|bool
     */
    public function store(StoreCodeOfConductRequest $request): array|bool
    {
        $data = $request->validated();
        $data['file'] = $request->file('file')->store(TypeEnum::CODEOFCONDUCT, 'public');
        return $data;
    }

    /**
     * Handle update data event to models.
     *
     * @param Sale $sale
     * @param UpdateSaleRequest $request
     *
     * @return array|bool
     */
    public function update(CodeOfConduct $codeOfConduct, UpdateCodeOfConductRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('file')) {
            $this->remove($codeOfConduct->file);
            $data['file'] = $request->file('file')->store(TypeEnum::CODEOFCONDUCT, 'public');
        } else {
            $data['file'] = $codeOfConduct->file;
        }

        return $data;
    }

    public function delete(CodeOfConduct $codeOfConduct)
    {
        $this->remove($codeOfConduct->file);
    }
}
