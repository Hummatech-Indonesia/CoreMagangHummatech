<div class="tab-pane {{ request()->hasAny(['status', 'date', 'page', 'search']) ? 'active' : '' }}" id="done" role="tabpanel">
    <div class="card card-body">
        <div class="table-responsive">
            <table id="dataTablePresentasion2" class="table stripe row-border order-column nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Project</th>
                        <th>Jam</th>
                        <th>Tanggal</th>
                        <th>Tipe Project</th>
                        <th>Status </th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($presentations as $presentation)
                    <tr data-student-id="{{ $presentation->id }}">
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $presentation->project->project_name }}</td>
                        <td>
                            <span class="text-warning">{{ \Carbon\Carbon::parse($presentation->date_time_presentation)->format('h:i A') }}</span>
                        </td>
                        <td>
                            <span class="text-warning">{{ \Carbon\Carbon::parse($presentation->date_time_presentation)->format('j F Y') }}</span>
                        </td>
                        <td>{{ ucwords($presentation->project->type_project->value) }}</td>
                        <td>
                            @if ($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::FINISH->value)
                                <small class="p-2 px-3 rounded-pill text-success bg-light-success fw-bolder">Selesai</small>
                            @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::WAITING->value)
                                <small class="p-2 px-3 rounded-pill text-warning bg-light-warning fw-bolder">Menunggu</small>
                            @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::PENNDING->value)
                                <small class="p-2 px-3 rounded-pill text-warning bg-light-warning fw-bolder">Pending</small>
                            @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::NOTFINISH->value)
                                <small class="p-2 px-3 rounded-pill text-danger bg-light-danger fw-bolder">Ditolak</small>
                            @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::ONGOING->value)
                                <small class="p-2 px-3 rounded-pill text-info bg-light-info fw-bolder">Dalam Antrian</small>
                            @endif
                        </td>
                        
                        <td class="d-flex gap-1">
                            <a href="/mentor/project-submissions/{{ $presentation->project->id }}/revision" class="btn btn-primary">Detail</a>
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
