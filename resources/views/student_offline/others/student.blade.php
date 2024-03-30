@extends('student_offline.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Siswa</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Siswa</li>
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

    <div class="row g-2 mb-4">
        <div class="col-sm-auto ms-auto">
            <form action="">
                <div class="d-flex">
                    <div class="search-box mx-2">
                        <input type="text" class="form-control search-chat py-2" id="text-srh" placeholder="Cari Materi">
                    </div>
                    <button class="btn btn-primary">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse ($students as $student)
        <div class="col-lg-4 col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ asset('assets-user/dist/images/profile/user-6.jpg') }}" class="rounded-1 img-fluid" width="90" alt="">
                    <div class="mt-n2">
                        <span class="badge bg-primary">{{ $student->major }}</span>
                        <h3 class="card-title mt-3">{{ $student->name }}</h3>
                        <h6 class="card-subtitle">{{ $student->school }}</h6>
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-6">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#laporModal">
                                <i class="ti ti-flag"></i>
                                Laporkan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="d-flex justify-content-center mb-2 mt-5">
            <img src="{{ asset('no data.png') }}" alt="" width="300px" srcset="">
        </div>
        <p class="fs-5 text-dark text-center mb-5">
            Tidak ada siswa magang offline selain kamu
        </p>
        @endforelse
    </div>

    <nav aria-label="...">
        <ul class="pagination justify-content-center mb-0">
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center" href="#">
                    <i class="ti ti-chevron-left"></i>
                </a>
            </li>
            <li class="page-item active">
                <a href="#" class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center">1</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center">2</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center">3</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center">...</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center">5</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center">
                    <i class="ti ti-chevron-right"></i>
                </a>
            </li>
        </ul>
    </nav>


 <!-- Modal -->
<div class="modal fade" id="laporModal" tabindex="-1" aria-labelledby="laporModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="laporModalLabel">Laporkan Masalah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="deskripsiInput" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsiInput" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambarInput" class="form-label">Upload Gambar</label>
                        <input class="form-control" type="file" id="gambarInput" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
