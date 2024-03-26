<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use App\Services\StatementService;
use App\Http\Requests\StoreSelfStatement;
use App\Http\Requests\StoreParentStatement;

class StatementController extends Controller
{
    private StatementService $statementService;

    public function __construct(StatementService $statementService)
    {
        $this->statementService = $statementService;
    }

    public function self(StoreSelfStatement $request)
    {
        $result = $this->statementService->self($request);

        if ($result) {
            // Jika service berhasil mengembalikan PDF, kirim sebagai response HTTP
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $result['filename'] . '"'
            ];

            return response($result['output'], 200, $headers);
        } else {
            // Jika gagal, kirim response error
            return response()->json(['error' => 'Unable to generate PDF'], 500);
        }
    }

    public function parent(StoreParentStatement $request)
    {

        $result = $this->statementService->parent($request);


        if ($result) {
            // Jika service berhasil mengembalikan PDF, kirim sebagai response HTTP
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $result['filename'] . '"'
            ];

            return response($result['output'], 200, $headers);
        } else {
            // Jika gagal, kirim response error
            return response()->json(['error' => 'Unable to generate PDF'], 500);
        }
    }
}
