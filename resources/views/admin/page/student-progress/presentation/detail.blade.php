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
            Detail Presentasi
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
                            <label class="form-label text-9xl">Status</label>
                            <div>
                                <span class="badge text-success px-3 py-2 status-badge" style="background-color: rgba(230, 255, 250, 1)">Selesai Presentasi</span>
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
                                <span class="badge category-badge">Solo Project</span>
                            </div>
                            {{-- <input type="text" class="form-control" value="Solo Project"> --}}
                        </div>
    
                        <!-- Deskripsi Project -->
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Project</label>
                            <textarea class="form-control" rows="3" style="border:none">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            </textarea>
                        </div>
    
                        <!-- Link Repository Github -->
                        <div class="mb-3">
                            <label class="form-label">Link Repository Github (Opsional)</label>
                            <input type="url" class="form-control" value="https://....." readonly>
                        </div>
    
                        <!-- Waktu Pengerjaan -->
                        <div class="mb-3">
                            <label class="form-label">Waktu Pengerjaan</label>
                            <input type="text" class="form-control" value="23/10/2024 - 30/10/2024" readonly>
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