@extends('Hummatask.layouts.app')
@section('style')
<link type="text/css" href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
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

.select2-container--default .select2-selection--multiple .select2-selection__rendered li {
    color: black;
}
</style>
@endsection

@section('sidebar')
@include('Hummatask.layouts.sidebar-detail-presentation')
@endsection

@section('content')
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="editModalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Presentation</h5>
                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <form action="{{ route('presentation-detail.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $presentation->id }}">
                <div class="modal-body">
                    <div class="mt-n2 mx-sm-0 mx-auto flex-shrink-0">
                        <div class="mx-3">
                            <label class="mb-2 mt-1" for="">Nama Project</label>
                            <input class="form-control" name="project_name" type="text"
                                value="{{ old('project_name') ?? $presentation->project_name }}"
                                placeholder="Masukkan Project">
                            @error('project_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label class="mb-2 mt-4" for="">Deskripsi</label>
                            <textarea class="form-control" name="description" rows="3"
                                placeholder="Masukkan deskripsi tema anda">{{ old('description') ?? $presentation->description }}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label class="mb-2 mt-4" for="">Link repository
                                (opsional)</label>
                            <input class="form-control" name="link" type="text"
                                value="{{ old('link') ?? $presentation->link }}"
                                placeholder="Masukkan link repositori projek">
                            @error('link')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="row row-cols-2 mt-2">
                                <div id="startDate">
                                    <label class="mb-2 mt-1" for="">Tanggal
                                        Mulai</label>
                                    <input class="form-control" name="start_date" type="date"
                                        value="{{ old('start_date') ?? $presentation->start_date }}">
                                    @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div id="endDate">
                                    <label class="mb-2 mt-1" for="">Tanggal
                                        Selesai</label>
                                    <input class="form-control" name="end_date" type="date"
                                        value="{{ old('end_date') ?? $presentation->end_date }}">
                                    @error('end_date')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <label class="mb-2 mt-1" for="">Tanggal
                                Presentasi</label>
                            <input class="form-control" name="planning_date_presentation" type="date"
                                value="{{ old('planning_date_presentation') ?? $presentation->planning_date_presentation }}">
                            @error('planning_date_presentation')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label class="mb-2 mt-4" for="">Kategori Project</label>
                            <select class="form-control" id="selectProject" name="type_project"
                                onchange="changeProject(this)">
                                @foreach ($categoryProject as $category)
                                <option value="{{ $category->name }}"
                                    {{ $presentation->type_project == $category->name ? 'selected' : '' }}>
                                    {{ ucwords($category->name) }}</option>
                                @endforeach
                            </select>
                            @error('type_project')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div id="memberSection">
                                <label class="d-block mb-2 mt-4" for="">Anggota
                                    Tim</label>
                                <select class="js-example-basic-multiple d-block w-100 text-gray-900" id="selectMembers"
                                    name="members[]" style="width: 100%;" multiple>
                                    @foreach ($studentsData as $id => $student)
                                    <option value="{{ $id }}"
                                        {{ in_array($id, $presentation->members->pluck('member_id')->toArray()) ? 'selected' : '' }}>
                                        {{ $student }}
                                        {{ $id }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('members')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label class="mb-2 mt-4" for="">Leader</label>
                            <input class="form-control" name="leader_id" type="text" value="{{ auth()->user()->name }}"
                                placeholder="Leader" disabled>
                            @error('leader_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light-danger text-danger" data-bs-dismiss="modal" type="button">Tutup
                    </button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card bg-label-primary" style="border:1px solid rgba(0,0,0,.03);">
            <div class="card-content">
                <div class="card-body d-flex justify-content-center align-items-center text-center">
                    <h5 class="text-primary m-0 p-0" style="font-weight: bold;font-size:2rem;">
                        {{ $presentation->project_name }}
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-7">
        <div class="card" style="border:1px solid rgba(0,0,0,.03);">
            <div class="card-content">
                <div class="card-body d-flex justify-content-between align-items-center m-0 p-3">
                    <h5 class="m-0 p-0">
                        Anggota</h5>
                    {{-- {{ dd($presentation->status_presentation->value) }} --}}
                    <div class="action d-flex">
                        <button class="btn btn-warning m-0 px-2 py-1 text-center" data-bs-toggle="modal"
                            data-bs-target="#editModal" type="button">
                            Edit
                        </button>
                        <form class="ms-2 p-0" action="{{ route('presentations.destroy', $presentation->id) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger m-0 px-2 py-1 text-center" type="submit">
                                hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="search-table text-nowrap table align-middle">
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
        <div class="card" style="border:1px solid rgba(0,0,0,.03);">
            <div class="card-content">
                <div class="card-body d-flex justify-content-start align-items-center m-0 p-3 text-center">
                    <h5 class="m-0 p-0">
                        Informasi Project</h5>
                </div>
            </div>
        </div>
        <div class="card" style="border:1px solid rgba(0,0,0,.03);">
            <div class="card-content">
                <div class="card-body d-flex flex-column align-items-start justify-content-start">
                    <div class="d-flex mt-2">
                        @if ($presentation->status_presentation->value === 'waiting')
                        <span class="text-warning"
                            style="border-radius:25px;">{{ $presentation->status_presentation->value === 'waiting' ? 'menunggu persetujuan' : '' }}</span>
                        @elseif($presentation->status_presentation->value === 'rejected')
                        <span class="text-danger"
                            style="border-radius:25px;">{{ $presentation->status_presentation->value === 'rejected' ? 'ditolak' : '' }}</span>
                        @elseif($presentation->status_presentation->value === 'ongoing')
                        <h5 class="">Status</h5>
                        <span class="badge bg-label-info me-2 px-3 py-2"
                            style="border-radius:25px;">{{ $presentation->status_presentation->value === 'ongoing' ? 'Sedang dikerjakan' : '' }}</span>
                        <span class="badge bg-label-warning px-3 py-2"
                            style="border-radius:25px;">{{ $formattedDate = Carbon::parse($presentation->planning_date_presentation)->translatedFormat('j F Y') }}</span>
                        @else
                        <span class="text-succes"
                            style="border-radius:25px;">{{ $presentation->status_presentation->value === 'accepted' ? 'disetujui' : '' }}</span>
                        @endif
                    </div>
                    <h5 class="my-3">Kategori Project</h5>
                    <input class="form-control" type="text" value="{{ $presentation->type_project }}"
                        style="pointer-events: none" readonly>
                    <h5 class="my-3">Tema</h5>
                    <input class="form-control" type="text"
                        value="{{ $presentation->theme ? $presentation->theme : 'tema anda' }}"
                        style="pointer-events: none" readonly>
                    <h5 class="my-3">Link Repository Github (Opsional)</h5>
                    <input class="form-control" type="text"
                        value="{{ $presentation->link ? $presentation->link : 'https://....' }}"
                        style="pointer-events: none" readonly>

                    @if ($presentation->status_presentation->value === 'waiting')
                    @elseif($presentation->status_presentation->value === 'rejected')
                    <h5 class="my-3">Alasan Ditolak</h5>
                    <textarea class="form-control" style="pointer-events: none;resize:none;" cols="20" rows="5" readonly
                        placeholder="{{ $presentation->reason ? $presentation->reason : 'Alasan ditolak...' }}"></textarea>
                    @elseif($presentation->status_presentation->value === 'ongoing')
                    <h5 class="my-3">Alasan Ditolak</h5>
                    <textarea class="form-control" style="pointer-events: none;resize:none;" cols="20" rows="5" readonly
                        placeholder="{{ $presentation->reason ? $presentation->reason : 'Alasan ditolak...' }}"></textarea>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="{{ asset('assets/libs/jquery/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/5.0.3/js/dataTables.fixedColumns.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/5.0.3/js/fixedColumns.dataTables.js"></script>
<script src="https://cdn.datatables.net/select/2.1.0/js/dataTables.select.js"></script>
<script src="https://cdn.datatables.net/select/2.1.0/js/select.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#selectMembers').select2({
        dropdownParent: $('#editModal')
    });
    if ($('#selectProject').val() !== 'solo project') {
        $('#memberSection').show();
    } else {
        $('#memberSection').hide()
        $('#selectMembers').prop('disabled', true)
    }
});

function changeProject(e) {
    if (e.value !== 'solo project') {
        $('#selectMembers').prop('disabled', false)
        $('#memberSection').show();
    } else {
        $('#selectMembers').prop('disabled', true)
        $('#memberSection').hide();
    }
}
</script>

{{--
<script>
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