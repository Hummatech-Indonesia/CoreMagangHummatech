<div class="tab-pane {{ request()->hasAny(['status', 'date', 'page', 'search']) ? '' : 'active' }}" id="ongoing"
    role="tabpanel">
    <div class="card card-body">
        <div class="table-responsive">
            <table id="dataTablePresentasion2" class="table stripe row-border order-column nowrap">
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
                    @forelse ($ongoings as $ongoing)
                        <tr data-student-id="{{ $ongoing->id }}">
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $ongoing->project->project_name }}</td>
                            <td>
                                <span
                                    class="text-warning">{{ \Carbon\Carbon::parse($ongoing->date_time_presentation)->format('h:i A') }}</span>
                            </td>
                            <td>
                                <span
                                    class="text-warning">{{ \Carbon\Carbon::parse($ongoing->date_time_presentation)->format('j F Y') }}</span>
                            </td>
                            <td>{{ ucwords($ongoing->project->type_project->value) }}</td>
                            <td>
                                @if ($ongoing->status_presentation->value == \App\Enum\StatusPresentationEnum::FINISH->value)
                                    <small class="p-2 rounded-2 text-success fw-bolder"
                                        style="background: rgba(19,222,185,.2)">Selesai</small>
                                @elseif($ongoing->status_presentation->value == \App\Enum\StatusPresentationEnum::WAITING->value)
                                    <small class="p-2 rounded-2 text-primary fw-bolder"
                                        style="background: rgba(93,135,255,.2)">Menunggu</small>
                                @elseif($ongoing->status_presentation->value == \App\Enum\StatusPresentationEnum::PENNDING->value)
                                    <small class="p-2 rounded-2 text-warning fw-bolder"
                                        style="background: rgba(255,174,31,.2)">Pending</small>
                                @elseif($ongoing->status_presentation->value == \App\Enum\StatusPresentationEnum::NOTFINISH->value)
                                    <small class="p-2 rounded-2 text-danger fw-bolder"
                                        style="background: rgb(250,137,107,.2)">Ditolak</small>
                                @elseif($ongoing->status_presentation->value == \App\Enum\StatusPresentationEnum::ONGOING->value)
                                    <small class="p-2 rounded-2 text-warning fw-bolder"
                                        style="background: rgba(255,174,31,.2)">Dalam Antrian</small>
                                @endif
                            </td>
                            <td class="d-flex gap-2">
                                <a href="/mentor/project-submissions/{{ $ongoing->project->id }}/revision" class="btn btn-primary">Detail</a>

                                <button href="{{ $ongoing->link_online_presentation }}" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#link-modal-{{ $ongoing->id }}">
                                    Luncurkan Zoom
                                    <i class="ti ti-brand-telegram fill-white fs-5"></i>
                                </button>
                            </td>
                        </tr>

                        {{-- launc zoom modal --}}
                        <div class="modal fade" id="link-modal-{{ $ongoing->id }}" tabindex="-1"
                            aria-labelledby="deleteLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('presentation.changeStatus') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header text-dark">
                                            Antrian Presentasi Online
                                        </div>
                                        <div class="modal-body">
                                            @if ($ongoing->link_online_presentation == '-')
                                                <textarea name="" id="" class="form-control bg-white" cols="30" rows="2" disabled></textarea>
                                                <div class=" mt-2">
                                                    <a href="#"
                                                        class="btn btn-light-info text-info btn-sm disabled w-100">Zoom
                                                        Belum Tersedia</a>
                                                </div>
                                            @else
                                                <label for="link" class="form-label">Link Zoom</label>
                                                <textarea name="link_online_presentation" id="link" class="form-control" autofocus>{{ $ongoing->link_online_presentation }}</textarea>

                                                <input type="hidden" name="presentation_id"
                                                    value="{{ $ongoing->id }}">
                                                <input type="hidden" name="status_presentation"
                                                    value="{{ \App\Enum\StatusPresentationEnum::ONGOING->value }}">
                                                <input type="hidden" name="planning_date_presentation"
                                                    value="{{ $ongoing->planning_date_presentation }}">
                                            @endif

                                        </div>
                                        <div class="modal-footer">
                                            @if ($ongoing->link_online_presentation != '')
                                                <a href="{{ $ongoing->link_online_presentation }}"
                                                    class="btn btn-info">
                                                    Masuk ke Zoom
                                                </a>
                                            @endif
                                            <button type="button"
                                                class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button class="btn btn-light-success text-success"
                                                type="submit">Simpan</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

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
