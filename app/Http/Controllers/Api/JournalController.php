<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Journal;
use App\Services\JournalService;
use App\Http\Requests\StoreJournalRequest;
use App\Http\Requests\UpdateJournalRequest;
use Illuminate\Http\JsonResponse;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\DataAdminInterface;
use App\Contracts\Interfaces\LetterheadsInterface;
use App\Contracts\Interfaces\SignatureInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\JournalResource;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Request;

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
        return response()->json($journals);
    }

    public function store(StoreJournalRequest $request)
    {
        $currentDate = Carbon::now()->locale('id_ID')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
        if ($currentDate < '16:00:00' || $currentDate > '23:59:00') {
            return ResponseHelper::error(null, "Waktu pengumpulan adalah jam 4 sore sampai 12 malam.");
        } else {
            $existingData = $this->journal->where('created_at', '>=', now()->startOfDay());
            if ($existingData) {
                return ResponseHelper::error(null, "Anda Telah Mengisi Jurnal Hari ini.");
            }
            if (now()->isWeekend()) {
                return ResponseHelper::error(null, "Hari Ini Libur");
            }
            $data = $this->service->store($request);
            $this->journal->store($data);
            return ResponseHelper::success($data);
        }
    }

    /**
     * @param UpdateJournalRequest $request
     * @param Journal $journal
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateJournalRequest $request, Journal $journal): JsonResponse
    {
        $data = $this->service->update($journal, $request);
        $this->journal->update($journal->id, $data);
        return ResponseHelper::success($data);
    }

    public function show($id)
    {
        $journal = $this->journal->show($id);
    
        if (!$journal) {
            return ResponseHelper::error("Journal not found", 404);
        }
    
        return ResponseHelper::success(new JournalResource($journal));
    }
}
