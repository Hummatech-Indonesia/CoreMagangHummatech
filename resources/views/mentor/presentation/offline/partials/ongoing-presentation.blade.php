<div class="tab-pane {{ request()->hasAny(['status', 'date', 'page']) ? '' : 'active' }}" id="antrian" role="tabpanel">
    <div class="card card-body">
        <div class="table-responsive">
            <table id="dataTablePresentasion1" class="table stripe row-border order-column nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>No Urutan</th>
                    <th>Nama Project</th>
                    <th>Tanggal Mulai</th>
                    <th>Tipe Project</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($ongoings as $ongoing)
                    <tr data-student-id="{{ $ongoing->id }}">
                        <td>{{ $ongoing->urutan }}</td>
                        <td>{{ $ongoing->project->project_name }}</td>
                        <td>
                            <span
                                class="text-warning">{{ \Carbon\Carbon::parse($ongoing->planning_date_presentation)->format('j F Y') }}</span>
                        </td>
                        <td>{{ ucwords($ongoing->project->type_project->value) }}</td>
                        <td>
                            @if ($ongoing->status_presentation->value == \App\Enum\StatusPresentationEnum::ONGOING->value)
                                <small class="p-2 rounded-pill text-primary bg-light-primary fw-bolder">Dalam
                                    Antrian</small>
                            @endif
                        </td>
                        <td class="d-flex gap-1">
                            <!-- Dropdown untuk Selesai -->
                            <div class="btn btn-success" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-check"></i> Selesai
                            </div>
                            <!-- Dropdown menu -->
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#accProjectOngoing{{ $ongoing->id }}">
                                        Selesai Project
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#accPresentationOngoing{{ $ongoing->id }}">
                                        Selesai Presentasi
                                    </a>
                                </li>
                            </ul>

                            <!-- Tombol Pending -->
                            <button class="btn btn-warning" onclick="showModalPending({{ $ongoing->id }})">
                                <i class="fa fa-clock"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Modal untuk menyelesaikan Project -->
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
                                    <p>Apakah anda yakin ingin menyelesaikan project ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                            class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                                            data-bs-dismiss="modal">Batal
                                    </button>
                                    <form action="{{ route('presentation.presentationDone', $ongoing->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="project_id" value="{{ $ongoing->project_id }}">
                                        <input type="hidden" name="project_done" value="true">
                                        <button class="btn btn-light-success text-success" type="submit">Ya, project
                                            selesai!
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal untuk menyelesaikan Presentasi -->
                    <div class="modal fade" id="accPresentationOngoing{{ $ongoing->id }}" tabindex="-1"
                         aria-labelledby="completeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header d-flex align-items-center">
                                    <h5 class="modal-title" id="completeModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda yakin ingin menyelesaikan presentasi ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                            class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                                            data-bs-dismiss="modal">Batal
                                    </button>
                                    <form action="{{ route('presentation.presentationDone', $ongoing->id) }}"
                                          method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="project_id" value="{{ $ongoing->project_id }}">
                                        <button class="btn btn-light-success text-success" type="submit">Ya, presentasi
                                            selesai!
                                        </button>
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
                                     alt="No Data" height="120px"/>
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
