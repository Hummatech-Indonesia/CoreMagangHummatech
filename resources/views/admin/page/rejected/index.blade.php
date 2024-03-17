@extends('admin.layouts.app')
@section('content')

<div class="row">
    <div class="row g-2 align-items-center">
        <div class="col-sm-4">
            <h4 class="mx-3 mb-4">DAFTAR SISWA DITOLAK</h4>

        </div>
    </div>
</div>


<div class="row">

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
                                    <div class="col-sm-auto ms-auto d-flex justify-content-between mb-3">
                                        <span class="mx-3 pt-2">search: </span>
                                        <div class="search-box">
                                            <input type="text" class="form-control" id="searchMemberList" >
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-card mt-3 mb-1 mx-3">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="">
                                            <tr>
                                                <th class="sort" data-sort="number">
                                                    NO
                                                </th>
                                                <th class="sort" data-sort="name">
                                                    Nama
                                                </th>
                                                <th class="sort" data-sort="date">
                                                    Email
                                                </th>
                                                <th class="sort" data-sort="date">
                                                    Jurusan
                                                </th>
                                                <th class="sort" data-sort="date">
                                                    Kelas
                                                </th>
                                                <th class="sort" data-sort="status">
                                                    Masa Magang
                                                </th>
                                                <th class="sort" data-sort="description">
                                                    Sekolah
                                                </th>
                                                <th class="sort" data-sort="action">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            <tr>
                                                <td class="number">1</td>
                                                <td class="name">Joseph Parker</td>
                                                <td class="date">Post@gmail.com</td>
                                                <td class="date">RPL</td>
                                                <td class="date">11</td>
                                                <td class="time">Joseph Parker</td>
                                                <td class="description">SMKN</td>
                                                <td>
                                                    <div class="view">
                                                        <button class="btn edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal" style="background-color: #49BEFF; color:white;">
                                                            Detail
                                                        </button>
                                                        <button class="btn edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal" style="background-color: #13DEB9; color:white;">
                                                            Terima
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="number">2</td>
                                                <td class="name">Joseph Parker</td>
                                                <td class="date">Post@gmail.com</td>
                                                <td class="date">TKJ</td>
                                                <td class="date">11</td>
                                                <td class="time">Joseph Parker</td>
                                                <td class="description">SMKN</td>
                                                <td>
                                                    <div class="view">
                                                        <button class="btn edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal" style="background-color: #49BEFF; color:white;">
                                                            Detail
                                                        </button>
                                                        <button class="btn edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal" style="background-color: #13DEB9; color:white;">
                                                            Terima
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
</div>


@endsection
