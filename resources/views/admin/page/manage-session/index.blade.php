@extends('admin.layouts.app')
<div hidden>
    @dump(session('success'))
    @dump(session('error'))
</div>
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-4">
                    <h3 class="mx-3 mb-0">Kelola Sesi</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row g-2 align-items-center">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <h3 class="mx-3 mb-0">Sesi 1</h3>
                            <form action="{{ route('change-session-student', ['session' => '2']) }}" method="get"
                                class="" style="width: fit-content">
                                @csrf
                                @method('GET')
                                <input type="hidden" id="selectedStudents" name="students[]" value="">
                                <button type="submit" id="btnSesi1" class="btn btn-primary" disabled>Ubah Ke Sesi
                                    2</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row g-2 align-items-center">
                        <div class="col-sm-12">
                            <table id="dataTableSession1" class="stripe row-border order-column nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama Lengkap</th>
                                        <th>Divisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studentSession1 as $student)
                                        <tr data-student-id="{{ $student->id }}">
                                            <td></td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->division ? $student->division->name : 'No Division' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row g-2 align-items-center">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <h3 class="mx-3 mb-0">Sesi 2</h3>
                            <form action="{{ route('change-session-student', ['session' => '1']) }}" method="get"
                                class="" style="width: fit-content">
                                @csrf
                                @method('GET')
                                <input type="hidden" id="selectedStudents2" name="students[]" value="">
                                <button type="submit" id="btnSesi2" class="btn btn-primary" disabled>Ubah Ke Sesi
                                    1</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row g-2 align-items-center">
                        <div class="col-sm-12">
                            <table id="dataTableSession2" class="stripe row-border order-column nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama Lengkap</th>
                                        <th>Divisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studentSession2 as $student)
                                    <tr data-student-id="{{ $student->id }}">
                                        <td></td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->division ? $student->division->name : 'No Division' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.components.delete-modal-component')
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.3/js/dataTables.fixedColumns.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.3/js/fixedColumns.dataTables.js"></script>
    <script src="https://cdn.datatables.net/select/2.1.0/js/dataTables.select.js"></script>
    <script src="https://cdn.datatables.net/select/2.1.0/js/select.dataTables.js"></script>
    <script>
        for (let i = 1; i < 3; i++) { // Use 'let' instead of 'var' for block scope
            const table = new DataTable('#dataTableSession' + i, {
                columnDefs: [{
                    orderable: false,
                    render: DataTable.render.select(),
                    targets: 0
                }],
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
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });


            //EVENT UBAH SESI
            table.on('select', function(event, dt, type, indexes) {
                var rowNode = table.row(indexes[0]).node();
                var studentId = $(rowNode).data('student-id');
                const selectedIds = [];

                table.rows({
                    selected: true
                }).every(function(rowIdx) {
                    var dataRow = this.node();
                    var id = $(dataRow).data('student-id');
                    selectedIds.push(id);
                }).toArray();

                document.getElementById('selectedStudents').value = selectedIds.join(',');
                document.getElementById('selectedStudents2').value = selectedIds.join(',');
                document.getElementById('btnSesi' + i).disabled = selectedIds.length === 0;
            });


            table.on('deselect', function() {
                const selectedIds = table.rows({
                    selected: true
                }).data().map(row => {
                    return $(row).closest('tr').data('student-id');
                }).toArray();
                document.getElementById('selectedStudents').value = selectedIds.join(',');
                if (selectedIds.length === 0) {
                    document.getElementById('btnSesi' + i).disabled =
                        true; // Disable button if nothing is selected
                }
            });
        }



        // CUSTOMISASI STYLE SEARCH DATATABLE
        const labels = document.querySelectorAll('label[for]');
        labels.forEach(label => {
            if (label.getAttribute('for') === 'dt-search-0') {
                label.style.display = 'none';
            }
        });
        const input1 = document.getElementById('dt-search-0');
        if (input1) {
            input1.placeholder = 'Cari Data...';
        }
        labels.forEach(label => {
            if (label.getAttribute('for') === 'dt-search-1') {
                label.style.display = 'none';
            }
        });
        const input2 = document.getElementById('dt-search-1');
        if (input2) {
            input2.placeholder = 'Cari Data...';
        }
    </script>
@endsection
