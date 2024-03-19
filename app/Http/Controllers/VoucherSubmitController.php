<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoucherApplyRequest;
use App\Http\Requests\VoucherRevokeRequest;

class VoucherSubmitController extends Controller
{
    /**
     * Application of the voucher code
     *
     * @param \App\Http\Requests\VoucherApplyRequest $request The request for code voucher
     * @return \Illuminate\Http\RedirectResponse
     */
    public function apply(VoucherApplyRequest $request)
    {
        session()->push('voucher', $request->code);
        return back()->with('success', 'Kode kupon berhasil diaplikasikan.');
    }

    /**
     * Revokal the voucher code
     *
     * @param \App\Http\Requests\VoucherRevokeRequest $request The request for the code voucher
     * @return \Illuminate\Http\RedirectResponse
     */
    public function revoke(VoucherRevokeRequest $request)
    {
        session()->pull('voucher', $request->code);
        return back()->with('success', 'Kode kupon berhasil di hapus.');
    }
}
