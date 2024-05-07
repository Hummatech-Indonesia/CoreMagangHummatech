@extends(auth()->user()->hasRole('siswa-online') ? 'student_online.layouts.app' : 'student_offline.layouts.app')

@section('style')
    <style>
        :root {
  --card-line-height: 1.2em;
  --card-padding: 1em;
  --card-radius: 0.5em;
  --color-green: #558309;
  --color-gray: #e2ebf6;
  --color-dark-gray: #c4d1e1;
  --radio-border-width: 2px;
  --radio-size: 1.5em;
}


.grid {
  display: grid;
  grid-gap: var(--card-padding);
  margin: 0 auto;
  max-width: 60em;
  padding: 0;

  @media (min-width: 42em) {
    grid-template-columns: repeat(3, 1fr);
  }
}

.card {
  background-color: #fff;
  border-radius: var(--card-radius);
  position: relative;

  &:hover {
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.15);
  }
}

.radio {
  font-size: inherit;
  margin: 0;
  position: absolute;
  right: calc(var(--card-padding) + var(--radio-border-width));
  top: calc(var(--card-padding) + var(--radio-border-width));
}

@supports(-webkit-appearance: none) or (-moz-appearance: none) {
  .radio {
    -webkit-appearance: none;
    -moz-appearance: none;
    background: #fff;
    border: var(--radio-border-width) solid var(--color-gray);
    border-radius: 50%;
    cursor: pointer;
    height: var(--radio-size);
    outline: none;
    transition:
      background 0.2s ease-out,
      border-color 0.2s ease-out;
    width: var(--radio-size);

    &::after {
      border: var(--radio-border-width) solid #fff;
      border-top: 0;
      border-left: 0;
      content: '';
      display: block;
      height: 0.75rem;
      left: 25%;
      position: absolute;
      top: 50%;
      transform:
        rotate(45deg)
        translate(-50%, -50%);
      width: 0.375rem;
    }

    &:checked {
      background: var(--color-green);
      border-color: var(--color-green);
    }
  }

  .card:hover .radio {
    border-color: var(--color-dark-gray);

    &:checked {
      border-color: var(--color-green);
    }
  }
}

.plan-details {
  border: var(--radio-border-width) solid var(--color-gray);
  border-radius: var(--card-radius);
  cursor: pointer;
  display: flex;
  flex-direction: column;
  padding: var(--card-padding);
  transition: border-color 0.2s ease-out;
}

.card:hover .plan-details {
  border-color: var(--color-dark-gray);
}

.radio:checked ~ .plan-details {
  border-color: var(--color-green);
}

.radio:focus ~ .plan-details {
  box-shadow: 0 0 0 2px var(--color-dark-gray);
}

.radio:disabled ~ .plan-details {
  color: var(--color-dark-gray);
  cursor: default;
}

.radio:disabled ~ .plan-details .plan-type {
  color: var(--color-dark-gray);
}

.card:hover .radio:disabled ~ .plan-details {
  border-color: var(--color-gray);
  box-shadow: none;
}

.card:hover .radio:disabled {
    border-color: var(--color-gray);
  }

.plan-type {
  color: var(--color-green);
  font-size: 1.5rem;
  font-weight: bold;
  line-height: 1em;
}

.plan-cost {
  font-size: 2.5rem;
  font-weight: bold;
  padding: 0.5rem 0;
}

.slash {
  font-weight: normal;
}

.plan-cycle {
  font-size: 2rem;
  font-variant: none;
  border-bottom: none;
  cursor: inherit;
  text-decoration: none;
}

