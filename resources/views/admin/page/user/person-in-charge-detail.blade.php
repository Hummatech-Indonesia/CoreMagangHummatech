@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class=" align-items-center">
                <div class="col-lg-4 col-sm-4">
                    <h4 class="ms-2 mt-1">Data Penanggung Jawab</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-xl-4 col-lg-auto">
            <div class="card py-5">
                <div class="card-body p-4 text-center">
                    <div class="mx-auto avatar-lg mb-3">
                        <img src="{{ asset('assets/images/users/avatar-6.jpg') }}" alt="" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="card-title mb-1">Tonya Noble</h5>
                    <p class="text-muted mb-0 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12" viewBox="0 0 15 12" fill="none">
                            <path d="M12.8098 10.4798H14.0898V11.7598H0.00976562V10.4798H1.28977V0.879766C1.28977 0.701987 1.35199 0.550877 1.47643 0.426432C1.60088 0.301988 1.75199 0.239765 1.92977 0.239765H8.32977C8.50754 0.239765 8.65866 0.301988 8.7831 0.426432C8.90754 0.550877 8.96977 0.701987 8.96977 0.879766V10.4798H11.5298V5.35977H10.2498V4.07977H12.1698C12.3475 4.07977 12.4987 4.14199 12.6231 4.26643C12.7475 4.39088 12.8098 4.54199 12.8098 4.71977V10.4798ZM2.56977 1.51977V10.4798H7.68977V1.51977H2.56977ZM3.84977 5.35977H6.40977V6.63977H3.84977V5.35977ZM3.84977 2.79977H6.40977V4.07977H3.84977V2.79977Z" fill="#878A99"/>
                        </svg>
                        SMKN 1 TAMBAKBOYO
                    </p>
                    <p class="text-muted mb-1 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                            <path d="M1 2.66732C1 2.3137 1.14048 1.97456 1.39052 1.72451C1.64057 1.47446 1.97971 1.33398 2.33333 1.33398H11.6667C12.0203 1.33398 12.3594 1.47446 12.6095 1.72451C12.8595 1.97456 13 2.3137 13 2.66732M1 2.66732V9.33398C1 9.68761 1.14048 10.0267 1.39052 10.2768C1.64057 10.5268 1.97971 10.6673 2.33333 10.6673H11.6667C12.0203 10.6673 12.3594 10.5268 12.6095 10.2768C12.8595 10.0267 13 9.68761 13 9.33398V2.66732M1 2.66732L7 6.66732L13 2.66732" stroke="#878A99" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Tonya@gmail.com
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="py-2">Siswa</h5>
                    <div class="table-responsive">
                        <table class="align-middle table table-nowrap table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>
                                        NO.
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Jurusan
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Alamat
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>FARAH AMALIA</td>
                                    <td>Rekayasa perangkat lunak</td>
                                    <td>farah@gmail.com</td>
                                    <td>Gondanglegi, malang</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
