@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="px-3 py-1">
        <div class="d-flex row justify-content-between align-items-center">
            <div class="col-xl-3 col-lg-2 col-md-3 col-sm-3 m-0" id="responsive-team">
                <h4 class="my-0 py-0">Team</h4>
            </div>
            <div class="col-xl-3 col-lg-5 col-md-5 col-sm-6 d-flex align-items-center">
                <div class="me-2 w-50">
                    <select class="form-control" data-choices name="choices-single-default" id="choices-single-default">
                        <option value="">Semua</option>
                        <option value="">Solo</option>
                        <option value="">Premini</option>
                        <option value="">Mini</option>
                    </select>
                </div>
                <form class="app-search d-md-block w-50">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Cari..." autocomplete="off" id="search-options" value="">
                        <span class="mdi mdi-magnify search-widget-icon"></span>
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @forelse ($teams as $team)
    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6">
        <div class="card">
            <span class="card-img-top w-100" style="height: 100px; background-color: #C7C7C7"></span>
            <div class="d-flex justify-content-center px-3" style="margin-top: -35px;">
                @if($team->image != null && Storage::disk('public')->exists($team->image))
                    <img src="{{ asset('storage/' . $team->image) }}"
                        class="img-thumbnail rounded-circle avatar-md" width="50px"
                        height="50px">
                @else
                    @php
                        $firstLetter = substr($team->name, 0, 1);
                        $firstLetter = strtoupper($firstLetter);
                        $backgroundColors = [
                            '#ff5722',
                            '#4caf50',
                            '#2196f3',
                        ];
                        $backgroundColor = $backgroundColors[ord($firstLetter) % count($backgroundColors)];
                    @endphp
                    <div style="background-color: {{ $backgroundColor }}; width: 67px; height: 67px; border-radius: 50%; display: flex; justify-content: center; align-items: center;" >
                        <span style="color: white; font-size: 20px;">{{ $firstLetter }}</span>
                    </div>
                @endif
            </div>
            <div class="card-body text-center">
                <div class="d-flex justify-content-center gap-2 mb-2">
                    @php
                        $color = 'primary';
                        if ($team->category_project_id == 1) {
                            $color = 'danger';
                        }elseif ($team->category_project_id == 2) {
                            $color = 'warning';
                        }elseif ($team->category_project_id == 3) {
                            $color = 'info';
                        }elseif ($team->category_project_id == 4) {
                            $color = 'success';
                        }
                    @endphp
                    <span class="badge bg-{{ $color }}-subtle text-{{ $color }}">{{ $team->categoryProject->name }}</span>
                    <span class="badge bg-{{ $team->teamStatus->color() }}-subtle text-{{ $team->teamStatus->color() }}">{{ $team->teamStatus->label() }}</span>
                    <span class="badge bg-secondary-subtle text-secondary">{{ $team->division->name }}</span>
                </div>
                <a href="{{ url('/offline-students/team/detail') }}" style="font-size: 15px" class="text-dark">
                    {{ $team->name }}
                </a>
                <p class="text-muted pt-1">
                    {{ \Carbon\Carbon::parse($team->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                </p>
                <div class="d-flex w-100 justify-content-center gap-2">
                    <p style="position: relative; top: 10px">Anggota: </p>
                    <div class="avatar-group">
                        @if(Storage::disk('public')->exists($team->student->avatar))
                            <a href="javascript: void(0);" class="avatar-group-item shadowme-3" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $team->student->name }}">
                                <img src="{{ asset('storage/'.$team->student->avatar) }}" alt="" class="rounded-circle avatar-xs">
                            </a>
                        @else
                            @php
                                $firstLetter = substr($team->student->name, 0, 1);
                                $firstLetter = strtoupper($firstLetter);
                                $backgroundColors = [
                                    '#ff5722',
                                    '#4caf50',
                                    '#2196f3',
                                ];
                                $backgroundColor = $backgroundColors[ord($firstLetter) % count($backgroundColors)];
                            @endphp
                            <a href="javascript: void(0);" class="avatar-group-item me-3" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $team->student->name }}">
                                <div style="background-color: {{ $backgroundColor }}; width: 32px; height: 32px; border-radius: 50%; display: flex; justify-content: center; align-items: center;" class="me-n3">
                                    <span style="color: white; font-size: 15px;">{{ $firstLetter }}</span>
                                </div>
                            </a>
                        @endif
                        {{-- @php
                            $countTeam = App\Models\StudentTeam::where('hummatask_team_id', $team->id)->count();
                            $count = $countTeam - 1;
                        @endphp --}}
                        @if ($team->category_project_id != 1)
                            @foreach (App\Models\StudentTeam::where('hummatask_team_id', $team->id)->get() as $index => $studentTeam)
                                
                                    @if(Storage::disk('public')->exists($studentTeam->student->avatar))
                                        <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $studentTeam->student->name }}">
                                            <img src="{{ asset('storage/'.$studentTeam->student->avatar) }}" alt="" class="rounded-circle avatar-xs">
                                        </a>
                                    @else
                                        @php
                                            $firstLetter = substr($studentTeam->student->name, 0, 1);
                                            $firstLetter = strtoupper($firstLetter);
                                            $backgroundColors = [
                                                '#ff5722',
                                                '#4caf50',
                                                '#2196f3',
                                            ];
                                            $backgroundColor = $backgroundColors[ord($firstLetter) % count($backgroundColors)];
                                        @endphp
                                        <a href="javascript: void(0);" class="avatar-group-item shadow ms-n3" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $studentTeam->student->name }}">
                                            <div class="avatar-xs">
                                                <div style="background-color: {{ $backgroundColor }};" class="avatar-title rounded-circle">
                                                    {{ $firstLetter }}
                                                </div>
                                            </div>
                                        </a>
                                    @endif

                                    {{-- <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $count }} lainnya">
                                        <div class="avatar-xs">
                                            <div class="avatar-title rounded-circle">
                                                {{ $count }}+
                                            </div>
                                        </div>
                                    </a> --}}
                            @endforeach
                        @endif
                    </div>
                </div>
              <a href="{{ route('admin.team.show', $team->slug) }}" class="btn btn-secondary w-100 mt-4">Detail</a>
            </div>
          </div>
    </div>
    @empty
    <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
        <img src="{{ asset('no data.png') }}" alt="" width="200px" srcset="">
        <p class="fs-5 text-dark">
            Tidak ada tim
        </p>
    </div>
    @endforelse
