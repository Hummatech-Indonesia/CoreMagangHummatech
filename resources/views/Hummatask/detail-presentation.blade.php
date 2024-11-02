@extends('Hummatask.layouts.app')
@section('style')
    <style>
        .bg-label-primary {
            background-color: #eff3ff !important;
            color: #557be8 !important;
        }

        .bg-label-info {
            background-color: #d9ebff !important;
            color: #0da8ff !important;
        }

        .bg-label-warning {
            background-color: #fef5e5 !important;
            color: #ffaa05 !important;
        }

        .bg-label-danger {
            background-color: #fbf2ef !important;
            color: #e12d5b !important;
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
                    <div class="card-body d-flex justify-content-between align-items-center text-center p-3 m-0">
                        <h5 class=" p-0 m-0">
                            Anggota</h5>
                        <form action="" method="post" class="ms-auto p-0">
                            {{-- {{ dd($presentation->status_presentation->value) }} --}}
                            <button type="submit" class="btn btn-warning m-0 px-2 py-1 text-center">
                                Edit
                            </button>
                        </form>
                        <form action="" method="post" class="ms-2 p-0">
                            {{-- {{ dd($presentation->status_presentation->value) }} --}}
                            <button type="submit" class="btn btn-danger m-0 px-2 py-1 text-center">
                                hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
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
                                            <td>{{ $student->students->name }}</td>
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
            <div class="card " style="border:1px solid rgba(0,0,0,.03);">
                <div class="card-content ">
                    <div class="card-body d-flex justify-content-start align-items-center text-center p-3 m-0">
                        <h5 class=" p-0 m-0">
                            Informasi Project</h5>
                    </div>
                </div>
            </div>
            <div class="card" style="border:1px solid rgba(0,0,0,.03);">
                <div class="card-content">
                    <div class="card-body d-flex flex-column align-items-start justify-content-start">
                        <div class="d-flex mt-2">
                            @if ($presentation->status_presentation->value === 'waiting')
                                <span style="border-radius:25px;"
                                    class="text-warning">{{ $presentation->status_presentation->value === 'waiting' ? 'menunggu persetujuan' : '' }}</span>
                            @elseif($presentation->status_presentation->value === 'rejected')
                                <span style="border-radius:25px;"
                                    class="text-danger">{{ $presentation->status_presentation->value === 'rejected' ? 'ditolak' : '' }}</span>
                            @elseif($presentation->status_presentation->value === 'ongoing')
                                <h5 class="">Status</h5>
                                <span style="border-radius:25px;"
                                    class="badge px-3 py-2 bg-label-info me-2">{{ $presentation->status_presentation->value === 'ongoing' ? 'Sedang dikerjakan' : '' }}</span>
                                <span style="border-radius:25px;"
                                    class="badge px-3 py-2 bg-label-warning">{{ $formattedDate = Carbon::parse($presentation->planning_date_presentation)->translatedFormat('j F Y') }}</span>
                            @else
                                <span style="border-radius:25px;"
                                    class="text-succes">{{ $presentation->status_presentation->value === 'accepted' ? 'disetujui' : '' }}</span>
                            @endif
                        </div>
                        <h5 class="my-3">Kategori Project</h5>
                        <input type="text" class="form-control" readonly style="pointer-events: none"
                            value="{{ $presentation->type_project }}">
                        <h5 class="my-3">Tema</h5>
                        <input type="text" class="form-control" readonly style="pointer-events: none"
                            value="{{ $presentation->theme ? $presentation->theme : 'tema anda' }}">
                        <h5 class="my-3">Link Repository Github (Opsional)</h5>
                        <input type="text" class="form-control" readonly style="pointer-events: none"
                            value="{{ $presentation->link ? $presentation->link : 'https://....' }}">

                        @if ($presentation->status_presentation->value === 'waiting')
                        @elseif($presentation->status_presentation->value === 'rejected')
                            <h5 class="my-3">Alasan Ditolak</h5>
                            <textarea class="form-control" cols="20" rows="5" style="pointer-events: none;resize:none;" readonly
                                placeholder="{{ $presentation->reason ? $presentation->reason : 'Alasan ditolak...' }}"></textarea>
                        @elseif($presentation->status_presentation->value === 'ongoing')
                            <h5 class="my-3">Alasan Ditolak</h5>
                            <textarea class="form-control" cols="20" rows="5" style="pointer-events: none;resize:none;" readonly
                                placeholder="{{ $presentation->reason ? $presentation->reason : 'Alasan ditolak...' }}"></textarea>
                        @endif

                    </div>
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
