<?php

namespace App\Services;

use App\Enum\TypeEnum;
use App\Http\Requests\PermissionRequest;

class PermissionService {
    /**
     * store
     *
     * @param  mixed $request
     * @return array
     */
    public function store(PermissionRequest $request): array|bool
    {
        $data = $request->validated();
        $data['proof'] = $request->file('proof')->store(TypeEnum::PERMISSION->value, 'public');
        return $data;
    }

}
