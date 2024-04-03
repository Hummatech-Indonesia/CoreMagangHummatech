@extends('mentor.layouts.app')
@section('content')

<div class="row">
    <div class="d-flex justify-content-between">
        <h5>Detail Tugas</h5>
        <a href="{{ url('mentor/assessment') }}" type="button" class="btn btn-light-primary text-primary">Kembali</a>
    </div>
    <div>
        <span class="mb-1 badge font-medium bg-light-success text-success">Mudah</span>
        <h2 class="mt-3">Tutorial Laravel SPA Menggunakan Blade Template Engine (Splade)</h2>
    </div>
</div>

<div class="card card-body mt-3">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <h5>Jawaban yang Di Kumpulkan</h5>
        </div>
        <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">

            <form class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Cari Siswa...">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>

            <div class="col-md-4 col-lg-2 col-xl-2 mx-2">
                <select class="form-select">
                    <option selected>Semua</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
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
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Tanggal Di Kumpulkan</th>
                        <th>Status Magang</th>
                        <th>File</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="search-items">
                        <td>1</td>
                        <td class="d-flex">
                            <div class="n-chk align-self-center text-center">
                                <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" alt="avatar" class="rounded-circle" width="35">
                            </div>
                            <div class="ms-3">
                                <div class="user-meta-info">
                                    <h6 class="user-name mb-0 mt-2" data-name="Emma Adams">Emma Adams</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="usr-email-addr">Selasa 12 Februari 2024</span>
                        </td>
                        <td>
                            <span class="mb-1 badge font-medium bg-light-success text-success">Online</span>
                        </td>
                        <td>
                            <span>07.39.10</span>
                        </td>
                        <td>
                            <span class="mb-1 badge font-medium text-dark">Belum di nilai</span>
                        </td>
                    </tr>
                    <tr class="search-items">
                        <td>2</td>
                        <td class="d-flex">
                            <div class="n-chk align-self-center text-center">
                                <img src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}" alt="avatar" class="rounded-circle" width="35">
                            </div>
                            <div class="ms-3">
                                <div class="user-meta-info">
                                    <h6 class="user-name mb-0 mt-2" data-name="Emma Adams">Emma Adams</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="usr-email-addr">Selasa 12 Februari 2024</span>
                        </td>
                        <td>
                            <span class="mb-1 badge font-medium bg-light-primary text-primary">Offline</span>
                        </td>
                        <td>
                            <span>07.39.10</span>
                        </td>
                        <td>
                            <span class="mb-1 badge font-medium bg-light-success text-success">90.3</span>
                        </td>
                    </tr>
                    <tr class="search-items">
                        <td>3</td>
                        <td class="d-flex">
                            <div class="n-chk align-self-center text-center">
                                <img src="{{ asset('assets-user/dist/images/profile/user-3.jpg') }}" alt="avatar" class="rounded-circle" width="35">
                            </div>
                            <div class="ms-3">
                                <div class="user-meta-info">
                                    <h6 class="user-name mb-0 mt-2" data-name="Emma Adams">Emma Adams</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="usr-email-addr">Selasa 12 Februari 2024</span>
                        </td>
                        <td>
                            <span class="mb-1 badge font-medium bg-light-success text-success">Online</span>
                        </td>
                        <td>
                            <span>07.39.10</span>
                        </td>
                        <td>
                            <span class="mb-1 badge font-medium bg-light-warning text-warning">70.4</span>
                        </td>
                    </tr>
                    <tr class="search-items">
                        <td>3</td>
                        <td class="d-flex">
                            <div class="n-chk align-self-center text-center">
                                <img src="{{ asset('assets-user/dist/images/profile/user-3.jpg') }}" alt="avatar" class="rounded-circle" width="35">
                            </div>
                            <div class="ms-3">
                                <div class="user-meta-info">
                                    <h6 class="user-name mb-0 mt-2" data-name="Emma Adams">Emma Adams</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="usr-email-addr">Selasa 12 Februari 2024</span>
                        </td>
                        <td>
                            <span class="mb-1 badge font-medium bg-light-success text-success">Online</span>
                        </td>
                        <td>
                            <span>07.39.10</span>
                        </td>
                        <td>
                            {{-- <span class="mb-1 badge font-medium bg-light-warning text-warning">70.4</span> --}}
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr class="search-items">
                        <td>3</td>
                        <td class="d-flex">
                            <div class="n-chk align-self-center text-center">
                                <img src="{{ asset('assets-user/dist/images/profile/user-3.jpg') }}" alt="avatar" class="rounded-circle" width="35">
                            </div>
                            <div class="ms-3">
                                <div class="user-meta-info">
                                    <h6 class="user-name mb-0 mt-2" data-name="Emma Adams">Emma Adams</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="usr-email-addr">Selasa 12 Februari 2024</span>
                        </td>
                        <td>
                            <span class="mb-1 badge font-medium bg-light-success text-success">Online</span>
                        </td>
                        <td>
                            <span>07.39.10</span>
                        </td>
                        <td>
                            <span class="mb-1 badge font-medium bg-light-info text-info">82.23</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
