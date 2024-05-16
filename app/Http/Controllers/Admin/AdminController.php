<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\DataAdminInterface;
use App\Contracts\Interfaces\DataCOInterface;
use App\Contracts\Interfaces\MaxLateInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Enum\DayEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private DataAdminInterface $dataadmin;
    private DataCOInterface $dataCo;
    private MaxLateInterface $maxLate;
    private AttendanceRuleInterface $attendanceRule;
    private StudentInterface $student;


    public function __construct(DataAdminInterface $dataadmin, MaxLateInterface $maxLateInterface, AttendanceRuleInterface $attendanceRuleInterface ,DataCOInterface $dataCo ,StudentInterface $student)
    {
        $this->attendanceRule = $attendanceRuleInterface;
        $this->maxLate = $maxLateInterface;
        $this->dataCo = $dataCo;
        $this->dataadmin = $dataadmin;
        $this->student = $student;
    }

    public function index()
    {

        $monday = $this->attendanceRule->getByDay(DayEnum::MONDAY->value);
        $tuesday = $this->attendanceRule->getByDay(DayEnum::TUESDAY->value);
        $wednesday = $this->attendanceRule->getByDay(DayEnum::WEDNESDAY->value);
        $thursday = $this->attendanceRule->getByDay(DayEnum::THURSDAY->value);
        $friday = $this->attendanceRule->getByDay(DayEnum::FRIDAY->value);
        $dataadmin = $this->dataadmin->get();
        $dataceo = $this->dataCo->get();
        $maxLateMinute = $this->maxLate->get();
        $countofflineactive = $this->student->countActiveOflline();
        $countPending = $this->student->countPending();
        $countDecline = $this->student->countDecline();
        return view('admin.index', compact('dataadmin', 'maxLateMinute', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday','dataceo','countofflineactive','countPending','countDecline'));
    }
}
