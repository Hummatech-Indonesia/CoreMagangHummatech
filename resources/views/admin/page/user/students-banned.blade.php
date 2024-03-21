@extends('admin.layouts.app')
@section('content')

<div class="col-sm-4 mt-2 mb-4">
    <h4 class="mx-3">Data Siswa Dibanned</h4>
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
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Masa Magang</th>
                                <th scope="col">Sekolah</th>
                                <th scope="col" class="text-center" style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>FARAH AMALIA</td>
                                <td>farah@gmail.com</td>
                                <td>Rekayasa Perangkat Lunak</td>
                                <td>11</td>
                                <td>19 Maret 2024 - 19 Desember 2024</td>
                                <td>SMKN 1 KEPANJEN</td>
                                <td class="text-center">
                                    <button class="btn btn-info shadow-none">Buka Banned</button>
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