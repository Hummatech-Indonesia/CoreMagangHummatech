@extends('admin.layouts.app')
@section('content')
    <div class="d-flex align-items-center mb-4">
        <!-- Tombol Kembali -->
        <button class="btn btn-primary py-3  me-3">
            <i class="ri-arrow-left-line"></i> 
        </button>

        <!-- Header Judul -->
        <div class="bg-primary text-light text-center text-9xl w-100 py-3 rounded">
            Detail Project
        </div>
    </div>


    <div class="row">
        <div class="col-lg-8">
            <div class="d-flex flex-column h-50">
                <div class="card">
                    <div class="row align-items-end">
                        <div class="card-body mx-3">
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
                        <div class="card-body mx-3">
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
                                <span class="badge bg-secondary px-3 py-2">Sedang Dikerjakan</span>
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