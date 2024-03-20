@extends('student_online.layouts.app')

@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Langganan Untuk Membuka Kunci</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/login">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Jurnal</li>
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

    <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
            <h2 class="fw-bolder mb-3 fs-8 lh-base">Langganan untuk membuka semua fitur</h2>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        @forelse ($products as $product)
        <div class="col-sm-6 col-lg-4 ">
            <div class="card">
                <div class="card-body pt-6">
                    <span class="fw-bolder text-uppercase fs-2 d-block mt-3 mb-7">{{ $product->name }}</span>
                    <div class="my-4">
                        <img alt="{{ $product->name }}" src="{{ asset("storage/{$product->image}") }}"
                            class="img-fluid" class="w-100" />
                    </div>
                    <div class="d-flex mb-3">
                        <h5 class="fw-bolder fs-6 mb-0">IDR</h5>
                        <h2 class="fw-bolder fs-12 ms-2 mb-0">@fcurrency($product->price)</h2>
                        <span class="ms-2 fs-4 d-flex align-items-center">/bulan</span>
                    </div>

                    <div class="mb-4">{!! $product->description !!}</div>

                    <form action="{{ route('subscription.process') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $product->id }}" />

                        <button type="submit" class="btn btn-primary fw-bolder rounded-2 py-6 w-100 text-capitalize">Saya Pilih Ini</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        @endforelse
    </div>
@endsection
