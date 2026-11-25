<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Journal;
use App\Exports\JournalExport;
use Illuminate\Http\Request;
use App\Services\JournalService;
use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\AdminJournalInterface;
use App\Contracts\Interfaces\Eloquent\PaginationInterface;
use Maatwebsite\Excel\Facades\Excel;

class AdminJournalController extends Controller
{
    private AdminJournalInterface $adminJournal;

    public function __construct( AdminJournalInterface $adminJournal)
    {
        $this->adminJournal = $adminJournal;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $adminJournalQuery = $this->adminJournal->search($request);

        $totalAll     = (clone $adminJournalQuery)->count();
        $totalFillIn  = (clone $adminJournalQuery)->where('status', 'fillin')->count();

        $adminJournalAll        = (clone $adminJournalQuery)->paginate(10, ['*'], 'all_page');
        $adminJournalFillIn     = (clone $adminJournalQuery)->where('status', 'fillin')->paginate(10, ['*'], 'fillin_page');
        $adminJournalNotFilling = $this->adminJournal->NotFillin($request);

        $isDefaultToday = !$request->filled('date_from') && !$request->filled('date_to');

        return view('admin.page.journal', compact(
            'adminJournalAll', 'adminJournalFillIn', 'adminJournalNotFilling',
            'totalAll', 'totalFillIn', 'isDefaultToday'
        ));
    }
    public function export_excel(Request $request)
    {
        $name     = $request->input('name') ?: null;
        $dateFrom = $request->input('date_from') ?: null;
        $dateTo   = $request->input('date_to') ?: null;

        $filename = 'jurnal-siswa';
        if ($dateFrom) $filename .= '-' . $dateFrom;
        if ($dateTo && $dateTo !== $dateFrom) $filename .= '_sd_' . $dateTo;
        $filename .= '.xlsx';

        return Excel::download(new JournalExport($name, $dateFrom, $dateTo), $filename);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
