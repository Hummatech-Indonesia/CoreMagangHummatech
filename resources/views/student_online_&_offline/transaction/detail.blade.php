@extends('student_online.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
@endsection

@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <div>
                    <h4 class="fw-semibold mb-8">Yuk segera lunasi tagihanmu...</h4>
                    <p>Dan nikmati berbagai macam fitur dan kemudahan dalam proses magang kamu.</p>
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
                    <img src="https://pklhummatech.cakadi190.eu.org/assets-user/dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header pt-4 bg-white d-flex justify-content-between">
        @php
            $status = strtoupper($reference->status);
        @endphp
        <h3 class="mb-0">Status Pembayaran: <strong class="text-{{ App\Enum\TransactionStatusEnum::{$status}->color() }}">{{ App\Enum\TransactionStatusEnum::{$status}->label() }}</strong></h3>
        <a href="{{ route('transaction-history.detail', $reference->reference) }}" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="fas fa-sync"></i>
            <span>Periksa</span>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-7">
                <h5>Detail Transaksi</h5>

                <div class="p-3 border rounded mt-3">
                    <div class="d-flex justify-content-between pb-3 mb-3 border-bottom">
                        <p class="mb-0">ID Tagihan</p>
                        <p class="mb-0"><span class="fw-bolder">#{{ $reference->transaction_id }}</span></p>
                    </div>
                    <div class="d-flex justify-content-between pb-3 mb-3 border-bottom">
                        <p class="mb-0">Kode Transaksi</p>
                        <p class="mb-0"><span class="fw-bolder">{{ $reference->reference }}</span></p>
                    </div>
                    <div class="d-flex justify-content-between pb-3 mb-3 border-bottom">
                        <p class="mb-0">Metode Pembayaran</p>
                        <p class="mb-0"><span class="fw-bolder">{{ $paymentDetail['data']['payment_name'] }}</span></p>
                    </div>
                    <div class="d-flex justify-content-between pb-3 mb-3 border-bottom">
                        <p class="mb-0">Produk: <span class="fw-bolder">{{ $reference->product->name }}</span></p>
                        <p class="mb-0"><span class="fw-bolder">1 x @currency($reference->product->price)</span></p>
                    </div>
                    <div class="d-flex justify-content-between pb-3 mb-3 border-bottom">
                        <p class="mb-0">Potongan Harga</p>
                        <p class="mb-0"><span class="fw-bolder">@currency($reference->product->price > $reference->amount ? $reference->product->price - $reference->amount : 0)</span></p>
                    </div>
                    <div class="d-flex justify-content-between pb-3 mb-3 border-bottom">
                        <p class="mb-0">Total Pembayaran</p>
                        <p class="mb-0"><span class="fw-bolder">@currency($reference->amount)</span></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Kadaluarsa Pada</p>
                        <p class="mb-0 d-flex gap-2 flex-column">
                            <span class="fw-bolder">{{ $reference->expired_at->locale('id_ID')->isoFormat('dddd, D MMMM Y HH:mm') }}</span>
                            @if(\Carbon\Carbon::now()->diffInHours($reference->expired_at) <= 2)
                            <span class="text-warning"><i class="fas fa-exclamation-triangle me-2"></i>Segera dibayarkan, karena sudah mendekati tenggat waktu.</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="d-flex mt-4 justify-content-between align-items-center">
                    <div class="d-flex gap-2 flex-column">
                        <span class="fw-bolder">Kode Pembayaran</span>
                        <h3 class="mb-0 fw-bolder text-primary" id="paymentCode">{{ $paymentDetail['data']['pay_code'] }}</h3>
                    </div>

                    <div>
                        <button onclick="copyContent()" class="btn btn-primary d-flex gap-2 align-items-center"><i class="fas fa-copy"></i><span>Salin Kode</span></button>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>

<script>
    let text = document.getElementById('paymentCode').innerHTML;
    const copyContent = async () => {
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
