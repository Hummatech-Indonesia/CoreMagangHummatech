@extends('admin.layouts.app')
@section('content')

<div class="col-sm-4 mt-3 mb-5">
    <h3 class="mx-3">Approval Top Up</h3>
</div>

<div class="tab-content">
    <div id="steparrow-gen-info" class="tab-pane fade show active">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="listjs-table"id="customerList">
                            <div class="row px-3 mb-3 d-flex justify-content-between">
                                <div class="col-sm-auto">
                                    <div class="d-flex">
                                        <h5 class="mx-2 pt-2">Show</h5>
                                        <select name=""class="form-select" id="expiry-month-input">
                                            <option value="1">10</option>
                                        </select>
                                        <h5 class="mx-2 pt-2">entries</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <form action="" class="d-flex gap-2 align-items-center">
                                        <label for="search">Cari:</label>
                                        <input type="text" name="" id="search" class="form-control">
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive table-card mt-3 mb-1 mx-3">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="sort" data-sort="number">
                                                NO
                                            </th>
                                            <th>
                                                Nama
                                            </th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                RFID
                                            </th>
                                            <th>
                                                Sekolah
                                            </th>
                                            <th>
                                                Saldo
                                            </th>
                                            <th>
                                                Tanggal
                                            </th>
                                            <th class="text-center">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        <tr>
                                            <td>1</td>
                                            <td>FARAH AMALIA</td>
                                            <td>farahamalia328@gmail.com</td>
                                            <td>536F4AK</td>
                                            <td>SMKN 1 KEPANJEN</td>
                                            <td>Rp. 50,000</td>
                                            <td>19 Maret 2024</td>
                                            <td class="text-center">
                                                <button class="btn btn-danger shadow-none">Tolak</button>
                                                <button class="btn btn-success shadow-none">Terima</button>
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
