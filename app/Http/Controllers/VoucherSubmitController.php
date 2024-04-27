<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\VoucherInterface;
use App\Http\Requests\VoucherApplyRequest;
use App\Http\Requests\VoucherRevokeRequest;
use Illuminate\Validation\ValidationException;

class VoucherSubmitController extends Controller
{
    private VoucherInterface $_voucherInterface;

    public function __construct(VoucherInterface $voucherInterface)
    {
        $this->_voucherInterface = $voucherInterface;
    }

    /**
     * Application of the voucher code
     *
     * @param \App\Http\Requests\VoucherApplyRequest $request The request for code voucher
     * @return \Illuminate\Http\RedirectResponse
     */
    public function apply(VoucherApplyRequest $request)
    {
        $voucher = $this->_voucherInterface->getVoucherByCode($request->code);

        if(!$voucher->checkAbvability()) {
            ValidationException::withMessages([
                'code' => 'Kode kupon tidak tersedia atau sudah habis.',
            ]);
        }

        session()->push('voucher', $request->code);
        return back()->with('success', 'Kode kupon berhasil diaplikasikan.');
    }

    public function reset()
    {
        session()->forget('voucher');
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
