@extends('student_online.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
@endsection

@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Riwayat Transaksi</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Riwayat Transaksi</li>
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

<div class="card table-responsive">
    <table class="table table-striped" aria-labelledby="title">
        <thead>
            <tr>
                <th scope="col">ID Transaksi</th>
                <th scope="col">Tanggal Terbit</th>
                <th scope="col">Tenggat Waktu</th>
                <th scope="col">Nominal</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
            <tr>
                <th>
                    <a href="{{ route('transaction-history.detail', $transaction->transaction_id) }}">#{{ $transaction->transaction_id }}</a>
                </th>
                <td>{{ $transaction->issued_at->locale('id_ID')->isoFormat('dddd, D MMMM Y HH:mm \W\I\B') }}</td>
                <td>{{ $transaction->expired_at->locale('id_ID')->isoFormat('dddd, D MMMM Y HH:mm \W\I\B') }}</td>
                <td>@currency($transaction->amount)</td>
                <td>
                    @php
                        $status = strtoupper($transaction->status);
                        $refs = App\Enum\TransactionStatusEnum::{$status};
                    @endphp
                    <span class="badge bg-{{ $refs->color() }}">{{ $refs->label() }}</span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="card-body d-flex gap-2 pt-3 justify-content-between">
        <div class="m-0">Menampilkan {{ $transactions->firstItem() }} ke {{ $transactions->lastItem() }} dari {{ $transactions->total() }} daftar</div>
        {!! $transactions->links() !!}
    </div>
</div>
@endsection