.hidden-visually {
  border: 0;
  clip: rect(0, 0, 0, 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}
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

    {{-- @if($errors->all())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif --}}

        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-none border">
                    <div class="card-header bg-white pt-4">
                        <h3>Detail Barang</h3>
                    </div>
                    <div class="card-body pt-2">
                        <div class="list-item list-group-flush">
                                <div class="list-group-item">
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class="d-flex justify-content-center">
                                            <div class="image-cart-square"
                                                style="background-image: url({{ asset('assets-user/images/laravel-11.jpg') }})"></div>
                                        </div>
                                        <div class="">
                                            <h3 class="fw-bolder">{{ $course->title }}</h3>
                                            <div class="text-primary">{{ $course->price}}</div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border shadow-none">
                    <h4 class="card-header mb-0 py-4 bg-primary text-white">Pembayaran</h4>
                        {{-- <form method="POST" action="{{ route('voucher.revoke') }}" class="card-body">
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
                    @else --}}
                        <form method="" action="" class="card-body">
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

                    <form method="POST" action="{{ route('transaction.save-course', $course->id) }}" class="card-body pt-0">
                        @csrf
                        <!-- @if ($voucherDetail)
                            <input type="hidden" name="voucher_code" value="{{ $voucherDetail->code_voucher }}" />
                        @endif -->
                        <input type="hidden" name="tax" value="{{ Transaction::countTax($cartData->subtotal()) }}"
                            id="tax" />
                        <input type="hidden" name="subtotal"
                            value="{{ Transaction::countTax(
                                Transaction::discountSubtotal($cartData->subtotal(), $voucherDetail ? $voucherDetail->presentase : 0),
                                true,
                            ) }}"
                            id="subtotal" />
                        <input type="hidden" name="total"
                        value="{{ Transaction::countTax(
                            Transaction::discountSubtotal($cartData->subtotal(), $voucherDetail ? $voucherDetail->presentase : 0),
                            true,
                        ) }}" id="total" />
                        <input type="hidden" name="payment_code" id="payment-code" />
                        <input type="hidden" name="payment_name" id="payment-name" />
                        <input type="hidden" name="payment_code" id="payment-name"/>
                        <input type="hidden" name="discount"
                            value="{{ Transaction::discount($cartData->subtotal(), $voucherDetail ? $voucherDetail->presentase : 0) }}"
                            id="discount" />

                        <div class="pb-3 d-flex gap-2 flex-column mb-3">
                            <div class="d-flex justify-content-between">
                                <span>Metode Pembayaran:</span>
                                <a href="javascript:openModal('choose-payment')" id="payment-show"
                                    class="fw-bolder text-primary text-end">Pilih</a>
                            </div>

                            @error('payment_code')
                                <div class="text-danger text-end w-100">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-3 border rounded mb-1">
                            <div
                                class="fw-bolder mb-3 align-items-center pb-3 border-bottom d-flex justify-content-between">
                                <span>Subtotal:</span>
                                <span id="subtotal-show" class="fw-bolder text-muted">
                                    <span>{{ $course->price }}</span>
                                </span>
                            </div>
                            <div class="fw-bolder mb-3 pb-3 border-bottom d-flex justify-content-between">
                                <span>PPn 11%:</span>
                                <span class="fw-bolder text-muted">
                                    {{ $course->price * (11/100) }}
                                </span>
                            </div>
                            {{-- @if ($voucherDetail)
                                <div class="fw-bolder mb-3 pb-3 border-bottom d-flex justify-content-between">
                                    <span>Potongan Harga:</span>
                                    <span id="voucher-show" class="fw-bolder text-primary">
                                        &minus;2.000
                                    </span>
                                </div>
                            @endif --}}
                            <div id="additional-fee"></div>
                            <div class="fw-bolder d-flex justify-content-between">
                                <span>Total:</span>
                                <span id="total-show" class="fw-bolder text-primary">
                                    {{ $course->price + $course->price * (11/100) }}
                                </span>
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
                        <div class="grid">
                            @foreach ($paymentChannel as $channel)
                                <label class="card card-payment" data-id="payment-{{ $channel['code'] }}"
                                    data-name="{{ $channel['name'] }}" data-fee="{{ $channel['fee'] }}">
                                    <input name="plan" class="radio" type="radio" checked>
                                    <span class="plan-details">
                                        <img src="{{ $channel['icon_url'] }}" alt="">
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="button" data-bs-toggle="choose-payment" class="btn btn-primary">Pilih Pembayarannya</button>
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
            const tax = parseInt($('#tax').val() ?? 0);

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
