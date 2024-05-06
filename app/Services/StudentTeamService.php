<?php

namespace App\Services;

use Carbon\Carbon;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreSaleRequest;

class StudentTeamService
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
    public function store($data): array|bool
    {
        $data['hummatask_team_id'] = $data->id;

        if ($data) {
            return $data;
        }
        return false;   
    }

}
