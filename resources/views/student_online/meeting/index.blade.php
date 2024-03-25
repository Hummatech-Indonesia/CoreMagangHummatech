@extends('student_online.layouts.app')

@section('content')
<div class="mb-5 row">
    <div class="col-md-2">
        <select id="schedule" class="form-select">
            <option selected>Semua Jadwal</option>
            <option value="past">Berakhir</option>
            <option value="today">Hari Ini</option>
            <option value="upcoming">Mendatang</option>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-4 col-xl-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between py-4 bg-primary">
                <h5 class="mb-0 text-white text-truncate">Judul Kegiatan</h5>
                <div>
                    <span class="p-2 px-3 bg-white rounded">Mendatang</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="d-flex flex-column gap-1 mb-3 col-md-6">
                        <span class="fw-bolder d-lg-none">Tanggal Kegiatan</span>
                        <span class="d-flex gap-2 align-items-center">
                            <i class="fas fa-calendar"></i>
                            12 Maret 2024
                        </span>
                    </div>
                    <div class="d-flex flex-column gap-1 mb-3 col-md-6">
                        <span class="fw-bolder d-lg-none">Tanggal Kegiatan</span>
                        <span class="d-flex gap-2 align-items-center">
                            <i class="fas fa-clock"></i>
                            06.00 s/d 08.00
                        </span>
                    </div>
                    <div class="d-flex flex-column gap-1 col-md-12">
                        <span class="fw-bolder d-lg-none">Tautan Kegiatan</span>
                        <span class="d-flex gap-2 align-items-center">
                            <i class="fas fa-link"></i>
                            <a class="text-truncate" target="_blank" href="https://us05web.zoom.us/j/6417801427?pwd=a2xjM09oWkFrOVZ6U0xLY2dveWZVQT09">https://us05web.zoom.us/j/6417801427?pwd=a2xjM09oWkFrOVZ6U0xLY2dveWZVQT09</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xl-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between py-4 bg-success">
                <h5 class="mb-0 text-white text-truncate">Judul Kegiatan</h5>
                <div>
                    <span class="p-2 px-3 bg-white rounded">Sekarang</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="d-flex flex-column gap-1 mb-3 col-md-6">
                        <span class="fw-bolder d-lg-none">Tanggal Kegiatan</span>
                        <span class="d-flex gap-2 align-items-center">
                            <i class="fas fa-calendar"></i>
                            12 Maret 2024
                        </span>
                    </div>
                    <div class="d-flex flex-column gap-1 mb-3 col-md-6">
                        <span class="fw-bolder d-lg-none">Tanggal Kegiatan</span>
                        <span class="d-flex gap-2 align-items-center">
                            <i class="fas fa-clock"></i>
                            06.00 s/d 08.00
                        </span>
                    </div>
                    <div class="d-flex flex-column gap-1 col-md-12">
                        <span class="fw-bolder d-lg-none">Tautan Kegiatan</span>
                        <span class="d-flex gap-2 align-items-center">
                            <i class="fas fa-link"></i>
                            <a class="text-truncate" target="_blank" href="https://us05web.zoom.us/j/6417801427?pwd=a2xjM09oWkFrOVZ6U0xLY2dveWZVQT09">https://us05web.zoom.us/j/6417801427?pwd=a2xjM09oWkFrOVZ6U0xLY2dveWZVQT09</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xl-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between py-4 bg-warning">
                <h5 class="mb-0 text-white text-truncate">Judul Kegiatan</h5>
                <div>
                    <span class="p-2 px-3 bg-white rounded">Berakhir</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="d-flex flex-column gap-1 mb-3 col-md-6">
                        <span class="fw-bolder d-lg-none">Tanggal Kegiatan</span>
                        <span class="d-flex gap-2 align-items-center">
                            <i class="fas fa-calendar"></i>
                            12 Maret 2024
                        </span>
                    </div>
                    <div class="d-flex flex-column gap-1 mb-3 col-md-6">
                        <span class="fw-bolder d-lg-none">Tanggal Kegiatan</span>
                        <span class="d-flex gap-2 align-items-center">
                            <i class="fas fa-clock"></i>
                            06.00 s/d 08.00
                        </span>
                    </div>
                    <div class="d-flex flex-column gap-1 col-md-12">
                        <span class="fw-bolder d-lg-none">Tautan Kegiatan</span>
                        <span class="d-flex gap-2 align-items-center">
                            <i class="fas fa-link"></i>
                            <a class="text-truncate" target="_blank" href="https://us05web.zoom.us/j/6417801427?pwd=a2xjM09oWkFrOVZ6U0xLY2dveWZVQT09">https://us05web.zoom.us/j/6417801427?pwd=a2xjM09oWkFrOVZ6U0xLY2dveWZVQT09</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
