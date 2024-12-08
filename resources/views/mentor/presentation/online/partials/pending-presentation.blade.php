<div class="tab-pane {{ request()->hasAny(['status', 'date', 'page']) ? '' : 'active'}}" id="request" role="tabpanel">
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
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($waitings as $waiting)
                        <tr data-student-id="{{ $waiting->id }}">
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $waiting->project->project_name }}</td>
                            <td>
                                <span class="text-warning">{{ \Carbon\Carbon::parse($presentation->date_time_presentation)->format('h:i A') }}</span>
                            </td>
                            <td>
                                <span class="text-warning">{{ \Carbon\Carbon::parse($presentation->date_time_presentation)->format('j F Y') }}</span>
                            </td>
                            <td>{{ ucwords($waiting->project->type_project->value) }}</td>
                            <td>
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

                                <button class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#accPresentation{{ $waiting->id }}" type="button"><i
                                        class="fa fa-check"></i>
                                </button>

                                <button class="btn btn-warning" onclick="showModalPending({{ $waiting->id }})">
                                    <i class="fa fa-clock"></i>
                                </button>


                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#rejectPresentation{{ $waiting->id }}" type="button">
                                    <i class="fa fa-times"></i>
                                </button
                            </td>
                        </tr>

                        {{-- Modal Accept --}}
                        <div class="modal fade" id="accPresentation{{ $waiting->id }}" tabindex="-1"
                            aria-labelledby="completeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header d-flex align-items-center">
                                        <h5 class="modal-title" id="completeModalLabel">Konfirmasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda yakin?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                                            data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('presentation.changeStatus') }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="presentation_id" value="{{ $waiting->id }}">
                                            <input type="hidden" name="status_presentation"
                                                value="{{ \App\Enum\StatusPresentationEnum::ONGOING->value }}">
                                            <input type="hidden" name="planning_date_presentation"
                                                value="{{ $waiting->planning_date_presentation }}">
                                            <button class="btn btn-light-success text-success" type="submit">Ya, Terima
                                                Presentasi!</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal reject -->
                        <div class="modal fade" id="rejectPresentation{{ $waiting->id }}" tabindex="-1"
                            aria-labelledby="rejectModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header d-flex align-items-center">
                                        <h5 class="modal-title" id="completeModalLabel">Konfirmasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('presentation.changeStatus') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <p>Apakah anda yakin untuk menolak presentasi ini? Jika Iya maka sertakan
                                                alasannya!</p>
                                            <div class="d-flex">
                                                <label for="reason" class="form-label">Masukkan Alasan</label>
                                            </div>
                                            <textarea name="reason" class="form-control" id="reason" cols="10" rows="5"></textarea>

                                        </div>
                                        <div class="modal-footer">
                                            @method('PUT')
                                            <input type="hidden" name="presentation_id" value="{{ $waiting->id }}">
                                            <input type="hidden" name="status_presentation"
                                                value="{{ \App\Enum\StatusPresentationEnum::NOTFINISH->value }}">
                                            <input type="hidden" name="planning_date_presentation"
                                                value="{{ $waiting->planning_date_presentation }}">
                                            <button type="button"
                                                class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button class="btn btn-light-danger text-danger" type="submit">Ya,
                                                presentasi ditolak!</button>
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
</div>
