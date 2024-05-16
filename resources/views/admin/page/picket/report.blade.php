@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-4">
                    <h4 class="mx-3">Laporan Piket</h4>
                </div>
            </div>
        </div>
    </div>



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
                                    <tr align="center">
                                        <th class="sort" data-sort="number">
                                            NO
                                        </th>
                                        <th class="sort" data-sort="name">
                                            Nama
                                        </th>
                                        <th class="sort" data-sort="date">
                                            Waktu
                                        </th>
                                        <th class="sort" data-sort="date">
                                            Bukti
                                        </th>
                                        <th class="sort" data-sort="description">
                                            Deskripsi
                                        </th>
                                        <th class="sort" data-sort="status">
                                            Status
                                        </th>
                                        <th class="sort" data-sort="action">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @forelse ($picketingReport as $index=>$picketingReport)
                                        <tr align="center">
                                            <td class="number">1</td>
                                            <td class="name">VLZ1400087402</td>
                                            <td>Post launch reminder/ post list</td>
                                            <td>
                                                <img src="assets/images/galaxy/img-1.png" alt="My Image"
                                                    style="max-width: 150px; max-height:150px;">
                                            </td>
                                            <td>Lorem ipsum dolor sit amet consectetur.....</td>
                                            <td class="status">
                                                <h5><span class="badge bg-success-subtle text-success text-uppercase">Di
                                                        Terima</span>
                                                </h5>
                                            </td>
                                            <td>
                                                <div class="view">
                                                    <button class="btn btn-soft-primary  edit-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#showModal">
                                                        <i class=" ri-eye-line"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <div class="d-flex justify-content-center mb-2 mt-5">
                                                    <img src="{{ asset('no data.png') }}" alt="" width="300px"
                                                        srcset="">
                                                </div>
                                                <p class="fs-5 text-dark text-center">
                                                    Data Masih Kosong
                                                </p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">Detail Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <h6 style="color: black;">Hari :</h6>
                        <p id="modalName">Jumat</p>
                    </div>
                    <div>
                        <h6 style="color: black;">Waktu :</h6>
                        <p id="modalName">Sore</p>
                    </div>
                    <div>
                        <h6 style="color: black;">Bukti :</h6>
                        <p id="modalName">
                            <img src="assets/images/galaxy/img-1.png" alt="My Image" style="width: 100%; height: auto;">
                        </p>
                    </div>
                    <div>
                        <h6 style="color: black;">Deskripsi :</h6>
                        <p id="modalName">
                            Lorem ipsum dolor sit amet consectetur. Viverra ornare ullamcorper mattis amet pretium. Morbi ac
                            ipsum tellus dignissim sapien. Diam at enim semper pharetra ac libero a neque sit. Sit tristique
                            fermentum ullamcorper leo mattis quis. Nisl eget viverra id imperdiet pharetra. Elit in pulvinar
                            adipiscing diam adipiscing. Senectus cum in amet a congue. Amet etiam vitae fringilla adipiscing
                            sit et lorem. Urna mi sed ac commodo. Ornare nulla sit sit porta. Varius commodo tortor odio
                            aliquam consectetur.
                        </p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
