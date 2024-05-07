<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Journal;
use App\Services\JournalService;
use App\Http\Requests\StoreJournalRequest;
use App\Http\Requests\UpdateJournalRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\DataAdminInterface;
use App\Contracts\Interfaces\LetterheadsInterface;
use App\Contracts\Interfaces\SignatureInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Controllers\Controller;
use Exception;

class JournalController extends Controller
{
    private JournalInterface $journal;

    public function __construct(JournalInterface $journal)
    {
        $this->journal = $journal;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journals = $this->journal->get();
        return response()->json($journals);
    }

}
