@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-body d-flex justify-content-between">
        <ul class="nav nav-pills nav-custom nav-custom-light" style="width: fit-content" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#done" role="tab">
                    Tim
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#on" role="tab">
                    Siswa
                </a>
            </li>
        </ul>
        <div class="me-2 col-xl-2 d-flex align-items-center gap-2">
            <label for="" class="mt-2">Filter: </label>
            <select class="form-control" data-choices name="choices-single-default" id="choices-single-default">
                <option value="">Semua</option>
                <option value="">Solo</option>
                <option value="">Premini</option>
                <option value="">Mini</option>
            </select>
        </div>
    </div>
</div>

<div class="tab-content text-muted">
    <div class="tab-pane active" id="done" role="tabpanel">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div id="table-gridjs">
                            <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                            <div class="gridjs-wrapper" style="height: auto;">
                                <table role="grid" class="gridjs-table" style="height: auto;">
                                    <thead class="gridjs-thead">
                                        <tr class="gridjs-tr">
                                            <th data-column-id="name" class="gridjs-th" style="width: 50px;">
                                                <div class="gridjs-th-content">No</div>
                                            </th>
                                            <th data-column-id="name" class="gridjs-th" style="width: 150px;">
                                                <div class="gridjs-th-content">Divisi</div>
                                            </th>
                                            <th data-column-id="name" class="gridjs-th" style="width: 150px;">
                                                <div class="gridjs-th-content">Nama Tim</div>
                                            </th>
                                            <th data-column-id="name" class="gridjs-th" style="width: 150px;">
                                                <div class="gridjs-th-content">Kategori Projek</div>
                                            </th>
                                            <th data-column-id="name" class="gridjs-th" style="width: 150px;">
                                                <div class="gridjs-th-content">Bulan</div>
                                            </th>
                                            <th data-column-id="name" class="gridjs-th" style="width: 150px;">
                                                <div class="gridjs-th-content">Jumlah Presentasi</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    @php
                                        $teamPresentations = [];

                                        foreach ($presentations as $presentation) {
                                            $teamId = $presentation->hummataskTeam->id;

                                            if (!isset($teamPresentations[$teamId])) {
                                                $teamPresentations[$teamId] = [
                                                    'team' => $presentation->hummataskTeam,
                                                    'count' => 0,
                                                ];
                                            }

                                            $teamPresentations[$teamId]['count']++;
                                        }
                                    @endphp

                                    <tbody class="gridjs-tbody">
                                        @foreach ($teamPresentations as $teamPresentation)
                                            <tr class="gridjs-tr">
                                                <td data-column-id="name" class="gridjs-td">{{ $loop->iteration }}</td>
                                                <td data-column-id="name" class="gridjs-td">{{ $teamPresentation['team']->division->name }}</td>
                                                <td data-column-id="name" class="gridjs-td">{{ $teamPresentation['team']->name }}</td>
                                                <td data-column-id="name" class="gridjs-td">{{ $teamPresentation['team']->categoryProject->name }}</td>
                                                <td data-column-id="name" class="gridjs-td">{{ \Carbon\Carbon::parse($presentation->created_at)->translatedFormat('F') }}</td>
                                                <td data-column-id="name" class="gridjs-td">{{ $teamPresentation['count'] }}</td>
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
        </div>
    </div>
    <div class="tab-pane " id="on" role="tabpanel">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div id="table-gridjs">
                            <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                            <div class="gridjs-wrapper" style="height: auto;">
                                <table role="grid" class="gridjs-table" style="height: auto;">
                                    <thead class="gridjs-thead">
                                        <tr class="gridjs-tr">
                                            <th data-column-id="name" class="gridjs-th" style="width: 50px;">
                                                <div class="gridjs-th-content">No</div>
                                            </th>
                                            <th data-column-id="name" class="gridjs-th" style="width: 150px;">
                                                <div class="gridjs-th-content">Divisi</div>
                                            </th>
                                            <th data-column-id="name" class="gridjs-th" style="width: 150px;">
                                                <div class="gridjs-th-content">Nama Tim</div>
                                            </th>
                                            <th data-column-id="name" class="gridjs-th" style="width: 150px;">
                                                <div class="gridjs-th-content">Nama Siswa</div>
                                            </th>
                                            <th data-column-id="name" class="gridjs-th" style="width: 150px;">
                                                <div class="gridjs-th-content">Bulan</div>
                                            </th>
                                            <th data-column-id="name" class="gridjs-th" style="width: 150px;">
                                                <div class="gridjs-th-content">Jumlah Presentasi</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    @forelse ($studentsTeam as $studentPresentation)
                                        <tbody class="gridjs-tbody">
                                            <tr class="gridjs-tr">
                                                <td data-column-id="name" class="gridjs-td">{{ $loop->iteration }}</td>
                                                <td data-column-id="name" class="gridjs-td">{{ $studentPresentation['division_name'] }}</td>
                                                <td data-column-id="name" class="gridjs-td">{{ $studentPresentation['team_name'] }}</td>
                                                <td data-column-id="name" class="gridjs-td">{{ $studentPresentation['student_name'] }}</td>
                                                <td data-column-id="name" class="gridjs-td">{{ $studentPresentation['month'] }}</td>
                                                <td data-column-id="name" class="gridjs-td">{{ $studentPresentation['presentation_count'] }} kali</td>
                                            </tr>
                                        </tbody>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <div class="d-flex justify-content-center mt-3">
                                                    <img src="{{ asset('no data.png') }}" width="200px" alt="">
                                                </div>
                                                <h4 class="text-center mt-2 mb-4">Data Masih kosong</h4>
                                            </td>
                                        </tr>
                                    @endforelse
                                </table>

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
@section('script')

    <script>
        $(document).ready(function() {
            function toggleTableResponsive() {
                var screenWidth = $(window).width();
                var $table = $('#responsive-team');
                if (screenWidth <= 880) {
                $table.addClass('py-4');
                } else {
                $table.removeClass('py-4');
                }
            }

            toggleTableResponsive();

            $(window).resize(function() {
                toggleTableResponsive();
            });
        });
    </script>
@endsection
