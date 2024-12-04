<div class="tab-pane active" id="antrian" role="tabpanel">
    <div class="card card-body">
        <div class="table-responsive">
            <table id="dataTablePresentasion1" class="table stripe row-border order-column nowrap"
                style="width:100%">
                <thead>
                    <tr>
                        <th>No Urutan</th>
                        <th>Nama Project</th>
                        <th>Deskripsi</th>
                        {{--                                <th>Tanggal Mulai</th> --}}
                        {{--                                <th>Batas Waktu</th> --}}
                        <th>Tipe Project</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ongoings as $ongoing)
                        <tr data-student-id="{{ $ongoing->id }}">
                            <td>{{ $ongoing->urutan }}</td>
                            <td>{{ $ongoing->project->project_name }}</td>
                            <td>{{ $ongoing->project->description }}</td>
                            {{--                                    <td>{{ $ongoing->start_date }}</td> --}}
                            {{--                                    <td>{{ $ongoing->end_date }}</td> --}}
                            <td>{{ ucwords($ongoing->project->type_project->value) }}</td>
                            <td class="d-flex gap-1">
                                <button class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#accProjectOngoing{{ $ongoing->id }}" type="button">
                                    <i class="fa fa-check"></i>
                                </button>
                                <button class="btn btn-warning"
                                    onclick="showModalPending({{ $ongoing->id }})">
                                    <i class="fa fa-clock"></i>
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="accProjectOngoing{{ $ongoing->id }}" tabindex="-1"
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
                                        <form
                                            action="{{ route('presentation.presentationDone', $ongoing->id) }}"
                                            method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="project_id"
                                                value="{{ $ongoing->project_id }}">
                                            <button class="btn btn-light-success text-success"
                                                type="submit">Ya, presentasi selesai!</button>
                                        </form>
                                    </div>
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
