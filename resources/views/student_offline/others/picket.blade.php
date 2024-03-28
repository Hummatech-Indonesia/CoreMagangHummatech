@extends('student_offline.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Jadwal Piket</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Jadwal Piket</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid note-has-grid">
        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
          <li class="nav-item">
            <a data-bs-toggle="tab" href="#task" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 text-body-color" id="all-category">
              <i class="ti ti-sunset-2 fill-white me-0 me-md-1"></i>
              <span class="d-none d-md-block font-weight-medium">Pagi</span>
            </a>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="tab" href="#done" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color " id="note-business">
              <i class="ti ti-sunset fill-white me-0 me-md-1"></i>
              <span class="d-none d-md-block font-weight-medium">Sore</span>
            </a>
          </li>
          <li class="nav-item ms-auto">
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#laporModal">
                Laporkan
            </button>
          </li>
        </ul>
        <div class="tab-content">
            <!-- PAGI -->
            @php
            use App\Enum\DayEnum;
            use App\Enum\TimeEnum;
            use App\Services\PicketService;
            $picketService = app(PicketService::class);
            $siswaIdsSeninPagi = $picketService->getSiswaIdByTimDanDayPicket(TimeEnum::MORNING->value, DayEnum::MONDAY->value);
            $siswaIdsSelasaPagi = $picketService->getSiswaIdByTimDanDayPicket(TimeEnum::MORNING->value, DayEnum::TUESDAY->value);
            $siswaIdsRabuPagi = $picketService->getSiswaIdByTimDanDayPicket(TimeEnum::MORNING->value, DayEnum::WEDNESDAY->value);
            $siswaIdsKamisPagi = $picketService->getSiswaIdByTimDanDayPicket(TimeEnum::MORNING->value, DayEnum::THURSDAY->value);
            $siswaIdsJumatPagi = $picketService->getSiswaIdByTimDanDayPicket(TimeEnum::MORNING->value, DayEnum::FRIDAY->value);

            $siswaIdsSeninAfternoon = $picketService->getSiswaIdByTimDanDayPicket(TimeEnum::AFTERNOON->value, DayEnum::MONDAY->value);
            $siswaIdsSelasaAfternoon = $picketService->getSiswaIdByTimDanDayPicket(TimeEnum::AFTERNOON->value, DayEnum::TUESDAY->value);
            $siswaIdsRabuAfternoon = $picketService->getSiswaIdByTimDanDayPicket(TimeEnum::AFTERNOON->value, DayEnum::WEDNESDAY->value);
            $siswaIdsKamisAfternoon = $picketService->getSiswaIdByTimDanDayPicket(TimeEnum::AFTERNOON->value, DayEnum::THURSDAY->value);
            $siswaIdsJumatAfternoon = $picketService->getSiswaIdByTimDanDayPicket(TimeEnum::AFTERNOON->value, DayEnum::FRIDAY->value);

            @endphp

            <div class="tab-pane active" id="task" role="tabpanel">
                <div class="row h-100 align-items-stretch justify-content-center pt-3">
                    <!-- Senin -->
                    <div class="col-12 col-md-6 col-lg-2 d-flex align-items-center mx-3 mb-3">
                        <div class="card flex-grow-1 h-100">
                            <ul class="list-group text-center">
                                <li class="list-group-item mb-3 active d-flex align-items-center justify-content-center" aria-current="true">
                                    Senin
                                </li>
                                @forelse ($siswaIdsSeninPagi as $siswaId)
                                @php
                                    $siswa = \App\Models\Student::find($siswaId);
                                @endphp
                                    <li class="mb-3 d-flex align-items-center justify-content-center text-break">
                                        <h6>{{ $siswa->name }}</h6>
                                    </li>
                                @empty
                                <p>Belum Ada data</p>
                                @endforelse

                            </ul>
                        </div>
                    </div>

                    <!-- Selasa -->
                    <div class="col-12 col-md-6 col-lg-2 d-flex align-items-center mx-3 mb-3">
                        <div class="card flex-grow-1 h-100">
                            <ul class="list-group text-center">
                                <li class="list-group-item mb-3 active d-flex align-items-center justify-content-center" aria-current="true">
                                    Selasa
                                </li>
                                @forelse ($siswaIdsSelasaPagi as $siswaId)
                                @php
                                    $siswa = \App\Models\Student::find($siswaId);
                                @endphp
                                <li class="mb-3 d-flex align-items-center justify-content-center text-break">
                                    <h6>{{ $siswa->name }}</h6>
                                </li>
                                @empty
                                <p>Belum Ada data</p>
                                @endforelse

                            </ul>
                        </div>
                    </div>

                    <!-- Rabu -->
                    <div class="col-12 col-md-6 col-lg-2 d-flex align-items-center mx-3 mb-3">
                        <div class="card flex-grow-1 h-100">
                            <ul class="list-group text-center">
                                <li class="list-group-item mb-3 active d-flex align-items-center justify-content-center" aria-current="true">
                                    Rabu
                                </li>
                                @forelse ($siswaIdsRabuPagi as $siswaId)
                                @php
                                    $siswa = \App\Models\Student::find($siswaId);
                                @endphp
                                <li class="mb-3 d-flex align-items-center justify-content-center text-break">
                                    <h6>{{ $siswa->name }}</h6>
                                </li>
                                @empty
                                <p>Belum Ada data</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <!-- Kamis -->
                    <div class="col-12 col-md-6 col-lg-2 d-flex align-items-center mx-3 mb-3">
                        <div class="card flex-grow-1 h-100">
                            <ul class="list-group text-center">
                                <li class="list-group-item mb-3 active d-flex align-items-center justify-content-center" aria-current="true">
                                    Kamis
                                </li>
                                @forelse ($siswaIdsKamisPagi as $siswaId)
                                @php
                                    $siswa = \App\Models\Student::find($siswaId);
                                @endphp
                                <li class="mb-3 d-flex align-items-center justify-content-center text-break">
                                    <h6>{{ $siswa->name }}</h6>
                                </li>
                                @empty
                                <p>Belum Ada data</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <!-- Jumat -->
                    <div class="col-12 col-md-6 col-lg-2 d-flex align-items-center mx-3 mb-3">
                        <div class="card flex-grow-1 h-100">
                            <ul class="list-group text-center">
                                <li class="list-group-item mb-3 active d-flex align-items-center justify-content-center" aria-current="true">
                                    Jum'at
                                </li>
                                @forelse ($siswaIdsJumatPagi as $siswaId)
                                @php
                                    $siswa = \App\Models\Student::find($siswaId);
                                @endphp
                                <li class="mb-3 d-flex align-items-center justify-content-center text-break">
                                    <h6>{{ $siswa->name }}</h6>
                                </li>
                                @empty
                                <p>Belum Ada data</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SORE -->
            <div class="tab-pane" id="done" role="tabpanel">
                <div class="row h-100 align-items-stretch justify-content-center pt-3">
                    <!-- Senin -->
                    <div class="col-12 col-md-6 col-lg-2 d-flex align-items-center mx-3 mb-3">
                        <div class="card flex-grow-1 h-100">
                            <ul class="list-group text-center">
                                <li class="list-group-item mb-3 active d-flex align-items-center justify-content-center" aria-current="true">
                                    Senin
                                </li>
                                @forelse ($siswaIdsSeninAfternoon as $siswaId)
                                @php
                                    $siswa = \App\Models\Student::find($siswaId);
                                @endphp
                                <li class="mb-3 d-flex align-items-center justify-content-center text-break">
                                    <h6>{{ $siswa->name }}</h6>
                                </li>
                                @empty
                                <p>Belum Ada data</p>
                                @endforelse

                            </ul>
                        </div>
                    </div>

                    <!-- Selasa -->
                    <div class="col-12 col-md-6 col-lg-2 d-flex align-items-center mx-3 mb-3">
                        <div class="card flex-grow-1 h-100">
                            <ul class="list-group text-center">
                                <li class="list-group-item mb-3 active d-flex align-items-center justify-content-center" aria-current="true">
                                    Selasa
                                </li>
                                @forelse ($siswaIdsSelasaAfternoon as $siswaId)
                                @php
                                    $siswa = \App\Models\Student::find($siswaId);
                                @endphp
                                <li class="mb-3 d-flex align-items-center justify-content-center text-break">
                                    <h6>{{ $siswa->name }}</h6>
                                </li>
                                @empty
                                <p>Belum Ada data</p>
                                @endforelse

                            </ul>
                        </div>
                    </div>

                    <!-- Rabu -->
                    <div class="col-12 col-md-6 col-lg-2 d-flex align-items-center mx-3 mb-3">
                        <div class="card flex-grow-1 h-100">
                            <ul class="list-group text-center">
                                <li class="list-group-item mb-3 active d-flex align-items-center justify-content-center" aria-current="true">
                                    Rabu
                                </li>
                                @forelse ($siswaIdsRabuAfternoon as $siswaId)
                                @php
                                    $siswa = \App\Models\Student::find($siswaId);
                                @endphp
                                <li class="mb-3 d-flex align-items-center justify-content-center text-break">
                                    <h6>{{ $siswa->name }}</h6>
                                </li>
                                @empty
                                <p>Belum Ada data</p>
                                @endforelse

                            </ul>
                        </div>
                    </div>

                    <!-- Kamis -->
                    <div class="col-12 col-md-6 col-lg-2 d-flex align-items-center mx-3 mb-3">
                        <div class="card flex-grow-1 h-100">
                            <ul class="list-group text-center">
                                <li class="list-group-item mb-3 active d-flex align-items-center justify-content-center" aria-current="true">
                                    Kamis
                                </li>
                                @forelse ($siswaIdsKamisAfternoon as $siswaId)
                                @php
                                    $siswa = \App\Models\Student::find($siswaId);
                                @endphp
                                <li class="mb-3 d-flex align-items-center justify-content-center text-break">
                                    <h6>{{ $siswa->name }}</h6>
                                </li>
                                @empty
                                <p>Belum Ada data</p>
                                @endforelse

                            </ul>
                        </div>
                    </div>

                    <!-- Jumat -->
                    <div class="col-12 col-md-6 col-lg-2 d-flex align-items-center mx-3 mb-3">
                        <div class="card flex-grow-1 h-100">
                            <ul class="list-group text-center">
                                <li class="list-group-item mb-3 active d-flex align-items-center justify-content-center" aria-current="true">
                                    Jum'at
                                </li>
                                @forelse ($siswaIdsJumatAfternoon as $siswaId)
                                @php
                                    $siswa = \App\Models\Student::find($siswaId);
                                @endphp
                                <li class="mb-3 d-flex align-items-center justify-content-center text-break">
                                    <h6>{{ $siswa->name }}</h6>
                                </li>
                                @empty
                                <p>Belum Ada data</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="card bg-light-primary shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-info-square position-absolute" style="top: 10px; left: 10px;">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M19 2a3 3 0 0 1 2.995 2.824l.005 .176v14a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-14a3 3 0 0 1 2.824 -2.995l.176 -.005h14zm-7 9h-1l-.117 .007a1 1 0 0 0 0 1.986l.117 .007v3l.007 .117a1 1 0 0 0 .876 .876l.117 .007h1l.117 -.007a1 1 0 0 0 .876 -.876l.007 -.117l-.007 -.117a1 1 0 0 0 -.764 -.857l-.112 -.02l-.117 -.006v-3l-.007 -.117a1 1 0 0 0 -.876 -.876l-.117 -.007zm.01 -3l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" />
            </svg>
            <div class="row align-items-center d-flex">
                <div class="col">
                    <h6 class="ms-4">
                        Lacinia sit tempor risus pretium aliquet semper a sagittis ultricagna quisque sed massa dictum quis porta lacinia sem. Sagittis augue varius nec morbi. Lectus venenatis arcu bibendum mattis sit
                        Lacinia sit tempor risus pretium aliquet semper a sagittis ultricagna quisque sed massa dictum quis porta lacinia sem. Sagittis augue varius nec morbi. Lectus venenatis arcu bibendum mattis sit
                        Lacinia sit tempor risus pretium aliquet semper a sagittis ultricagna quisque sed massa dictum quis porta lacinia sem. Sagittis augue varius nec morbi. Lectus venenatis arcu bibendum mattis sit


                    </h6>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Laporkan -->
<div class="modal fade" id="laporModal" tabindex="-1" aria-labelledby="laporModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="laporModalLabel">Laporkan Piket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="waktuRadio" class="form-label">Waktu</label>
                        <div id="waktuRadio">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="waktu" id="pagiRadio" value="pagi">
                                <label class="form-check-label" for="pagiRadio">Pagi</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="waktu" id="soreRadio" value="sore">
                                <label class="form-check-label" for="soreRadio">Sore</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="laporanTextarea" class="form-label">Deskripsi </label>
                        <textarea class="form-control" id="laporanTextarea" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambarInput" class="form-label">Upload Gambar</label>
                        <input class="form-control" type="file" id="gambarInput" name="gambar">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" onclick="submitLaporan()">Simpan</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.btn-edit').click(function () {
            var id = $(this).data('id');
            $('#form-update').attr('action', '/material/' + id);
            $('#modal-edit').modal('show');
        });
        $('.btn-detail').click(function () {
            var id = $(this).data('id');
            $('#modal-detail').modal('show');
        });

        function preview(event) {
            var input = event.target;
            var previewImages = document.getElementsByClassName('image-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    Array.from(previewImages).forEach(function(previewImage) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';
                    });
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $('.btn-delete').click(function () {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/division/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
