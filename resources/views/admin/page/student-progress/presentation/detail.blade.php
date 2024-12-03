@extends('admin.layouts.app')
@section('style')
    <style>
        .btn-back {
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background-color: #dddcf8; /* Warna hover */
            transform: translateY(-2px);
        }

        .custom-card {
            box-shadow: 0 4px 8px rgba(223, 221, 221, 0.267);
            border: none;
        }
        .status-badge{
            border-radius:34px;
            font-size:12px;
            color: ;
            width: 145px;
            height: 30px;
            padding-top: 12px;
            padding-bottom: 0px;
            font-weight: 100;
        }
        .category-badge{
            background-color: rgba(93, 135, 255, 0.1);
            border-radius:34px;
            font-size:12px;
            color: rgba(93, 135, 255, 1);
            width: 145px;
            height: 30px;
            padding-top: 9px;
            font-weight: 100;
        }
    </style>
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <!-- Tombol Kembali -->
        <button class="btn btn-back py-3 px-3 me-3 d-flex align-items-center custom-card shadow-sm" style="background-color: rgba(234, 233, 255, 1); border-radius: 8px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="rgba(105, 94, 239, 1)">
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z"></path>
            </svg>
        </button>

        <!-- Header Judul -->
        <div class="flex-grow-1 text-center py-3 px-3 rounded fw-bold custom-card shadow-sm"
            style="background-color: rgba(234, 233, 255, 1); color: rgba(105, 94, 239, 1); border-radius: 8px; ">
            Detail Presentasi {{ $presentation_projects->project->project_name }}
        </div>
    </div>



    <div class="row">
        <div class="col-lg-8">
            <div class="d-flex flex-column h-50">
                <div class="card">
                    <div class="row align-items-end">
                        <div class="card-body mx-3 fw-semibold">
                            <span>Informasi Project</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="d-flex flex-column h-50">
                <div class="card">
                    <div class="row align-items-end">
                        <div class="card-body mx-3 fw-semibold">
                            <span>Anggota</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="d-flex flex-column h-100">
                <div class="card mb-4">
                    <div class="card-body">
                        <!-- Status -->
                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-label text-9xl">Status</label>
                                <div style="margin-left: 420px" class=" d-flex justify-content-end">
                                    <a href="/administrator/student-progress/presentation/{{ $presentation_projects->project->id }}/detail/revision">
                                        
                                      <span class="badge bg-light-primary category-badge rounded-2 px-3 py-2" style="background-color: rgba(230, 255, 250, 1)">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                             height="16" fill="rgba(93,135,255,1)">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path
                                                d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z">
                                            </path>
                                        </svg>
                                        Lihat Revisi
                                      </span>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <span class="badge text-success rounded-2 px-3 py-2 status-badge" style="background-color: rgba(230, 255, 250, 1)">{{ $presentation_projects->status_presentation}}</span>
                            {{-- @if ()
                                    <span class="badge text-success px-3 py-2" style="background-color: rgba(230, 255, 250, 1);">Selesai Presentasi</span>
                                @else
                                    <span class="badge text-danger px-3 py-2" style="background-color: rgba(251, 242, 239, 1);">Belum Presentasi</span>
                                @endif --}}
                            </div>
                           
                        </div>

                        <!-- Kategori Project -->
                        <div class="mb-3">
                            <label class="form-label">Kategori Project</label>
                            <div>
                                <span class="badge category-badge rounded-2">{{ $presentation_projects->project->type_project }}</span>
                            </div>
                        </div>

                        <!-- Deskripsi Project -->
                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-label ">Deskripsi Project</label>

                            </div>
                            <span class="">{{ $presentation_projects->project->description}}</span>

                        </div>

                        <!-- Link Repository Github -->
                        <div class="mb-3">
                            <label class="form-label">Link Repository Github (Opsional)</label>
                            <div>
                                <a href="{{ $presentation_projects->project->link ? $presentation_projects->project->link : '#'}}">

                                <span class="badge bg-primary">{{ $presentation_projects->project->link ? $presentation_projects->project->link : 'https://....'}}</span>

                            </a>
                            </div>

                        </div>

                        <!-- Waktu Pengerjaan -->
                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-label">Waktu Pengerjaan</label>
                            </div>
                            <span class="badge bg-warning">{{ \Carbon::parse($presentation_projects->project->start_date)->format('d/m/Y') . ' - ' . \Carbon::parse($presentation_projects->project->end_date)->format('d/m/Y') }}</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Samping -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <table class="table stripe row-border order-column nowrap"
                    style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td></td>
                            <td></td>
                            {{-- <td>
                                {{-- @if ()
                                    <span class="text-warning">Ketua</span>
                                @else
                                    <span class="text-secondary">Anggota</span>
                                @endif
                            </td> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
