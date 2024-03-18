@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="row g-2 align-items-center">
            <div class="col-sm-4">
                <h3 class="mx-3">Approval / Izin dan Sakit</h3>
                <div class="step-arrow-nav mb-4 pt-3 mx-3">
                    <ul class="nav nav-pills custom-nav nav-justified"role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="steparrow-gen-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-gen-info" type="button" role="tab"
                            aria-controls="steparrow-gen-info" aria-controls="steparrow-gen-info" aria-selected="true" data-position="0">
                            Permintaan Izin
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="steparrow-description-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-description-info" type="button" role="tab"
                            aria-controls="steparrow-description-info" aria-selected="false" data-position="1" tabindex="-1">
                            Izin Diterima
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-auto ms-auto d-flex justify-content-between pt-4">
                <div class="search-box">
                    <input type="text" class="form-control" id="searchMemberList" placeholder="Cari Siswa...">
                    <i class="ri-search-line search-icon"></i>
                </div>
                <div class="mx-3">
                    <input type="date" class="form-control"id="exampleInputdate">
                </div>
                <div class="list-grid-nav hstack gap-1">
                    <button class="btn btn-primary addMembers-modal" data-bs-toggle="modal" data-bs-target="#addmemberModal">
                        Cari
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="tab-content">
    <div id="steparrow-gen-info" class="tab-pane fade show active">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="listjs-table"id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div class="d-flex">
                                        <h5 class="mx-2 pt-2">Show</h5>
                                        <select name=""class="form-select" id="expiry-month-input">
                                            <option value="1">10</option>
                                        </select>
                                        <h5 class="mx-2 pt-2">entries</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table-card mt-3 mb-1 mx-3">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="sort" data-sort="number">
                                                NO
                                            </th>
                                            <th class="sort" data-sort="name">
                                                Nama
                                            </th>
                                            <th class="sort" data-sort="date">
                                                Sekolah
                                            </th>
                                            <th class="sort" data-sort="status">
                                                Dari Tanggal
                                            </th>
                                            <th class="sort" data-sort="description">
                                                Sampai Tanggal
                                            </th>
                                            <th class="sort" data-sort="description">
                                                Keterangan
                                            </th>
                                            <th class="sort" data-sort="action">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        <tr>
                                            <td class="number">1</td>
                                            <td class="name">VLZ1400087402</td>
                                            <td class="date">Post launch reminder/ post list</td>
                                            <td class="status">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit
                                            </td>
                                            <td class="description">Lorem ipsum dolor sit amet consectetur</td>
                                            <td class="status">
                                                <span class="badge bg-success-subtle text-success text-uppercase">Mengisi</span>
                                            </td>
                                            <td>
                                                <div class="view">
                                                    <button class="btn btn-soft-primary  edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">
                                                        <i class=" ri-eye-line"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="number">2</td>
                                            <td class="name">VLZ1400087402</td>
                                            <td class="date">Post launch reminder/ post list</td>
                                            <td class="status">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit
                                            </td>
                                            <td class="description">Lorem ipsum dolor sit amet consectetur</td>
                                            <td class="status">
                                                <span class="badge bg-success-subtle text-success text-uppercase">Mengisi</span>
                                            </td>
                                            <td>
                                                <div class="view">
                                                    <button class="btn btn-soft-primary  edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">
                                                        <i class=" ri-eye-line"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Pagination -->
                            <div class="d-flex justify-content-between px-3">
                                <p>Showing 1 to 10 of 14 entries</p>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="steparrow-description-info" class="tab-pane fade">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="listjs-table"id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div class="d-flex">
                                        <h5 class="mx-2 pt-2">Show</h5>
                                        <select name=""class="form-select" id="expiry-month-input">
                                            <option value="1">10</option>
                                        </select>
                                        <h5 class="mx-2 pt-2">entries</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table-card mt-3 mb-1 mx-3">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="sort" data-sort="number">
                                                NO
                                            </th>
                                            <th class="sort" data-sort="name">
                                                Nama
                                            </th>
                                            <th class="sort" data-sort="date">
                                                Sekolah
                                            </th>
                                            <th class="sort" data-sort="status">
                                                Dari Tanggal
                                            </th>
                                            <th class="sort" data-sort="description">
                                                Sampai Tanggal
                                            </th>
                                            <th class="sort" data-sort="description">
                                                Keterangan
                                            </th>
                                            <th class="sort" data-sort="action">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        <tr>
                                            <td class="number">1</td>
                                            <td class="name">VLZ1400087402</td>
                                            <td class="date">Post launch reminder/ post list</td>
                                            <td class="status">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit
                                            </td>
                                            <td class="description">Lorem ipsum dolor sit amet consectetur</td>
                                            <td class="status">
                                                <span class="badge bg-success-subtle text-success text-uppercase">Mengisi</span>
                                            </td>
                                            <td>
                                                <div class="view">
                                                    <button class="btn btn-soft-primary  edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">
                                                        <i class=" ri-eye-line"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="number">1</td>
                                            <td class="name">VLZ1400087402</td>
                                            <td class="date">Post launch reminder/ post list</td>
                                            <td class="status">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit
                                            </td>
                                            <td class="description">Lorem ipsum dolor sit amet consectetur</td>
                                            <td class="status">
                                                <span class="badge bg-success-subtle text-success text-uppercase">Mengisi</span>
                                            </td>
                                            <td>
                                                <div class="view">
                                                    <button class="btn btn-soft-primary  edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">
                                                        <i class=" ri-eye-line"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Pagination -->
                            <div class="d-flex justify-content-between px-3">
                                <p>Showing 1 to 10 of 14 entries</p>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
