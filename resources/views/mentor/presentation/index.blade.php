@extends('mentor.layouts.app')
@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Presentasi</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Presentasi</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                        class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid note-has-grid">
    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
        <li class="nav-item">
            <a data-bs-toggle="tab" href="#monday" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 text-body-color" id="monday-tab">
                <span class="d-none d-md-block font-weight-medium">Senin</span>
            </a>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="tab" href="#tuesday" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color" id="tuesday-tab">
                <span class="d-none d-md-block font-weight-medium">Selasa</span>
            </a>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="tab" href="#wednesday" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color" id="wednesday-tab">
                <span class="d-none d-md-block font-weight-medium">Rabu</span>
            </a>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="tab" href="#thursday" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color" id="thursday-tab">
                <span class="d-none d-md-block font-weight-medium">Kamis</span>
            </a>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="tab" href="#friday" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color" id="friday-tab">
                <span class="d-none d-md-block font-weight-medium">Jumat</span>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="monday" role="tabpanel">
            <div class="tab-pane active" id="monday" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#settingLimitModal">Setting Limit</button>
                        </div>
                    </div>
                    <form action="{{ route('presentation.store') }}" method="POST" class="row g-3">
                        @method('POST')
                        @csrf
                        <div class="col-md-2 mb-4 pt-2">
                            <h5>Jadwal Ke 1</h5>
                        </div>
                        <div class="col-md-5">
                            <label for="start-time-1" class="form-label">Waktu Mulai:</label>
                            <input type="hidden" name="schedule_to" value="{{ date('Y-m-d') }}">
                            <input type="time" class="form-control @error('start_date') is-invalid @enderror" id="start-time-1" name="start_date">
                            @error('start_date')
                            <div class="invalid-feedback text-dangger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col-md-5">
                            <label for="end-time-1" class="form-label">Waktu Selesai:</label>
                            <input type="hidden" name="schedule_to" value="{{ date('Y-m-d') }}">
                            <input type="time" class="form-control @error('end_date') is-invalid @enderror" id="end-time-1" name="end_date">
                            @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col-md-2 mb-4 pt-2">
                            <h5>Jadwal Ke 2</h5>
                        </div>
                        <div class="col-md-5">
                            <label for="start-time-2" class="form-label">Waktu Mulai:</label>
                            <input type="hidden" name="schedule_to" value="{{ date('Y-m-d') }}">

                            <input type="time" class="form-control @error('start_date') is-invalid @enderror" id="start-time-2" name="start_date">
                            @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col-md-5">
                            <label for="end-time-2" class="form-label">Waktu Selesai:</label>
                            <input type="hidden" name="schedule_to" value="{{ date('Y-m-d') }}">

                            <input type="time" class="form-control @error('end_date') is-invalid @enderror" id="end-time-2" name="end_date">
                            @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary float-end">Simpan</button>
                        </div>
                    </form>
                </div>

                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end mb-3">
                            <button id="settingLimitButton" class="btn btn-primary">Setting Limit</button>
                        </div>
                    </div>
                </div>
                <div class="row d-none" id="jadwalInput">
                    <div class="col-md-2 mb-4">
                        <h5>Jadwal Ke 1</h5>
                    </div>
                    <div class="col-md-10">
                        <form action="{{ route('presentation.store') }}" method="POST" class="row g-3">
                            @method('POST')
                            @csrf
                            <div class="col-md-6">
                                <label for="start-time-1" class="form-label">Waktu Mulai:</label>
                                <input type="time" class="form-control" id="start-time-1" name="start_time">
                            </div>
                            <div class="col-md-6">
                                <label for="end-time-1" class="form-label">Waktu Selesai:</label>
                                <input type="time" class="form-control" id="end-time-1" name="end_date">
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary float-end">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="tab-pane" id="tuesday" role="tabpanel">
            <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#settingLimitModal">Setting Limit</button>
        </div>

        <div class="tab-pane" id="wednesday" role="tabpanel">
            <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#settingLimitModal">Setting Limit</button>
        </div>

        <div class="tab-pane" id="thursday" role="tabpanel">
            <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#settingLimitModal">Setting Limit</button>
        </div>

        <div class="tab-pane" id="friday" role="tabpanel">
            <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#settingLimitModal">Setting Limit</button>
        </div>
    </div>
