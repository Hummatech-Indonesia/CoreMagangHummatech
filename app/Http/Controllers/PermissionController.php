<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\PermissionInterface;
use App\Enum\StatusApprovalPermissionEnum;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\StatusApprovalRequest;
use App\Models\Permission;
use App\Services\PermissionService;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private PermissionInterface $permission;
    private AttendanceInterface $attendance;
    private PermissionService $service;
    public function __construct(PermissionInterface $permissionInterface, PermissionService $permissionService, AttendanceInterface $attendanceInterface)
    {
        $this->attendance = $attendanceInterface;
        $this->permission = $permissionService;
        $this->permission = $permissionInterface;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View
    {
        $permissions = $this->permission->search($request);
        return view('', compact('permissions'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(PermissionRequest $request): RedirectResponse
    {
        $data = $this->service->store($request);
        $this->permission->store($data);
        return redirect()->back()->with('success', 'Berhasil menyimpan');
    }

    /**
     * updateApproval
     *
     * @param  mixed $permission
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function updateApproval(Permission $permission, StatusApprovalRequest $request): RedirectResponse
    {
        $this->permission->update($permission->id, $request->validated());
        if ($request->status_approval == StatusApprovalPermissionEnum::AGREE->value) {
            if ($permission->start === Carbon::today()->toDateString()) {
                $izinDari = Carbon::tomorrow();
            } else {
                $izinDari = Carbon::parse($permission->start);
            }
            $izinSampai = Carbon::parse($permission->end);
            $tanggalMulai = $izinDari;
            $tanggalBerakhir = $izinSampai;
            $today = now();
            while ($tanggalMulai <= $tanggalBerakhir) {
                $this->attendance->store([
                    'student_id' => $permission->student_id,
                    'status' => $permission->status,
                    'created_at' => $today,
                ]);
                $tanggalMulai->addDay();
                $today->addDay();
            }
        }
        return redirect()->back()->with('success', 'Berhasil menyimpan');
    }


}
