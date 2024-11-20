@extends('mentor.layouts.app')
@section('content')
    <div class="modal fade" id="pending-date" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tunda Presentasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('presentation.changeStatus') }}" method="post" id="pendingForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="presentation_id" value="" id="inputPresentationId">
                    <input type="hidden" name="status_presentation"
                        value="{{ \App\Enum\StatusPresentationEnum::PENNDING->value }}"/>
                    <input type="date" name="planning_date_presentation" value="" id="inputPresentationDate"
                        class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger text-danger" data-bs-dismiss="modal">Tutup
                    </button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    </div>

    <div class="container-fluid note-has-grid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Pengajuan Projek</h4>
                        <nav aria-label="breadcrumb mt-2">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Pengajuan Projek</li>
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

        <div class="row mb-4">
        <div class="col-12 d-flex align-items-center">
            <!-- Search Bar -->
            <div class="d-flex mx-3" style="width: 30%;">
                <input type="text" class="form-control" placeholder="Cari Tim" id="search">
            </div>
            <!-- Filter Button -->
            <button class="btn btn-outline-primary">
                <i class="bi bi-filter"></i> Filter
            </button>
        </div>

        {{-- CARD --}}
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($projects as $p)
                <div class="col">
                    <div class="card h-100 shadow-sm position-relative">
                        <!-- Placeholder Image -->
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <div class="rounded-circle bg-primary d-flex justify-content-center align-items-center" 
                                    style="width: 100px; height: 100px; color: white; font-size: 1.2rem;">
                                </div>
                            </div>
                            <!-- Team Name -->
                            <h5 class="card-title">{{ $p->name }}</h5>
                            <!-- Description -->
                            <p class="card-text text-muted">{{ $p->description }}</p>
                            <!-- Date -->
                            <p class="text-muted">{{ \Carbon\Carbon::parse($p->date)->translatedFormat('l, d F Y') }}</p>
                            <!-- Avatars -->
                            <div class="d-flex justify-content-center mb-3">
                                @foreach($p->members as $member)
                                    <img src="{{ $member->avatar_url }}" alt="{{ $member->name }}" 
                                        class="rounded-circle border border-white shadow-sm" 
                                        style="width: 30px; height: 30px; margin-left: -10px;">
                                @endforeach
                            </div>
                            <!-- Detail Button -->
                            <a href="" class="btn btn-primary w-100">Lihat Detail</a>
                        </div>
        
                        <!-- Action Buttons -->
                        <div class="position-absolute top-0 end-0 p-2 d-flex gap-2">
                            <!-- Accept Button -->
                            <form action="" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm" title="Terima">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                            </form>
                            <!-- Reject Button -->
                            <form action="" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger btn-sm" title="Tolak">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    </div>

@endsection