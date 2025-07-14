<?php

namespace App\Http\Controllers\StudentOnline;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\TransactionHistoryInterface;
use App\Enum\StatusJournalEnum;
use App\Http\Controllers\Controller;
use App\Services\JournalService;

class StudentOnlineController extends Controller
{
    private TransactionHistoryInterface $transaction;
    private JournalService $journalService;
    private AttendanceInterface $attendance;

    public function __construct(TransactionHistoryInterface $transaction, AttendanceInterface $attendance, JournalService $journalService)
    {
        $this->transaction = $transaction;
        $this->attendance = $attendance;
        $this->journalService = $journalService;
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
        return view('student_online.index', compact('transactions', 'attends', 'permissions', 'sick', 'absent', 'fillinJournal', 'notFillinJournal'));
    }
}
