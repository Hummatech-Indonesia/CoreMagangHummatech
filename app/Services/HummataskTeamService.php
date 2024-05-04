<?php

namespace App\Services;

use App\Enum\TypeEnum;
use App\Models\DataAdmin;
use App\Models\Letterhead;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreDataAdminRequest;
use App\Http\Requests\StoreHummataskTeamRequest;
use App\Http\Requests\UpdateDataAdminRequest;
use App\Http\Requests\UpdateHummataskTeamRequest;
use App\Models\HummataskTeam;
use Illuminate\Http\Request;

class HummataskTeamService
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
    public function store(Request $request): array|bool
    {
        $data = $request->all();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store(TypeEnum::HUMMATASKTEAM->value, 'public');
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
    public function update(HummataskTeam $hummataskTeam, UpdateHummataskTeamRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($hummataskTeam->image);
            $data['image'] = $request->file('image')->store(TypeEnum::HUMMATASKTEAM->value, 'public');
        } else {
            $data['image'] = $hummataskTeam->image;
        }

        return $data;
    }

    public function delete(HummataskTeam $hummataskTeam)
    {
        $this->remove($hummataskTeam->image);
    }
}
