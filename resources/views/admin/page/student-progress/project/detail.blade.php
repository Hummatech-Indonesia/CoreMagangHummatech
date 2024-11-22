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
            Detail Project
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
                                <span class="badge px-3 py-2" style="background-color: rgba(93, 135, 255, 0.1); border-radius:34px; color: rgba(13, 168, 255, 1); ">Sedang Dikerjakan</span>
                            {{-- @if ()
                                    <span class="badge text-success px-3 py-2" style="background-color: rgba(230, 255, 250, 1);  border-radius:34px;">Selesai Presentasi</span>
                                @else
                                    <span class="badge text-danger px-3 py-2" style="background-color: rgba(251, 242, 239, 1); border-radius:34px;">Belum Presentasi</span>
                                @endif --}}
                            </div>
                        </div>
    
                        <!-- Kategori Project -->
                        <div class="mb-3">
                            <label class="form-label">Kategori Project</label>
                            <input type="text" class="form-control" value="Solo Project">
                        </div>
    
                        <!-- Deskripsi Project -->
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Project</label>
                            <textarea class="form-control" rows="3" readonly>Tema Project Anda</textarea>
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
    
                        <!-- Waktu Presentasi -->
                        <div class="mb-3">
                            <label class="form-label">Waktu Presentasi</label>
                            <input type="text" class="form-control" value="23/10/2024" readonly>
                        </div>
    
                        <!-- Nomor Antrian -->
                        <div class="mb-3">
                            <label class="form-label">Nomor Antrian</label>
                            <input type="text" class="form-control" value="Antrian Ke 101" readonly>
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
                            <td>
                                {{-- @if ()
                                    <span class="text-warning">Ketua</span>
                                @else
                                    <span class="text-secondary">Anggota</span>
                                @endif --}}
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection