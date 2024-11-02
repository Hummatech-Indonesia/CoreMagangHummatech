@extends('Hummatask.layouts.app')
@section('style')
    <style>
        .bg-label-primary {
            background-color: #eff3ff !important;
            color: #557be8 !important;
        }
    </style>
@endsection
@section('sidebar')
    @include('Hummatask.layouts.sidebar-detail-presentation')
@endsection
@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card bg-label-primary" style="border:1px solid rgba(0,0,0,.03);">
                <div class="card-content">
                    <div class="card-body d-flex justify-content-center align-items-center text-center">
                        <h5 class="text-primary p-0 m-0" style="font-weight: bold;font-size:2rem;">
                            {{ $presentation->project_name }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-12 col-lg-7">
            <div class="card " style="border:1px solid rgba(0,0,0,.03);">
                <div class="card-content ">
                    <div class="card-body d-flex justify-content-start align-items-center text-center p-3 m-0">
                        <h5 class=" p-0 m-0">
                            Anggota</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5">
            <div class="card " style="border:1px solid rgba(0,0,0,.03);">
                <div class="card-content ">
                    <div class="card-body d-flex justify-content-start align-items-center text-center p-3 m-0">
                        <h5 class=" p-0 m-0">
                            Informasi Project</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-7">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table search-table align-middle text-nowrap">
                                <thead class="header-item">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        {{-- <th>{{ dd($presentation->hummataskTeam) }}</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $index => $student)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $student->users->name }}</td>
                                            <td>{{ $student->status }}</td>
                                        </tr>
                                    @empty
                                        <tr colspan="999">
                                            <td>Tidak ada anggota</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5">
            <div class="card bg-label-primary" style="border:1px solid rgba(0,0,0,.03);">
                <div class="card-content">
                    <div class="card-body d-flex justify-content-center align-items-center text-center">
                        <h5 class="text-primary p-0 m-0" style="font-weight: bold;font-size:2rem;">
                            {{ $presentation->project_name }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.3/js/dataTables.fixedColumns.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.3/js/fixedColumns.dataTables.js"></script>
    <script src="https://cdn.datatables.net/select/2.1.0/js/dataTables.select.js"></script>
    <script src="https://cdn.datatables.net/select/2.1.0/js/select.dataTables.js"></script>
    {{-- <script>
        const table = new DataTable('#dataTableUsers', {
            // columnDefs: [{
            //     orderable: false,
            //     render: DataTable.render.select(),
            //     targets: 0
            // }],
            fixedColumns: {
                start: 2
            },
            order: [
                [1, 'asc']
            ],
            paging: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 300,
            // select: {
            //     style: 'multi',
            //     selector: 'td:first-child'
            // }
        });
    </script> --}}
@endsection
