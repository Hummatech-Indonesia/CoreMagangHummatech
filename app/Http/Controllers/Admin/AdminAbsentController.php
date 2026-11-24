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
            'year'  => 'required|integer|digits:4',
            'month' => 'required|integer|min:1|max:12',
        ], [
            'month.max' => 'Batas bulan hanya 12',
        ]);

        $year   = (int) $request->input('year');
        $month  = (int) $request->input('month');
        $school = $request->input('school') ?: null;

        return Excel::download(new AbsensiExport($year, $month, $school), "absensi-{$year}-{$month}.xlsx");
    }
}
