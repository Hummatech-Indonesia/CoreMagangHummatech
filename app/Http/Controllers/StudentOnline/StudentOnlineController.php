<?php

namespace App\Http\Controllers\StudentOnline;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\TransactionHistoryInterface;
use App\Enum\StatusJournalEnum;
use App\Http\Controllers\Controller;
use App\Services\JournalService;
use Carbon\Carbon;

class StudentOnlineController extends Controller
{
    private TransactionHistoryInterface $transaction;
    private JournalService $journalService;
    private AttendanceInterface $attendance;
    private AttendanceRuleInterface $attendanceRule;

    public function __construct(TransactionHistoryInterface $transaction, AttendanceInterface $attendance, JournalService $journalService, AttendanceRuleInterface $attendanceRule)
    {
        $this->transaction = $transaction;
        $this->attendance = $attendance;
        $this->journalService = $journalService;
        $this->attendanceRule = $attendanceRule;
    }

    public function index()
    {
        $transactions = $this->transaction->paginate($perPage = 10, $columns = ['*'], $pageName = 'transaction_page', $page = null);
        $attends = $this->attendance->count('masuk');
        $permissions = $this->attendance->count('izin');
        $sick = $this->attendance->count('sakit');
        $absent = $this->attendance->count('alpha');
        $fillinJournal = $this->journalService->chart(StatusJournalEnum::FILLIN->value);
        $notFillinJournal = $this->journalService->chart(StatusJournalEnum::NOTFILLING->value);
        $ruleToday = $this->attendanceRule->getByDay(Carbon::now()->format('l'));
        return view('student_online.index', compact('transactions', 'attends', 'permissions', 'sick', 'absent', 'fillinJournal', 'notFillinJournal', 'ruleToday'));
    }
}
