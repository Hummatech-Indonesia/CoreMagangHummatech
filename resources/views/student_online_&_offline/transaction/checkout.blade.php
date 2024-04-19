@extends('student_online.layouts.app')

@section('style')
    <style>
        .card-payment.card-active {
            --bs-card-bg: rgba(var(--bs-primary-rgb), .125);
            --bs-card-border-width: 1px;
            --bs-card-border-color: var(--bs-primary);
        }

        .card-payment {
            --bs-card-border-color: transparent;
            --bs-card-border-width: 1px;
        }

        .image-cart-square {
            width: 5rem;
            height: 5rem;
            border-radius: var(--bs-border-radius);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
@endsection

@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Yuk Segera Selesaikan Pembayaran</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ url('/login') }}">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img alt="Image Hero" src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}"
                            class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($cartData->isNotEmpty())
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-none border">
                    <div class="card-header bg-white pt-4">
                        <h3>Detail Barang</h3>
                    </div>
                    <div class="card-body pt-2">
                        <div class="list-item list-group-flush">
                            @foreach ($cartData->get() as $cart)
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-4 col-lg-2 d-flex justify-content-center">
                                            <div class="image-cart-square"
                                                style="background-image: url({{ $cart['image'] }})"></div>
                                        </div>
                                        <div class="col-8 col-lg-6">
                                            <h3 class="fw-bolder">{{ $cart['name'] }}</h3>
                                            <div class="text-primary">@currency($cart['price'])</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border shadow-none">
                    <h4 class="card-header mb-0 py-4 bg-primary text-white">Pembayaran</h4>
                    @if ($voucherDetail)
                        <form method="POST" action="{{ route('voucher.revoke') }}" class="card-body">
                            @csrf

                            <div class="pb-4 border-bottom">
                                <label for="code">Kode Kupon</label>
                                <div class="form-group row mt-1">
                                    <div class="col-md-9">
                                        <input type="text" id="code" disabled
                                            class="form-control @error('code') is-invalid @enderror"
                                            value="{{ old('code', $voucherDetail->code_voucher) }}" name="code"
                                            placeholder="Mis: VOC123456" />
                                        <input type="hidden" value="{{ old('code', $voucherDetail->code_voucher) }}"
                                            name="code" placeholder="Mis: VOC123456" />
                                        <small class="text-muted d-flex pt-2">*Kode Kupon telah berhasil diterapkan dan
                                            dikalkulasikan
                                            ke jumlah pembayaran.</small>

                                        <div class="d-lg-none my-2">
                                            @error('code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-grid">
                                            <button class="btn btn-danger">Hapus</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2 d-none d-md-none d-lg-inline">
                                        @error('code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <form method="POST" action="{{ route('voucher.apply') }}" class="card-body">
                            @csrf

                            <div class="pb-4 border-bottom">
                                <label for="code">Kode Kupon</label>
                                <div class="form-group row mt-2">
                                    <div class="col-md-9">
                                        <input type="text" id="code"
                                            class="form-control @error('code') is-invalid @enderror"
                                            value="{{ old('code') }}" name="code" placeholder="Mis: VOC123456" />

                                        <div class="d-lg-none my-2">
                                            @error('code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">Terapkan</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2 d-none d-md-none d-lg-inline">
                                        @error('code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif

                    <form method="POST" action="{{ url('transaction/tripay') }}" class="card-body pt-0">
                        @csrf

                        @if($voucherDetail)
                        <input type="hidden" name="voucher_code" value="{{ $voucherDetail->code_voucher }}" />
                        @endif
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}" id="user_id" />
                        <input type="hidden" name="amount"
                            value="{{ Transaction::discountSubtotal(Transaction::countTax($cartData->subtotal(), true), $voucherDetail ? $voucherDetail->presentase : 0) }}"
                            id="subtotal" />
                        <input type="hidden" name="payment_code" id="payment-code" />
                        <input type="hidden" name="payment_name" id="payment-name" />

                        <div class="pb-3 d-flex gap-2 flex-column mb-3">
                            <div class="d-flex justify-content-between">
                                <span>Metode Pembayaran:</span>
                                <a href="javascript:openModal('choose-payment')" id="payment-show"
                                    class="fw-bolder text-primary">Pilih Metode Pembayaran</a>
                            </div>

                            @error('payment_code')
                                <div class="text-danger text-end w-100">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-3 border rounded mb-1">
                            <div class="fw-bolder mb-3 pb-3 border-bottom d-flex justify-content-between">
                                <span>Subtotal:</span>
                                <span id="subtotal-show" class="fw-bolder text-muted">
                                    @if ($voucherDetail)
                                    <s>@currency($cartData->subtotal())</s>
                                    @else
                                    <span>@currency($cartData->subtotal())</span>
                                    @endif
                                </span>
                            </div>
                            <div class="fw-bolder mb-3 pb-3 border-bottom d-flex justify-content-between">
                                <span>PPn 11%:</span>
                                <span>@currency(Transaction::countTax($cartData->subtotal()))</span>
                            </div>
                            @if($voucherDetail)
                            <div class="fw-bolder mb-3 pb-3 border-bottom d-flex justify-content-between">
                                <span>Potongan Voucher:</span>
                                <span id="voucher-show" class="fw-bolder text-primary">&minus;@currency(Transaction::discount($cartData->subtotal(), $voucherDetail ? $voucherDetail->presentase : 0))</span>
                            </div>
                            @endif
                            <div id="additional-fee"></div>
                            <div class="fw-bolder d-flex justify-content-between">
                                <span>Total:</span>
                                <span id="total-show" class="fw-bolder text-primary">@currency(Transaction::discountSubtotal(Transaction::countTax($cartData->subtotal(), true), $voucherDetail ? $voucherDetail->presentase : 0))</span>
                            </div>
                        </div>

                        <div class="text-muted mb-3">*Semua sudah termasuk PPN.</div>

                        <div class="d-grid">
                            <button type="submit"
                                class="btn btn-rounded btn-lg bg-primary-subtle text-primary justify-content-between align-items-center d-flex gap-2">
                                <span>Lanjutkan Ke Pembayaran</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger">Keranjangmu masih kosong. Yuk belanja lagi <a
                href="{{ route('subscription.index') }}">disini</a>.</div>
    @endif

    {{-- <div class="row">
        <div class="col-md-7">
            <div class="card">
                <h4 class="card-header mb-0 py-4 bg-primary text-white">Paket</h4>
                <div class="card-body border-bottom">
                    <div class="d-flex justify-content-between">
                        <h3>{{ $productDetail->name }}</h3>

                        <a href="javascript:void()" class="text-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDelete"><i class="fas fa-trash"></i></a>
                    </div>
                    <p>{!! $productDetail->description !!}</p>
                </div>
                <div class="card-body d-flex justify-content-between flex-row">
                    <h5 class="mb-0">Harga Paket:</h5>
                    <h5 class="mb-0 text-primary fw-bolder">@currency($productDetail->price)</h5>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('script')
    <!-- Modal Payment Gateway -->
    <div class="modal fade" id="choose-payment" tabindex="-1" role="dialog" aria-labelledby="choose-paymentLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Metode Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @foreach ($paymentChannel['data'] as $channel)
                            <div class="col-md-4 mb-3">
                                <a href="javascript:choosePayment('{{ $channel['code'] }}')"
                                    data-fee="{{ $channel['fee_customer']['flat'] }}"
                                    data-id="payment-{{ $channel['code'] }}" data-name="{{ $channel['name'] }}"
                                    class="card-payment card d-flex align-items-center justify-content-center card-body h-100">
                                    <img src="{{ $channel['icon_url'] }}" alt="{{ $channel['name'] }}" class="w-100"
                                        style="height: auto" />
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="button" data-bs-toggle="choose-payment" class="btn btn-primary">Pilih
                        Pembayarannya</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const openModal = (target) => {
            $(`#${target}`).modal('show');
        };

        const intToIdr = (number) => new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(number);

        const choosePayment = (target) => {
            $('.card-payment').each((a, b) => $(b).removeClass('card-active shadow-none'));
            $(`.card-payment[data-id="payment-${target}"]`).addClass('card-active shadow-none');
        };

        $('[data-bs-toggle="choose-payment"]').on('click', () => {
            let activeElement = $('.card-payment.card-active');

            if (activeElement.length === 0) {
                alert("Pilih salah satu metode pembayaran terlebih dahulu!");
                return;
            }

            const paymentName = activeElement.data('name');
            const feeAmount = parseInt(activeElement.data('fee') ?? 0);
            const subtotal = parseInt($('#subtotal').val() ?? 0);

            const countTotal = feeAmount + subtotal;

            // Show the additional fee
            $('#additional-fee').html(`
                <div class="fw-bolder pb-3 mb-3 border-bottom d-flex justify-content-between">
                    <span>Biaya Penanganan:</span>
                    <span id="subtotal-show" class="fw-bolder text-primary">${intToIdr(feeAmount)}</span>
                </div>
            `);
            $('#total-show').text(intToIdr(countTotal));

            // Replace The Input Values
            $('#payment-code').val(activeElement.data('id').replace('payment-', ''));
            $('#payment-name').val(paymentName);
            $('#payment-show').text(`${paymentName} (Ganti)`);

            $('#choose-payment').modal('hide');
        });
    </script>
@endsection
