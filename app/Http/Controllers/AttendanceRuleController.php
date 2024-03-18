<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Http\Requests\AttendanceRuleRequest;
use Illuminate\Http\RedirectResponse;

class AttendanceRuleController extends Controller
{
    private AttendanceRuleInterface $attendanceRule;
    public function __construct(AttendanceRuleInterface $attendanceRuleInterface)
    {
        $this->attendanceRule = $attendanceRuleInterface;
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(AttendanceRuleRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->attendanceRule->store($data);
        return redirect()->back()->with('success', "Berhasil menambah");
    }
}
