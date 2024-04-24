<?php

namespace App\Http\Controllers\StudentOnline;

use App\Contracts\Interfaces\TransactionHistoryInterface;
use App\Http\Controllers\Controller;

class StudentOnlineController extends Controller
{
    private TransactionHistoryInterface $transaction;

    public function __construct(TransactionHistoryInterface $transaction)
    {
        $this->transaction = $transaction;
    }

    public function index()
    {
        $transactions = $this->transaction->paginate($perPage = 10, $columns = ['*'], $pageName = 'transaction_page', $page = null);

        return view('student_online.index', compact('transactions'));
    }
}
