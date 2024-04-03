@extends('student_offline.layouts.app')
@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">History Top Up</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">History Top Up</li>
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


<div class="row">
    <div class="card card-body">
        <div class="table-responsive">
            <table class="table search-table align-middle text-nowrap">
                <thead class="header-item">
                    <tr>
                        <th>Top UP</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="search-items">
                        <td >
                            <div class="ms-3">
                                <div class="user-meta-info">
                                    <h6 class="user-name mb-0" data-name="Emma Adams">Rp.2.000.000</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="usr-email-addr">12 Maret 2024</span>
                        </td>
                        <td>
                            <span class="badge fw-semibold bg-light-success text-success">Di Terima</span>
                        </td>

                    </tr>
                    <tr class="search-items">
                        <td>
                            <div class="ms-3">
                                <div class="user-meta-info">
                                    <h6 class="user-name mb-0" data-name="Emma Adams">Rp.2.000.000</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="usr-email-addr">12 Maret 2024</span>
                        </td>
                        <td>
                            <span class="badge fw-semibold bg-light-danger text-danger">Di Tolak</span>
                        </td>

                    </tr>
                    <tr class="search-items">
                        <td>
                            <div class="ms-3">
                                <div class="user-meta-info">
                                    <h6 class="user-name mb-0" data-name="Emma Adams">Rp.2.000.000</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="usr-email-addr">12 Maret 2024</span>
                        </td>
                        <td>
                            <span class="badge fw-semibold bg-light-warning text-warning">Menunggu</span>
                        </td>

                    </tr>
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
