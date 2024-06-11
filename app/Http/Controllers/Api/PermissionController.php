<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\PermissionInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Services\PermissionService;
use Illuminate\Http\JsonResponse;

class PermissionController extends Controller
{
    private PermissionInterface $permission;
    private PermissionService $service;
    public function __construct(PermissionInterface $permissionInterface, PermissionService $permissionService)
    {
        $this->service = $permissionService;
        $this->permission = $permissionInterface;
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function store(PermissionRequest $request): JsonResponse
    {
        $data = $this->service->store($request);
        $data['student_id'] = auth()->user()->student->id;
        $this->permission->store($data);
        return ResponseHelper::success(null , 'berhasil menambahkan izin');
    }
}
