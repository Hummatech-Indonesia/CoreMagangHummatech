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
                        <td >
                            @if ($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::FINISH->value)
                            <small class="p-2 rounded-2 text-success fw-bolder"
                                style="background: rgba(19,222,185,.2)">Selesai</small>
                        @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::WAITING->value)
                            <small class="p-2 rounded-2 text-primary fw-bolder"
                                style="background: rgba(93,135,255,.2)">Menunggu</small>
                        @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::PENNDING->value)
                            <small class="p-2 rounded-2 text-warning fw-bolder"
                                style="background: rgba(255,174,31,.2)">Pending</small>
                        @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::NOTFINISH->value)
                            <small class="p-2 rounded-2 text-danger fw-bolder"
                                style="background: rgb(250,137,107,.2)">Ditolak</small>
                        @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::ONGOING->value)
                            <small class="p-2 rounded-2 text-warning fw-bolder"
                                style="background: rgba(255,174,31,.2)">Dalam Antrian</small>
                        @endif
                        </td>
                        <td class="d-flex gap-1">
                            <a href="" class="btn btn-primary btn-sm">Detail</a>
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
