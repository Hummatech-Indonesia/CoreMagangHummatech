@extends('admin.layouts.app')
@section('content')

<div class="col-sm-4 mt-2 mb-5">
    <h4 class="mx-3">Approval Top Up</h4>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3 d-flex justify-content-between">
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
                <div class="table-responsive">
                    <table class="align-middle table table-nowrap table-bordered table-striped" style="width:100%">
                        <thead>
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
                        <tbody>
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
            </div>
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
@endsection
