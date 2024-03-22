@extends('student_online.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
@endsection

@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Pesanan Saya</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="{{ url('/login') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Pesanan Saya</li>
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

<div class="my-3 mb-5 d-flex gap-3">
    <div class="status-wrapper">
        <select id="status" class="form-control">
            <option @if(!request()->get('status')) selected @endif value="">Semua Status</option>
            @foreach (App\Enum\TransactionStatusEnum::cases() as $status)
            <option @if(request()->get('status') === $status->value) selected @endif value="{{ $status->value }}">{{ $status->label() }}</option>
            @endforeach
        </select>
    </div>
    <div class="sort-wrapper">
        <select id="sort" class="form-control">
            <option @if(request()->get('sort') === 'desc' || !request()->get('sort')) selected @endif value="desc">Terbaru</option>
            <option @if(request()->get('sort') === 'asc') selected @endif value="asc">Dari Lama</option>
        </select>
    </div>
</div>

<div class="row">
    @forelse ($transactions as $transaction)
    @php
        $php_version = phpversion();
        $status = strtoupper($transaction->status);

        if (version_compare($php_version, '8.3.0', '>=')) {
            $refs = App\Enum\TransactionStatusEnum::$status;
        } else {
            $refs = App\Enum\TransactionStatusEnum::$status;
        }
    @endphp
    <div class="col-xl-4 col-xxl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex gap-3 align-items-center">
                    <div class="bg-primary text-white p-4 rounded">
                        <i class="fas fa-2x fa-box"></i>
                    </div>
                    <div>
                        <h5>{{ $transaction->product->name }}</h5>
                        <h3 class="text-primary fw-bolder mb-0">@currency($transaction->product->price)</h3>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6 d-flex gap-1 align-items-center flex-column">
                        <p class="mb-0 fw-bolder">Status</p>
                        <p class="mb-0"><span class="fw-bolder badge bg-{{ $refs->color() }}">{{ $refs->label() }}</span></p>
                    </div>
                    <div class="col-md-6 d-flex gap-1 align-items-center flex-column">
                        <p class="mb-0 fw-bolder">Bayar Sebelum</p>
                        @if(in_array($transaction->status, ['pending', 'unpaid']))
                        <span class="text-center">{{ $transaction->expired_at->locale('id_ID')->isoFormat('dddd, D MMMM Y HH:mm \W\I\B') }}</span>
                        @else
                        <span class="text-center">-</span>
                        @endif
                    </div>
                </div>

                @if(in_array($transaction->status, ['pending', 'unpaid']))
                <a href="{{ route('transaction-history.detail', $transaction->transaction_id) }}" class="btn btn-warning w-100 mt-3">Lihat Detail</a>
                @endif
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}" alt="No Data" height="150px" width="auto" />
                    <h3>Tidak Ada Data</h3>
                </div>
            </div>
        </div>
    </div>
    @endforelse
</div>

@if($transactions->hasPages())
<div class="py-4">
    {{ $transactions->links() }}
</div>
@endif
@endsection

@section('script')
<script>
// Function to get query parameters from URL
function getQueryParams() {
    return new URLSearchParams(window.location.search);
}

// Function to update URL
function updateUrl() {
    const baseUrl = window.location.href.split('?')[0];
    const queryParams = getQueryParams();

    if(statusSelect.value !== '')
        queryParams.set('status', statusSelect.value);
    else
        queryParams.delete('status')

    if(sortSelect.value !== '')
        queryParams.set('sort', sortSelect.value);
    else
        queryParams.delete('sort')

    const newUrl = `${baseUrl}?${queryParams.toString()}`;

    // Update the URL
    window.location.href = newUrl;
}

// Selecting the elements
const statusSelect = document.getElementById('status');
const sortSelect = document.getElementById('sort');

// Adding event listeners
statusSelect.addEventListener('change', updateUrl);
sortSelect.addEventListener('change', updateUrl);
</script>
@endsection
