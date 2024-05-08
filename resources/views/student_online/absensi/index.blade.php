@extends('student_online.layouts.app')

{{-- @section('style')
<style>
    @media (max-width: 576px) {
  .card-subtitle {
    font-size: 14px;
  }
  .card-body {
    margin: 10px;
  }
}

@media (min-width: 577px) and (max-width: 768px) {
  .card-subtitle {
    font-size: 16px;
  }
  .card-body {
    margin: 15px;
  }
}

@media (min-width: 769px) {
  .card-subtitle {
    font-size: 18px;
  }
  .card-body {
    margin: 20px;
  }
}
</style>
@endsection --}}

@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Optimalkan Kehadiran dan Kedisiplinan Siswa: Inovasi Terkini dalam <br> Manajemen Absensi</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>

                        <li class="breadcrumb-item" aria-current="page">Absensi</li>
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

<div class="container">
    <div class="row justify-content-around">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card mb-4 bg-light-primary">
                <a href="#" class="stretched-link"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <div class="bg-primary text-light rounded d-flex align-items-center justify-content-center p-2" style="width: 50px; height: 45px;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-balloon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 1a7 7 0 0 1 7 7c0 5.457 -3.028 10 -7 10c-3.9 0 -6.89 -4.379 -6.997 -9.703l-.003 -.297l.004 -.24a7 7 0 0 1 6.996 -6.76zm0 4a1 1 0 0 0 0 2l.117 .007a1 1 0 0 1 .883 .993l.007 .117a1 1 0 0 0 1.993 -.117a3 3 0 0 0 -3 -3z" />
                                    <path d="M12 16a1 1 0 0 1 .993 .883l.007 .117v1a3 3 0 0 1 -2.824 2.995l-.176 .005h-3a1 1 0 0 0 -.993 .883l-.007 .117a1 1 0 0 1 -2 0a3 3 0 0 1 2.824 -2.995l.176 -.005h3a1 1 0 0 0 .993 -.883l.007 -.117v-1a1 1 0 0 1 1 -1z" />
                                </svg>


                            </div>
                        </div>

                        <div class="col-9">
                            <div>
                                <h6 class="card-subtitle mb-0">Total Absensi</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex justify-content-between">
                            <h3>56 Kali</h3>
                            <span class="ml-auto">Absensi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card mb-4 bg-light-success">
                <a href="#" class="stretched-link"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3">

                            <div class="bg-success text-light rounded d-flex align-items-center justify-content-center p-2" style="width: 50px; height: 45px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-user">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" />
                                    <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
                                </svg>
                            </div>

                        </div>

                        <div class="col-9">
                            <div>
                                <h6 class="card-subtitle mb-0">Total Hadir</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex justify-content-between">
                            <h3>56 Kali</h3>
                            <span class="ml-auto">Absensi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card mb-4 bg-light-warning">
                <a href="#" class="stretched-link"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <div class="bg-warning text-light rounded d-flex align-items-center justify-content-center p-2 " style="width: 50px; height: 45px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-mail">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M22 7.535v9.465a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-9.465l9.445 6.297l.116 .066a1 1 0 0 0 .878 0l.116 -.066l9.445 -6.297z" />
                                    <path d="M19 4c1.08 0 2.027 .57 2.555 1.427l-9.555 6.37l-9.555 -6.37a2.999 2.999 0 0 1 2.354 -1.42l.201 -.007h14z" />
                                  </svg>
                            </div>
                        </div>

                        <div class="col-9">
                            <div>
                                <h6 class="card-subtitle mb-0">Total Izin  & Sakit</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex justify-content-between">
                            <h3>56 Kali</h3>
                            <span class="ml-auto">Absensi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card mb-4 bg-light-danger">
                <a href="#" class="stretched-link"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="bg-danger text-light rounded d-flex align-items-center justify-content-center p-2 col-3" style="width: 50px; height: 45px;">
                            <button type="button" class="text-primary d-flex text-light align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" data-bs-toggle="modal" data-bs-target="#userModal" style="background-color: transparent; border: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-affiliate">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M18.5 3a2.5 2.5 0 1 1 -.912 4.828l-4.556 4.555a5.475 5.475 0 0 1 .936 3.714l2.624 .787a2.5 2.5 0 1 1 -.575 1.916l-2.623 -.788a5.5 5.5 0 0 1 -10.39 -2.29l-.004 -.222l.004 -.221a5.5 5.5 0 0 1 2.984 -4.673l-.788 -2.624a2.498 2.498 0 0 1 -2.194 -2.304l-.006 -.178l.005 -.164a2.5 2.5 0 1 1 4.111 2.071l.787 2.625a5.475 5.475 0 0 1 3.714 .936l4.555 -4.556a2.487 2.487 0 0 1 -.167 -.748l-.005 -.164l.005 -.164a2.5 2.5 0 0 1 2.495 -2.336z" />
                                  </svg>
                            </button>
                        </div>

                        <div class="col-9">
                            <div>
                                <h6 class="card-subtitle mb-0">Total Alpha</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex justify-content-between">
                            <h3>56 Kali</h3>
                            <span class="ml-auto">Absensi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col text-end">
        <form action="{{ route('attendance.online.store') }}" method="post">
            @csrf
            @method('POST')
            <button class="btn btn-success me-2" type="submit">Absen</button>
        </form>
        <button class="btn btn-danger me-2">
            Ekspor PDF
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-pdf">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" />
                <path d="M17 18h2" />
                <path d="M20 15h-3v6" />
                <path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" />
              </svg>
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#izinModal">
            Buat Izin
        </button>
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
                        <th>Keterangan</th>
                        <th>Masuk</th>
                        <th>Pulang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($onlineAttendances as $attendance)

                    <tr class="search-items">
                            <td class="d-flex">
                                <div class="ms-3">
                                    <div class="user-meta-info">
                                        <h6 class="user-name mb-0" data-name="Emma Adams">{{ $attendance->name }}</h6>
                                        <span class="user-work fs-3" data-occupation="Web Developer">Web Developer</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="usr-email-addr">12 Maret 2024</span>
                            </td>
                            <td>
                                <span class="badge fw-semibold bg-light-success text-success">{{ $attendance->attendances[0]->status }}</span>
                            </td>
                            <td>
                            @if (isset($student->attendances[0]))
                                @foreach ($student->attendances[0]->attendanceDetails as $detailAttendance)
                                    @if ($detailAttendance->status == 'present')
                                        @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                                \Carbon\Carbon::createFromFormat('H:i:s', '08:00:00')->addMinutes(1)->format('H:i:s'))
                                            <span>{{ date('H:i', strtotime($detailAttendance->created_at)) }}</span>
                                        @else
                                            <span>{{ date('H:i', strtotime($detailAttendance->created_at)) }}</span>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                            </td>
                            <td>
                            @if (isset($student->attendances[0]))
                                @foreach ($student->attendances[0]->attendanceDetails as $detailAttendance)
                                    @if ($detailAttendance->status == 'return')
                                        @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                                \Carbon\Carbon::createFromFormat('H:i:s', '08:00:00')->addMinutes(1)->format('H:i:s'))
                                            <span>{{ date('H:i', strtotime($detailAttendance->created_at)) }}</span>
                                        @else
                                            <span class="badge fw-semibold bg-light-warning text-warning">{{ date('H:i', strtotime($detailAttendance->created_at)) }}</span>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<nav aria-label="...">
    <ul class="pagination justify-content-end mb-0 mt-3">
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

<!-- Izin Modal -->
<div class="modal fade" id="izinModal" tabindex="-1" aria-labelledby="izinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="izinModalLabel">Tambah Izin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
                <label for="izinStartDate" class="form-label">Dari Tanggal</label>
                <input type="date" class="form-control" id="izinStartDate">
            </div>
            <div class="mb-3">
                <label for="izinEndDate" class="form-label">Sampai Tanggal</label>
                <input type="date" class="form-control" id="izinEndDate">
            </div>
            <div class="mb-3">
                <label for="keteranganTextarea" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="keteranganTextarea" rows="3" placeholder="Masukkan deskripsi"></textarea>
            </div>
            <div class="mb-3">
                <div>
                    <label for="statusIzin" class="form-label">Status Izin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="statusIzin" id="izinDiterima" value="Diterima">
                    <label class="form-check-label" for="izinDiterima">
                        Izin
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="statusIzin" id="izinDitolak" value="Ditolak">
                    <label class="form-check-label" for="izinDitolak">
                        Sakit
                    </label>
                </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
</div>


@endsection
