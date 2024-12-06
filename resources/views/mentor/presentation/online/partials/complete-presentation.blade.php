<div class="tab-pane {{ request()->hasAny(['status', 'date', 'page', 'search']) ? 'active' : '' }}" id="done" role="tabpanel">
    <div class="card card-body">
        <div class="table-responsive">
            <table id="dataTablePresentasion2" class="table stripe row-border order-column nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Project</th>
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
                            <td>
                                {{ \App\Models\Student::find(collect($presentation->project->members)->where('status', \App\Enum\StatusMemberTeamEnum::Leader->value)->first()->member_id)->name }}
                            </td>
                            <td>{{ $presentation->project->description }}</td>
                            <td>{{ $presentation->planning_date_presentation }}</td>
                            <td>{{ ucwords($presentation->project->type_project->value) }}</td>
                            <td>
                                @if ($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::FINISH->value)
                                    <small class="p-2 rounded-pill text-success fw-bolder"
                                        style="background: rgba(19,222,185,.2)">Selesai</small>
                                @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::WAITING->value)
                                    <small class="p-2 rounded-pill text-primary fw-bolder"
                                        style="background: rgba(93,135,255,.2)">Menunggu</small>
                                @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::PENNDING->value)
                                    <small class="p-2 rounded-pill text-warning fw-bolder"
                                        style="background: rgba(255,174,31,.2)">Pending</small>
                                @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::NOTFINISH->value)
                                    <small class="p-2 rounded-pill text-danger fw-bolder"
                                        style="background: rgb(250,137,107,.2)">Ditolak</small>
                                @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::ONGOING->value)
                                    <small class="p-2 rounded-pill text-warning fw-bolder"
                                        style="background: rgba(255,174,31,.2)">Dalam Antrian</small>
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