</div>


<!--Limit Modal -->
<div class="modal fade" id="settingLimitModal" tabindex="-1" aria-labelledby="settingLimitModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingLimitModalLabel">Setting Limit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="limitInput" class="form-label">Limit Presentasi</label>
                        <input type="number" class="form-control" id="limitInput" placeholder="Masukkan limit">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tombol Setting Limit
        var settingLimitButton = document.getElementById('settingLimitButton');
        // Baris Input Jadwal
        var jadwalInput = document.getElementById('jadwalInput');
        // Input jumlah di modal
        var limitInputModal = document.getElementById('limitInput');
        // Tombol Simpan di input jadwal
        var simpanButton = document.createElement('button');
        simpanButton.type = 'button';
        simpanButton.className = 'btn btn-primary float-end';
        simpanButton.textContent = 'Simpan';

        // Menambahkan event listener untuk tombol Setting Limit
        settingLimitButton.addEventListener('click', function() {
            // Tampilkan modal Setting Limit
            $('#settingLimitModal').modal('show');
        });

        // Fungsi untuk menampilkan input jadwal sesuai dengan jumlah yang dimasukkan dalam modal
        function showJadwalInput(jumlah) {
            jadwalInput.innerHTML = ''; // Kosongkan terlebih dahulu konten input jadwal sebelum menambahkan input baru
            for (var i = 1; i <= jumlah; i++) {
                var jadwalKe = document.createElement('div');
                jadwalKe.className = 'col-md-2 mb-4 pt-2';
                jadwalKe.innerHTML = '<h5>Jadwal Ke ' + i + '</h5>';
                var jadwalWaktu = document.createElement('div');
                jadwalWaktu.className = 'col-md-10';
                jadwalWaktu.innerHTML = '<form id="form-jadwal-' + i + '" class="row g-3">' +
                    '<div class="col-md-6">' +
                    '<input type="time" class="form-control" id="start-time-' + i + '" name="start_time">' +
                    '</div>' +
                    '<div class="col-md-6">' +
                    '<input type="time" class="form-control" id="end-time-' + i + '" name="end_time">' +
                    '</div>' +
                    '</form>';
                jadwalInput.appendChild(jadwalKe);
                jadwalInput.appendChild(jadwalWaktu);
            }
            // Tambahkan tombol Simpan setelah menambahkan input jadwal
            jadwalInput.appendChild(simpanButton);
            jadwalInput.classList.remove('d-none'); // Tampilkan input jadwal setelah ditambahkan
        }

        // Simulasi pengaturan limit (Anda perlu menyesuaikan dengan logika sebenarnya)
        function saveLimit() {
            var jumlah = parseInt(limitInputModal.value);
            showJadwalInput(jumlah);
        }

        // Menambahkan event listener untuk tombol "Simpan" di dalam modal Setting Limit
        document.getElementById('settingLimitModal').querySelector('.btn-primary').addEventListener('click', function() {
            // Simpan limit dan tampilkan input jadwal
            saveLimit();
            // Sembunyikan modal
            $('#settingLimitModal').modal('hide');
        });

        // Menambahkan event listener untuk tombol "Simpan" di input jadwal
        // Menambahkan event listener untuk tombol "Simpan" di input jadwal
    simpanButton.addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah perilaku default dari tombol
        // Lakukan penyimpanan data jadwal ke database
        for (var i = 1; i <= parseInt(limitInputModal.value); i++) {
            var form = document.getElementById('form-jadwal-' + i);
            var formData = new FormData(form);
            fetch('{{ route("presentation.store") }}', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    console.log('Data jadwal berhasil disimpan ke database.');
                } else {
                    console.error('Gagal menyimpan data jadwal ke database.');
                }
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
            });
        }
    });

    });
</script> --}}
@endsection

