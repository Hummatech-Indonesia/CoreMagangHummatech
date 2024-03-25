<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\JournalInterface;
use App\Models\Journal;
use App\Http\Requests\StoreJournalRequest;
use App\Http\Requests\UpdateJournalRequest;
use App\Services\JournalService;
use Carbon\Carbon;

class JournalController extends Controller
{
    private JournalInterface $journal;
    private JournalService $service;

    public function __construct(JournalInterface $journal, JournalService $service)
    {
        $this->journal = $journal;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journals = $this->journal->get();
        return view('student_offline.journal.index', compact('journals'));
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
    public function store(StoreJournalRequest $request)
    {
        $currentDate = Carbon::now()->locale('id_ID')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
        if ($currentDate < '16:00:00' && $currentDate > '00:00:00') {
            return redirect()->back()->with('error', 'Anda hanya dapat mengisi jurnal di jam 16.00 - 00.00');
        } else {
            $existingData = $this->journal->where();

            if ($existingData) {
                return redirect()->back()->with('error', 'Anda Telah Mengisi Jurnal Hari ini.');
            }

            if (now()->isWeekend()) {
                return redirect()->back()->with('error', 'Hari ini adalah hari libur.');
            }
            $data = $this->service->store($request);
            $this->journal->store($data);
            return redirect()->back()->with('success', 'Jurnal Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Journal $journal)
    {
        // $journals = $this->journal->get();
        // return view('admin.page.journal', compact('journals'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journal $journal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJournalRequest $request, Journal $journal)
    {
        $data = $this->service->update($journal, $request);
        $this->journal->update($journal->id, $data);
        return back()->with('success', 'Berhasi Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Journal $journal)
    {
        $this->service->delete($journal);
        $this->journal->delete($journal->id);
        return back()->with('success', 'Berhasi Menghapus Data');
    }

    public function studentOnline()
    {
        $journals = $this->journal->get();
        return view('student_online.journal.index', compact('journals'));
    }
}