</div>

<div class="modal fade" id="add" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyingcontentModalLabel">Tempatkan Divisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="divisi" class="col-form-label">Divisi</label>
                        <select class="tambah js-example-basic-single form-control @error('divisi') is-invalid @enderror" aria-label=".form-select example" name="student_id">
                            <option value="">WEB</option>
                            <option value="">MOBILE</option>
                            <option value="">UI/UX</option>
                            <option value="">DIGITAL MARKETING</option>
                        </select>
                        @error('divisi')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Detail Alumni</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0 overflow-hidden">
            <div data-simplebar="init" style="height: calc(100vh - 112px);" class="simplebar-scrollable-y">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask mt-4 overflow-y-scroll">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="" class="avatar-xl rounded-circle show-image" alt=""
                                style="object-fit: cover">
                        </div>
                        <div class="d-flex justify-content-center align-items-center mt-4">
                            <h4 class="show-name"></h4>
                        </div>
                        <div class="row mx-2">
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-map-pin-user-line fs-3 text-primary"></i>
                                <p class="m-0 show-address"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class=" ri-smartphone-line fs-3 text-primary"></i>
                                <p class="m-0 show-phone"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-gift-2-line fs-3 text-primary"></i>
                                <p class="m-0 show-birthday"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-calendar-line fs-3 text-primary"></i>
                                <p class="m-0 show-start"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-building-line fs-3 text-primary"></i>
                                <p class="m-0 show-school"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-calendar-line fs-3 text-primary"></i>
                                <p class="m-0 show-finish"></p>
                            </div>
                        </div>
                        <div class="mt-3 mx-4">
                            <h4>CV</h4>
                            <img class="rounded show-cv" alt="200x200" width="330" src="gambar.jpg"
                                style="object-fit: cover; cursor: pointer;" onclick="zoomImage(this)">
                            <div class="mt-2 d-flex justify-content-end">
                                <a class="btn btn-primary download-cv" download="cv.jpg" href="gambar.jpg">Download</a>
                            </div>

                        </div>
                        <div class="mt-3 mx-4">
                            <h4>Pernyataan Orang tua</h4>
                            <img class="rounded show-parent-statement" alt="200x200" width="330" src=""
                                style="object-fit: cover;cursor: pointer;" onclick="zoomImage(this)">
                            <div class="mt-2 d-flex justify-content-end ">
                                <a class="btn btn-primary download-parent-statement" href=""
                                    download="">Download</a>
                            </div>
                        </div>
                        <div class="mt-3 mx-4">
                            <h4>Pernyataan Diri</h4>
                            <img class="rounded show-self-statement" alt="200x200" width="330" src=""
                                style="object-fit: cover;cursor: pointer;" onclick="zoomImage(this)">
                            <div class="mt-2 d-flex justify-content-end ">
                                <a class="btn btn-primary download-self-statement" href=""
                                    download="">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $("#message").modal('show');
        });
    </script>

    <script>
        $('.btn-detail').click(function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let avatar = $(this).data('avatar');
            let address = $(this).data('address');
            let phone = $(this).data('phone');
            let birth_date = $(this).data('birthdate');
            let birth_place = $(this).data('birthplace');
            let start_date = $(this).data('startdate');
            let finish_date = $(this).data('finishdate');
            let school = $(this).data('school');
            let cv = $(this).data('cv');
            let self_statement = $(this).data('selfstatement');
            let parents_statement = $(this).data('parentsstatement');

            $('.show-name').text(name);
            $('.show-image').attr('src', avatar);
            $('.show-address').text(address);
            $('.show-phone').text(phone);
            $('.show-birthday').text(birth_place + ',' + birth_date)
            $('.show-start').text(start_date);
            $('.show-school').text(school);
            $('.show-finish').text(finish_date);

            // console.log(cv);
            $('.show-cv').attr('src', cv);
            $('.download-cv').attr('href', cv);
            $('.download-cv').attr('download', cv);

            // console.log(parents_statement);
            $('.show-parent-statement').attr('src', parents_statement);
            $('.download-parent-statement').attr('href', parents_statement);
            $('.download-parent-statement').attr('download', parents_statement);

            // console.log(self_statement);
            $('.show-self-statement').attr('src', self_statement);
            $('.download-self-statement').attr('href', self_statement);
            $('.download-self-statement').attr('download', self_statement);

            $('#offcanvasRight').offcanvas('show');
        });
    </script>

    <script>
        function zoomImage(img) {
            // Membuat elemen overlay
            var overlay = document.createElement('div');
            overlay.style.position = 'fixed';
            overlay.style.top = 0;
            overlay.style.left = 0;
            overlay.style.width = '100%';
            overlay.style.height = '100%';
            overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
            overlay.style.zIndex = 9999;
            overlay.style.display = 'flex';
            overlay.style.alignItems = 'center';
            overlay.style.justifyContent = 'center';

            // Membuat elemen gambar yang diperbesar
            var zoomedImg = document.createElement('img');
            zoomedImg.src = img.src;
            zoomedImg.style.maxWidth = '90%';
            zoomedImg.style.maxHeight = '90%';

            // Menambahkan gambar ke dalam overlay
            overlay.appendChild(zoomedImg);

            // Menambahkan overlay ke dalam body
            document.body.appendChild(overlay);

            // Menghapus overlay saat diklik
            overlay.onclick = function() {
                document.body.removeChild(overlay);
            };
        }
    </script>

    <script>
        $(document).ready(function() {
            function toggleTableResponsive() {
                var screenWidth = $(window).width();
                var $table = $('#responsive-team');
                if (screenWidth <= 880) {
                $table.addClass('py-4');
                } else {
                $table.removeClass('py-4');
                }
            }

            toggleTableResponsive();

            $(window).resize(function() {
                toggleTableResponsive();
            });
        });
    </script>
@endsection
