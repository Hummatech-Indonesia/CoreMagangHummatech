<div class="tab-pane {{ request()->hasAny(['status', 'date', 'page', 'search']) ? 'active' : '' }}" id="done" role="tabpanel">
    <div class="card card-body">
        <div class="table-responsive">
            <table id="dataTablePresentasion2" class="table stripe row-border order-column nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Project</th>
                        <th>Divisi</th>
                        <th>Nama Ketua</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Presentasi</th>
                        <th>Tipe Project</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($presentations as $presentation)
                        <tr data-student-id="{{ $presentation->id }}">
                            <td>{{ $loop->iteration }}. </td>
                            <td>{{ $presentation->project->project_name }}</td>
                            <td>{{ $presentation->project->division->name }}</td>
                            <td>
                                {{ \App\Models\Student::find(collect($presentation->project->members)->where('status', \App\Enum\StatusMemberTeamEnum::Leader->value)->first()->member_id)->name }}
                            </td>
                            <td>{{ $presentation->project->description }}</td>
                            <td><span class="text-warning">{{ \Carbon\Carbon::parse($presentation->planning_date_presentation)->format('j F Y') }}</span></td>
                            <td>{{ ucwords($presentation->project->type_project->value) }}</td>
                            <td>
                                @if ($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::FINISH->value)
                                    <small class="p-2 rounded-pill text-success bg-light-success fw-bolder">Selesai</small>
                                @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::WAITING->value)
                                    <small class="p-2 rounded-pill text-info bg-light-info fw-bolder">Menunggu</small>
                                @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::PENNDING->value)
                                    <small class="p-2 rounded-pill text-warning bg-light-warning fw-bolder">Ditunda</small>
                                @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::NOTFINISH->value)
                                    <small class="p-2 rounded-pill text-danger bg-light-warning fw-bolder">Ditolak</small>
                                @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::ONGOING->value)
                                    <small class="p-2 rounded-pill text-primary bg-light-primary fw-bolder">Dalam Antrian</small>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                <div class="col-md-12 text-center">
                                    <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}"
                                        alt="No Data" height="120px" />
                                    <h3 class="text-center">Data Masih Kosong</h3>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{ $presentations->links() }}
</div>
