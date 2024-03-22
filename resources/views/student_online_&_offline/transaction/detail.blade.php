@extends('student_online.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
@endsection

@section('content')
@php
    $status = strtoupper($reference->status);
    $refs = match ($status) {
        'PENDING' => \App\Enum\TransactionStatusEnum::PENDING,
        'PAID' => \App\Enum\TransactionStatusEnum::PAID,
        'CANCELLED' => \App\Enum\TransactionStatusEnum::CANCELLED,
        'EXPIRED' => \App\Enum\TransactionStatusEnum::EXPIRED,
        'FAILED' => \App\Enum\TransactionStatusEnum::FAILED,
        'REFUND' => \App\Enum\TransactionStatusEnum::REFUND,
        'UNPAID' => \App\Enum\TransactionStatusEnum::UNPAID,
        default => \App\Enum\TransactionStatusEnum::DEFAULT
    };
@endphp
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <div>
                    <h4 class="fw-semibold mb-8">{{ $refs->title() }}</h4>
                    <p>{{ $refs->subtitle() }}</p>
                </div>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/login">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="text-muted " href="/login">Pesanan Saya</a></li>
                        <li class="breadcrumb-item" aria-current="page">#{{ $reference->transaction_id }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header pt-4 bg-white d-flex justify-content-between">
        <h3 class="mb-0">Status Pembayaran: <strong class="text-{{ $refs->color() }}">{{ $refs->label() }}</strong></h3>

        <div class="d-flex gap-2 align-items-center">
            <a href="{{ route('transaction-history.index') }}" class="btn btn-light d-flex align-items-center gap-2"><i class="fas fa-arrow-left"></i><span>Kembali</span></a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <h5>Detail Transaksi</h5>

                @if(\Carbon\Carbon::now()->diffInHours($reference->expired_at) <= 0 && $reference->status !== App\Enum\TransactionStatusEnum::PAID->value)
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Pembayaran tidak dapat dilakukan, karena sudah kadaluarsa.</strong>
                </div>
                @elseif(\Carbon\Carbon::now()->diffInHours($reference->expired_at) <= 0 && $reference->status !== App\Enum\TransactionStatusEnum::PAID->value)
                <div class="alert alert-warning" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Segera dibayarkan, karena sudah mendekati tenggat Waktu.</strong>
                </div>
                @endif

                <div class="p-4 py-5 border rounded mt-3">
                    <div class="pb-4 d-flex px-3"><strong>Detail Tagihan</strong></div>
                    <div class="d-flex justify-content-between px-3 pb-3 mb-3 border-bottom">
                        <p class="mb-0">ID Tagihan</p>
                        <p class="mb-0 d-flex gap-2 align-items-center"><span class="fw-bolder" id="billingCode">#{{ $reference->transaction_id }}</span> <a href="javascript:copyContent('billingCode')"><i class="fas fa-copy"></i></a></p>
                    </div>
                    <div class="d-flex justify-content-between px-3 pb-3 mb-3 border-bottom">
                        <p class="mb-0">Kode Transaksi</p>
                        <p class="mb-0 d-flex gap-2 align-items-center"><span class="fw-bolder" id="transactionCode">{{ $reference->reference }}</span> <a href="javascript:copyContent('transactionCode')"><i class="fas fa-copy"></i></a></p>
                    </div>
                    <div class="d-flex justify-content-between px-3 pb-3 mb-3 border-bottom">
                        <p class="mb-0">Metode Pembayaran</p>
                        <p class="mb-0"><span class="fw-bolder">{{ $paymentDetail['data']['payment_name'] }}</span></p>
                    </div>

                    <div class="pb-4 d-flex px-3 pt-3"><strong>Detail Harga</strong></div>
                    <div class="d-flex justify-content-between px-3 pb-3 mb-3 border-bottom">
                        <p class="mb-0">Produk: <span class="fw-bolder">{{ $reference->product->name }}</span></p>
                        <p class="mb-0"><span class="fw-bolder">1 x @currency($reference->product->price)</span></p>
                    </div>
                    <div class="d-flex justify-content-between px-3 pb-3 mb-3 border-bottom">
                        <p class="mb-0">Potongan Harga</p>
                        <p class="mb-0"><span class="fw-bolder">@currency($reference->product->price > $reference->amount ? $reference->product->price - $reference->amount : 0)</span></p>
                    </div>
                    <div class="d-flex justify-content-between px-3 pb-3 mb-3 border-bottom">
                        <p class="mb-0">Biaya Penanganan</p>
                        <p class="mb-0"><span class="fw-bolder">@currency((int) $paymentDetail['data']['total_fee'])</span></p>
                    </div>
                    <div class="d-flex justify-content-between px-3 pb-3 mb-3 border-bottom bg-white">
                        <p class="mb-0">Total Pembayaran</p>
                        <p class="mb-0"><span class="fw-bolder">@currency($reference->amount + (int) $paymentDetail['data']['total_fee'])</span></p>
                    </div>

                    <div class="pb-4 d-flex px-3 pt-3"><strong>Transaksi</strong></div>
                    <div class="d-flex justify-content-between px-3 pb-3 mb-3 border-bottom">
                        <p class="mb-0">Dibayar Pada</p>
                        <p class="mb-0"><span class="fw-bolder">{{ $reference->paid_at?->locale('id_ID')->isoFormat('dddd, D MMMM Y HH:mm \W\I\B') ?? '-' }}</span></p>
                    </div>
                    <div class="d-flex justify-content-between px-3">
                        <p class="mb-0">Kadaluarsa Pada</p>
                        <p class="mb-0 d-flex gap-2 flex-column align-items-end">
                            <span class="fw-bolder">{{ $reference->expired_at->locale('id_ID')->isoFormat('dddd, D MMMM Y HH:mm \W\I\B') }}</span>
                            @if(\Carbon\Carbon::now()->diffInHours($reference->expired_at) <= 0 && $reference->status !== App\Enum\TransactionStatusEnum::PAID->value)
                            <span class="text-danger"><i class="fas fa-exclamation-triangle me-2"></i>Pembayaran tidak dapat dilakukan, karena sudah kadaluarsa.</span>
                            @elseif(\Carbon\Carbon::now()->diffInHours($reference->expired_at) <= 0 && $reference->status !== App\Enum\TransactionStatusEnum::PAID->value)
                            <span class="text-warning"><i class="fas fa-exclamation-triangle me-2"></i>Segera dibayarkan, karena sudah mendekati tenggat waktu.</span>
                            @endif
                        </p>
                    </div>
                </div>

                @if($paymentDetail['data']['pay_code'] && \Carbon\Carbon::now()->diffInHours($reference->expired_at) >= 0 && $reference->status !== App\Enum\TransactionStatusEnum::PAID->value)
                <div class="d-flex mt-4 justify-content-between align-items-center">
                    <div class="d-flex gap-2 flex-column">
                        <span class="fw-bolder">Kode Pembayaran</span>
                        <h3 class="mb-0 fw-bolder text-primary" id="paymentCode">{{ $paymentDetail['data']['pay_code'] }}</h3>
                    </div>

                    <div>
                        <button onclick="copyContent('paymentCode')" class="btn btn-primary d-flex gap-2 align-items-center"><i class="fas fa-copy"></i><span>Salin Kode</span></button>
                    </div>
                </div>
                @elseif(isset($paymentDetail['data']['qr_url']) && \Carbon\Carbon::now()->diffInHours($reference->expired_at) >= 0 && $reference->status !== App\Enum\TransactionStatusEnum::PAID->value)
                <div class="d-flex flex-column gap-2 align-items-center justify-content-center mt-4">
                    <strong>Scan Kode QR</strong>
                    <img src="{{ $paymentDetail['data']['qr_url'] }}" alt="QR Code" height="200px" width="200px" />
                </div>
                @endif
            </div>
            <div class="col-md-4">
                <section class="mb-3">
                    <h5>Instruksi Pembayaran</h5>
                    <div class="accordion mt-3" id="instructionsAccordion">
                        @foreach ($paymentDetail['data']['instructions'] as $index => $instruction)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button @if($index > 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                                        {{ $instruction['title'] }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse @if($index === 0) show @endif" aria-labelledby="heading{{ $index }}" data-bs-parent="#instructionsAccordion">
                                    <div class="accordion-body">
                                        <ol>
                                        @foreach ($instruction['steps'] as $step)
                                            <li>{!! $step !!}</li>
                                        @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
                <section class="mb-3">
                    <h5>Aksi</h5>

                    <div class="list-group">
                        @if($reference->status !== App\Enum\TransactionStatusEnum::PAID->value)
                            <a href="{{ route('transaction-history.detail', $reference->reference) }}" class="list-group-item list-group-action d-flex align-items-center gap-2">
                                <i class="fas fa-sync"></i>
                                <span>Periksa</span>
                            </a>
                        @endif

                        <a href="/pdf/tagihan/{{ $reference->transaction_id }}" class="list-group-item list-group-action d-flex gap-2 align-items-center">
                            <i class="fas fa-download"></i>
                            Unduh Tagihan
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>

<script>
    const copyContent = async (target) => {
        let text = document.getElementById(target).innerHTML;
        try {
            await navigator.clipboard.writeText(text);
            Swal.fire({
                icon: "success",
                title: "Berhasil Menyalin",
                text: "Kode pembayaran berhasil di salin ke dalam papan salinan.",
                confirmButtonText: 'Tutup',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                    timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            });
            console.log('Content copied to clipboard');
        } catch (err) {
            console.error('Failed to copy: ', err);
        }
    }
</script>
@endsection
