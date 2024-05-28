<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\PermissionInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Enum\StatusApprovalPermissionEnum;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\StatusApprovalRequest;
use App\Models\Attendance;
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
    private StudentInterface $student;
    public function __construct(PermissionInterface $permissionInterface, PermissionService $permissionService, AttendanceInterface $attendanceInterface, StudentInterface $student)
    {
        $this->attendance = $attendanceInterface;
        $this->service = $permissionService;
        $this->permission = $permissionInterface;
        $this->student = $student;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request)
    {
        $students = $this->student->get();
        $permissions = $this->permission->search($request)->paginate(1);
        $perPagePanding = 1;
        $perPageAgree = 1;
        $perPageReject = 1;

        $pandingPermissions = $this->permission->getByStatus('pending', $request)->paginate($perPagePanding, ['*'], 'panding_page');
        $agreePermissions = $this->permission->getByStatus('agree', $request)->paginate($perPageAgree, ['*'], 'agree_page');
        $rejectPermissions = $this->permission->getByStatus('reject', $request)->paginate($perPageReject, ['*'], 'reject_page');

        return view('admin.page.approval.permision', compact('pandingPermissions', 'agreePermissions', 'rejectPermissions', 'students'));
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
        $data['student_id'] = auth()->user()->student->id;
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
    public function updateApproval(Permission $permission, PermissionRequest $request): RedirectResponse
    {
        $this->permission->update($permission->id, $request->all());
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



    public function updateApprovalReject(Permission $permission, PermissionRequest $request): RedirectResponse
    {
        $this->permission->update($permission->id, ['status_approval' => $request->status_approval]);

        if ($request->status_approval == StatusApprovalPermissionEnum::REJECT->value) {
            return redirect()->back()->with('success', 'Berhasil menyimpan');
        }


        return redirect()->back()->with('success', 'Berhasil menyimpan');
    }

    public function destroy(Permission $permission)
    {
        $this->permission->delete($permission->id);
        return back()->with('success' , 'Data Berhasil Dihapus');
    }

}
