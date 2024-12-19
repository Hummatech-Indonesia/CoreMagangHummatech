<div class="tab-pane" id="request" role="tabpanel">
    <div class="card card-body">
        <div class="table-responsive">
            <table id="dataTablePresentasion2" class="table stripe row-border order-column nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Project</th>
                        <th>Divisi</th>
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
                            <td>{{ $waiting->project->division->name }}</td>
                            <td>
                                <span
                                    class="text-warning">{{ \Carbon\Carbon::parse($waiting->date_time_presentation)->format('h:i A') }}</span>
                            </td>
                            <td>
                                <span
                                    class="text-warning">{{ \Carbon\Carbon::parse($waiting->date_time_presentation)->format('j F Y') }}</span>
                            </td>
                            <td>{{ ucwords($waiting->project->type_project->value) }}</td>
                            <td>
                                @if($waiting->status_presentation->value == \App\Enum\StatusPresentationEnum::WAITING->value)
                                     <small class="p-2 px-3 rounded-pill text-warning bg-light-warning fw-bolder">Menunggu</small>
                                @elseif($waiting->status_presentation->value == \App\Enum\StatusPresentationEnum::PENNDING->value)
                                    <small class="p-2 px-3 rounded-pill text-warning bg-light-warning fw-bolder">Pending</small>
                                @else
                                    <small>-</small>
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
                                </button>
                            </td>
                        </tr>

                        {{-- Modal Accept --}}
                        <div class="modal fade" id="accPresentation{{ $waiting->id }}" tabindex="-1"
                            aria-labelledby="completeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('presentation.changeStatus') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header d-flex align-items-center">
                                            <h5 class="modal-title" id="completeModalLabel">Ajukan Presentasi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="link" class="form-label">Link Zoom</label>
                                            <input type="text" name="link_online_presentation" id="link"
                                                class="form-control @error ('is-invalid') @enderror" placeholder="Masukkan Link Zoom" autofocus>

                                            <input type="hidden" name="presentation_id" value="{{ $waiting->id }}">
                                            <input type="hidden" name="status_presentation"
                                                value="{{ \App\Enum\StatusPresentationEnum::ONGOING->value }}">
                                            <input type="hidden" name="planning_date_presentation"
                                                value="{{ $waiting->planning_date_presentation }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button class="btn btn-light-success text-success"
                                                type="submit">Terima</button>
                                        </div>
                                    </form>
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
                                            <input type="hidden" name="presentation_id"
                                                value="{{ $waiting->id }}">
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
