@extends(auth()->user()->hasRole('siswa-online') ? 'student_online.layouts.app' : 'student_offline.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
@endsection

@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                            @php
                            $teksnya = "";
                            $statusnya = "";
                            switch ($transaction->status) {
                                case "pending":
                                    $teksnya = "Menunggu pembayaran";
                                    $statusnya = "Menunggu pembayaran";
                                    break;
                                case "paid":
                                    $teksnya = "Yeay, Pesanan sudah di bayar";
                                    $statusnya = "Pesanan sudah di bayar";
                                    break;
                                case "cancelled":
                                    $teksnya = "Pesanan anda di batalkan";
                                    $statusnya = "Dibatalkan";
                                    break;
                                case "expired":
                                    $teksnya = "Pesanan telah kadaluarsa!";
                                    $statusnya = "Kadaluarsa!";
                                    break;
                                case "failed":
                                    $teksnya = "Pesanan gagal!";
                                    $statusnya = "Gagal!";
                                    break;
                                case "refund":
                                    $teksnya = "Pesanan dikembalikan!";
                                    $statusnya = "Dikembalikan!";
                                    break;
                                case "unpaid":
                                    $teksnya = "Pesanan belum di bayar!";
                                    $statusnya = "Belum dibayar!";
                                    break;
                            }
                            @endphp
                            <div>
                                <h4 class="fw-semibold mb-8">{{ $teksnya }}</h4>
                            </div>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/login">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-muted " href="/login">Pesanan Saya</a></li>
                            <li class="breadcrumb-item" aria-current="page">{{ $transaction->reference }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header pt-4 bg-white d-flex justify-content-between flex-column flex-xl-row">
            @php
                $statusLabels = [
                    'pending' => [
                        'label' => 'Belum Dibayar',
                        'class' => 'text-warning',
                    ],
                    'paid' => [
                        'label' => 'Lunas',
                        'class' => 'text-success',
                    ],
                    'cancelled' => [
                        'label' => 'Batal',
                        'class' => 'text-danger',
                    ],
                    'expired' => [
                        'label' => 'Kadaluarsa',
                        'class' => 'text-danger',
                    ],
                    'failed' => [
                        'label' => 'Gagal',
                        'class' => 'text-danger',
                    ],
                    'refund' => [
                        'label' => 'Dikembalikan',
                        'class' => 'text-info',
                    ],
                    'unpaid' => [
                        'label' => 'Belum Lunas',
                        'class' => 'text-warning',
                    ],
                ];
            @endphp

            <h3 class="mb-0">Status Pembayaran: <strong
                    class="{{ $statusLabels[$transaction->status]['class'] ?? 'text-muted' }}">
                    {{ $teksnya }}
                </strong>
            </h3>
            <div class="d-flex gap-2 align-items-center">
                <a href="/courses" class="btn btn-light d-flex align-items-center gap-2"><i
                        class="fas fa-arrow-left"></i><span>Kembali</span></a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 mb-3 mb-lg-0">
                    <div id="invoice-detail" class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <h5 class="mb-4">Dibayarkan Kepada</h5>

                            <p class="mb-2 fw-bolder">PT Humma Teknologi Indonesia</p>
                            <p class="mb-2">Perum Permata Regency 1 Blok 10/28, Perun Gpa, Ngijo, Kec. Karang Ploso,
                                Kabupaten Malang, Jawa Timur 65152.</p>
                            <p class="mb-2">pkl@hummatech.com</p>
                            <p class="mb-2">085176777785</p>
                        </div>
                        <div class="col-md-6 mb-3 mb-md-0 text-end">
                            <h5 class="mb-3">Ditagihkan Kepada</h5>

                            <p class="mb-2">{{ $transaction->user->name }}</p>
                            <p class="mb-2">{{ $transaction->user->student->address }}</p>
                            <p class="mb-2">{{ $transaction->user->email }}</p>
                            <p class="mb-2">{{ $transaction->user->student->phone }}</p>
                        </div>
                    </div>

                    <div id="transaction-detail">
                        <h5>Detail Transaksi</h5>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th width="61.25%">Deskripsi</th>
                                        <th>&nbsp;</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            {{-- @if ($reference->order->course())
                                            Pembelian Materi: <strong>{{ $reference->order->name }}</strong>
                                            @else
                                            Berlangganan: <strong>{{ $reference->order->name }}</strong>
                                            @endif --}}
                                            Berlangganan: <strong>{{ $transaction->course->title }}</strong>
                                        </td>
                                        <td>Rp {{ number_format($transaction->course->price, 0, ',', '.') }}</td>
                                    </tr>

                                    <tr>
                                        <td class="border-0 pb-1"></td>
                                        <td class="border-0 pb-1">Subtotal</td>
                                        <td class="border-0 pb-1">Rp
                                            {{ number_format($transaction->course->price, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 opacity-50 py-1"></td>
                                        <td class="border-0 opacity-50 py-1">PPn 11%</td>
                                        <td class="border-0 opacity-50 py-1">
                                            {{ 'Rp ' . number_format($transaction->course->price * (11 / 100), 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 opacity-50 pb-3 pt-1"></td>
                                        <td class="border-0 opacity-50 pb-3 pt-1">Biaya Lainya</td>
                                        <td class="border-0 opacity-50 pb-3 pt-1">
                                            {{ 'Rp ' . number_format($transaction->amount + $transaction->total_fee - ($transaction->course->price + $transaction->course->price * (11 / 100)), 0, ',', '.') }}
                                        </td>
                                        {{-- {{-- </tr> --}}
                                        {{-- @if ($reference->voucherUsage)
                                    <tr>
                                        <td class="border-0 pt-1 fw-bolder text-primary"></td>
                                        <td class="border-0 pt-1 fw-bolder text-primary">Diskon</td>
                                        <td class="border-0 pt-1 fw-bolder text-primary">-@currency(Transaction::discount($reference->order->price, (int) $reference->voucherUsage->voucher->presentase))</td>
                                    </tr>
                                    @endif --}}

                                    <tr>
                                        <td class="bg-primary-subtle fw-bolder"></td>
                                        <td class="bg-primary-subtle fw-bolder">Total Bayar</td>
                                        <td class="bg-primary-subtle text-primary fw-bolder">
                                            {{ 'Rp ' . number_format($transaction->amount + $transaction->total_fee, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="payment-process">
                        <div class="d-flex mt-4 justify-content-between align-items-center">
                            <div class="d-flex gap-2 flex-column">
                                <span class="fw-bolder">Rekening</span>
                                <h3 class="mb-0 fw-bolder text-primary" id="paymentCode">
                                    {{ $transaction->pay_code }}</h3>
                            </div>

                            <div>
                                <button onclick="copyContent('paymentCode')"
                                    class="btn btn-primary d-flex gap-2 align-items-center"
                                    style="height: 3rem;min-width: 3rem;"><i class="fas fa-copy"></i><span
                                        class="d-none d-md-none d-lg-inline">Salin Kode</span></button>
                            </div>
                        </div>
                        {{-- @if ($paymentDetail['data']['pay_code'] && \Carbon\Carbon::now()->diffInHours($reference->expired_at) >= 0 && $reference->status !== App\Enum\TransactionStatusEnum::PAID->value)
                            <div class="d-flex mt-4 justify-content-between align-items-center">
                                <div class="d-flex gap-2 flex-column">
                                    <span class="fw-bolder">Rekening</span>
                                    <h3 class="mb-0 fw-bolder text-primary" id="paymentCode">
                                        {{ $paymentDetail['data']['pay_code'] }}</h3>
                                </div>

                                <div>
                                    <button onclick="copyContent('paymentCode')"
                                        class="btn btn-primary d-flex gap-2 align-items-center" style="height: 3rem;min-width: 3rem;"><i
                                            class="fas fa-copy"></i><span class="d-none d-md-none d-lg-inline">Salin Kode</span></button>
                                </div>
                            </div>
                        @elseif(isset($paymentDetail['data']['qr_url']) &&
                                \Carbon\Carbon::now()->diffInHours($reference->expired_at) >= 0 &&
                                $reference->status !== App\Enum\TransactionStatusEnum::PAID->value)
                            <div class="d-flex flex-column gap-2 align-items-center justify-content-center mt-4">
                                <strong>Scan Kode QR</strong>
                                <img src="{{ $paymentDetail['data']['qr_url'] }}" alt="QR Code" height="200px"
                                    width="200px" />
                            </div>
                        @endif --}}
                    </div>
                </div>
                <div class="col-md-4">
                    <section class="mb-3">
                        <h5 class="">Instruksi Pembayaran</h5>
                        @foreach ($instructions as $index => $instruction)
                            <div class="accordion mt-3" id="instructionsAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse">
                                            {{ $instruction['title'] }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading"
                                        data-bs-parent="#instructionsAccordion">
                                        <div class="accordion-body">
                                            <ol>
                                                @foreach ($instruction['steps'] as $step)
                                                    <li>{!! $step !!}</li>
                                                @endforeach
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </section>
                    <section id="transaction-detail" class="mb-3">
                        <h5 class="mb-3">Detail Transaksi</h5>

                        <div class="mb-3">
                            <div
                                class="border-bottom p-3 px-0 px-md-3 flex-column flex-lg-row justify-content-between gap-2 d-flex align-items-start align-items-md-center">
                                <strong>Kode Referensi</strong>
                                <div class="d-flex gap-2 align-items-center">
                                    <a href="javascript:copyContent('id-reference')" class="text-dark"><i
                                            class="fas fa-copy fa-fw"></i></a>
                                    <span><span id="id-reference">{{ $transaction->reference }}</span></span>
                                </div>
                            </div>
                            <div
                                class="border-bottom p-3 px-0 px-md-3 flex-column flex-lg-row justify-content-between gap-2 d-flex align-items-start align-items-md-center">
                                <strong>Kadaluarsa Pada</strong>
                                <span>30 Juni 2024</span>
                            </div>
                        </div>
                    </section>
                    <section>
                        <h5 class="mb-2">Aksi</h5>

                        <div class="list-group list-group-flush">
                            <a href="#"
                                class="list-group-item list-group-action p-3 d-flex align-items-center gap-2">
                                <i class="fas fa-sync"></i>
                                <span>Periksa</span>
                            </a>

                            <a href="javascript:void(0)"
                                class="list-group-item list-group-action d-flex gap-2 p-3 align-items-center">
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
