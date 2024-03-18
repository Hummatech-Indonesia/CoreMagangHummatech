<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\VoucherInterface;
use App\Models\Voucher;
use App\Http\Requests\StoreVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;

class VoucherController extends Controller
{
    private VoucherInterface $voucher;
    public function __construct(VoucherInterface $voucher)
    {
        $this->voucher = $voucher;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = $this->voucher->get();
        return view('admin.page.voucher.index' , compact('vouchers'));
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
    public function store(StoreVoucherRequest $request)
    {
        $this->voucher->store($request->validated());
        return back()->with('success' , 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoucherRequest $request, Voucher $voucher)
    {
        $this->voucher->update($voucher->id , $request->validated());
        return back()->with('success' , 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voucher $voucher)
    {
        $this->voucher->delete($voucher->id);
        return back()->with('success' , 'Data Berhasil Dihapus');
    }
}
