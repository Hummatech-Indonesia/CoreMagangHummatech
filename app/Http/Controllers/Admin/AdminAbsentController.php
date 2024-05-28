<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiExport;

class AdminAbsentController extends Controller
{
    public function export_excel(Request $request)
    {
        $request->validate([
            'month' => 'min:1,max:12',
        ], [
            'month.max' => 'Batas bulan hanya 12',
        ]);
        $year = $request->input('year');
        $month = $request->input('month');
        return Excel::download(new AbsensiExport($year, $month), "absensi-{$year}-{$month}.xlsx");
    }
}
