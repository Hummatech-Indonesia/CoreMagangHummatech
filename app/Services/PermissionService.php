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
    public function store(PermissionRequest $request): array
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['proof'] = $request->file('image')->store(TypeEnum::PERMISSION->value, 'public');
        }
        return $data;
    }
}
