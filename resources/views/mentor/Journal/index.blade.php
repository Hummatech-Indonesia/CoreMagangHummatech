@extends('mentor.layouts.app')
@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Jurnal Siswa</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">jurnal</li>
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


    <div class="row mb-3">
        <div class="col-md-4 col-xl-2">
            <input type="date" class="form-control">
        </div>
        <div class="col-md-4 col-xl-2">
            <form class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Contacts...">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>
        <div class="col-md-4 col-xl-1">
            <select class="form-select">
                <option selected>Semua</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
        </div>
        <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
            <div class="action-btn show-btn" style="display: none">
                <a href="javascript:void(0)" class="delete-multiple btn-light-danger btn me-2 text-danger d-flex align-items-center font-medium">
                    <i class="ti ti-trash text-danger me-1 fs-5"></i>
                    Delete All Row

                </a>
            </div>
        </div>
    </div>


<div class="row">
    <div class="card card-body">
        <div class="table-responsive">
            <table class="table search-table align-middle text-nowrap">
                <thead class="header-item">
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($journals != null)

                        @forelse ($journals as $journal)
                        <tr class="search-items">
                            <td class="d-flex">
                                <div class="n-chk align-self-center text-center">
                                    {{-- <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt="avatar" class="rounded-circle" width="35"> --}}
                                    @if(Storage::disk('public')->exists($journal->student->avatar))
                                    <img src="{{ asset('storage/' . $journal->student->avatar) }}" alt="avatar" class="rounded-circle" width="35">
                                    @else
                                        <img src="{{ asset('user.webp') }}" alt="default avatar" class="rounded-circle" width="35">
                                    @endif
                                </div>
                                <div class="ms-3">
                                    <div class="user-meta-info">
                                        <h6 class="user-name mb-0" data-name="Emma Adams">{{$journal->student->name}}</h6>
                                        <span class="user-work fs-3" data-occupation="Web Developer">{{$journal->student->division->name}}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="usr-email-addr"> {{ \Carbon\Carbon::parse($journal->created_at)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}</span>
                            </td>
                            <td>
                                <span class="badge fw-semibold bg-light-success text-success">
                                    <?php
                                    if ($journal->status === 'fillin') {
                                        echo '<span class="text-success text-uppercase">MENGISI</span>';
                                    } else {
                                        echo '<span class="text-danger text-uppercase">TIDAK MENGISI</span>';
                                    }
                                    ?>
                                </span>
                            </td>
                            <td class="text-break">
                                <span>
                                    {{ Str::limit($journal->description, 100) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-btn">
                                    <a href="javascript:void(0)" class="text-info edit" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop_{{ $journal->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        @empty

                        <tr>
                            <td colspan="8">
                                <div class="d-flex justify-content-center mt-3">
                                    <img src="{{ asset('no data.png') }}" width="200px"
                                        alt="">
                                </div>
                                <h4 class="text-center mt-2 mb-4">
                                    Data Masih kosong
                                </h4>
                            </td>
                        </tr>

                        @endforelse

                    @else
                        <tr>
                            <td colspan="8">
                                <div class="d-flex justify-content-center mt-3">
                                    <img src="{{ asset('no data.png') }}" width="200px"
                                        alt="">
                                </div>
                                <h4 class="text-center mt-2 mb-4">
                                    Data Masih kosong
                                </h4>
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>

<nav aria-label="...">
    <ul class="pagination justify-content-center mb-0 mt-4">
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
<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Detail Jurnal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div>
                <h6>Nama</h6>
                <p>Bagas Ran</p>
            </div>
            <div>
                <h6>Tanggal</h6>
                <p>12 Maret 2024</p>
            </div>
            <div>
                <h6>Sekolah</h6>
                <p>SMK Negeri 1 Kepanjen</p>
            </div>
            <div>
                <h6>Kegiatan</h6>
                <p>Hari ini saya membuat crud laravel </p>
            </div>
            <div>
                <h6>Bukti</h6>
                <img src="{{ asset('assets-user/dist/images/blog/blog-img3.jpg') }}" alt="" style="max-width: 100%; height: auto; max-height: 150px; object-fit: cover;">
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
</div>


@endsection
