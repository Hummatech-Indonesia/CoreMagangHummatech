<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\PermissionInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Services\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private PermissionInterface $permission;
    private AttendanceInterface $attendance;
    private PermissionService $service;
    public function __construct(PermissionInterface $permissionInterface, PermissionService $permissionService, AttendanceInterface $attendanceInterface)
    {
        $this->attendance = $attendanceInterface;
        $this->service = $permissionService;
        $this->permission = $permissionInterface;
    }
    public function store(PermissionRequest $request)
    {
        dd($request->all());
        $data = $this->service->store($request);
        dd($data);
        $data['student_id'] = auth()->user()->student->id;
        $this->permission->store($data);
        return ResponseHelper::success(null , 'berhasil menambahkan izin');
    }
}
