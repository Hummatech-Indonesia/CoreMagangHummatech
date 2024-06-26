@extends('mentor.layouts.app')
@section('content')

{{-- <div class="row mb-3">
    <div class="col-md-4 col-lg-2 col-xl-2">
        <select class="form-select">
            <option selected>Semua</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
        </select>
    </div>
</div> --}}





<div class="container-fluid note-has-grid">
    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
      <li class="nav-item">
        <a data-bs-toggle="tab" href="#task" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 text-body-color" id="all-category">
          <i class="ti ti-presentation-analytics fill-white me-0 me-md-1"></i>
          <span class="d-none d-md-block font-weight-medium">Presentasi</span>
        </a>
      </li>
      <li class="nav-item">
        <a data-bs-toggle="tab" href="#done" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color " id="note-business">
          <i class="ti ti-brand-zoom fill-white me-0 me-md-1"></i>
          <span class="d-none d-md-block font-weight-medium">Zoom</span>
        </a>
      </li>
      <li class="nav-item ms-auto">
        <form action="/timetable">
            <div class="ms-auto d-flex">
                <div class="mx-sm-2 mb-2">
                    <input type="date" name="date" value="{{ request()->date }}" class="form-control" id="exampleInputdate">
                </div>
                <div>
                    <button class="btn btn-primary w-100" type="submit">Cari</button>
                </div>
            </div>
        </form>
      </li>
    </ul>

    <div class="tab-content">

        <div class="tab-pane active" id="task" role="tabpanel">
            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item">
                            <tr>
                                <th>Jadwal</th>
                                <th>Jam</th>
                                <th>Tim</th>
                                <th>Judul Presentasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($presentations as $presentation)
                                <tr class="search-items">
                                    <td>
                                        <h6>
                                            {{$presentation ? $presentation->schedule_to : ''}}
                                        </h6>
                                    </td>
                                    <td>
                                        <h6>
                                            {{$presentation ? $presentation->start_date : ''}} -  {{$presentation ? $presentation->end_date : ''}}

                                        </h6>
                                    </td>
                                    <td class="d-flex">
                                        <div class="n-chk align-self-center text-center">
                                            @if ($presentation->hummataskTeam && $presentation->hummataskTeam->hummatask_team_id && $presentation->hummataskTeam->hummatask_team)
                                                <img src="{{ asset('storage/' . $presentation->hummataskTeam->hummatask_team) }}"
                                                    alt="avatar" class="rounded-circle" width="35" height="35">
                                            @elseif ($presentation->hummataskTeam && !$presentation->hummataskTeam->hummatask_team_id)
                                                <img src="{{ asset('user.webp') }}" alt="default avatar"
                                                    class="rounded-circle" width="35" height="35">
                                            @endif

                                        </div>

                                        <div class="ms-3">
                                            <div class="user-meta-info">
                                                <h6 class="user-name mb-0" data-name="Emma Adams">
                                                    {{ $presentation->hummataskTeam ? $presentation->hummataskTeam->name : 'Belum ada tim yang memilih' }}
                                                </h6>
                                                <span class="user-work fs-3">
                                                    {{ $presentation->hummataskTeam && $presentation->hummataskTeam->categoryProject ? $presentation->hummataskTeam->categoryProject->name : 'Belum ada tim yang memilih' }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="usr-email-addr">
                                            {{$presentation ? $presentation->title : ''}}
                                        </h6>
                                    </td>
                                    <td>
                                        <h6>
                                            @if ($presentation)
                                                <span class="badge bg-{{$presentation->status_presentation?->color()}}">
                                                    {{$presentation->status_presentation?->label()}}
                                                </span>
                                            @endif
                                        </h6>
                                    </td>
                                    <td class=" gap-2 justify-content-center">
                                        @if($presentation->hummatask_team_id)
                                            <button class="text-primary show-btn badge border-0 bg-light-primary"
                                                data-id="{{ $presentation->id }}"
                                                data-title="{{ $presentation->title }}"
                                                data-description="{{ $presentation->description }}"
                                                data-date="{{ \Carbon\Carbon::parse($presentation->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}"
                                                data-callback="{{ $presentation->callback != null ? $presentation->callback : 'Belum ada tanggapan' }}"
                                                >
                                                <i class="ti ti-eye fs-5"></i>
                                            </button>
                                            <button class="text-warning callback-btn badge border-0 bg-light-warning"
                                                data-id="{{ $presentation->id }}"
                                                >
                                                <i class="ti ti-send fs-5"></i>
                                            </button>
                                        @endif
                                    </td>

                                </tr>
                            @empty
                            <tr>
                                <td colspan="8">
                                    <div class="d-flex justify-content-center mt-3">
                                        <img src="{{ asset('no data.png') }}" width="200px"
                                            alt="">
                                    </div>
                                    <h4 class="text-center mt-2 mb-4">
                                        Data Masih kosong
                                    </h4>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$presentations->links()}}
                </div>
            </div>
        </div>

        <div class="tab-pane" id="done" role="tabpanel">
            <div class="row">
                @forelse ($processedSchedules as $zoomSchedule)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card h-100">
                            <div class="card-header text-bg-primary d-flex align-items-center rounded-top-4
                                @if($zoomSchedule->status === 'Berakhir') bg-warning text-dark @endif">
                                <h4 class="card-title text-white mb-0">{{$zoomSchedule->title}}</h4>
                                <div class="ms-auto d-flex">
                                    <span class="mb-1 badge bg-light text-dark">{{ $zoomSchedule->status }}</span>
                                </div>
                            </div>
                            <div class="card-body collapse show">
                                <div class="d-flex justify-content-between mb-2">
                                    <div>
                                        <h6>
                                            {{ \Carbon\Carbon::parse($zoomSchedule->start_date)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}
                                        </h6>
                                    </div>
                                    <div>
                                        <h6>
                                            {{ \Carbon\Carbon::parse($zoomSchedule->start_date)->format('H:i') }} - {{ \Carbon\Carbon::parse($zoomSchedule->end_date)->format('H:i') }}

                                        </h6>
                                    </div>
                                </div>
                                <div class="mx-3">
                                    <h6>Link Meet :</h6>
                                    <a href="{{$zoomSchedule->link}}" target="_blank">
                                        {{$zoomSchedule->link}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                        <img src="{{ asset('no data.png') }}" alt="" width="200px" srcset="">
                        <p class="fs-5 text-dark">
                            Belum Ada Jadwal
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="callback-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title px-3" id="staticBackdropLabel">Kirim tanggapan</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" enctype="multipart/form-data" id="form-callback">
          @csrf
          @method('PATCH')
          <div class="modal-body">
              <div class="px-3">
                <label for="callback" class="mb-2">Berikan tanggapan</label>
              <textarea name="callback" id="" rows="5" class="form-control">{{ old('callback') }}</textarea>
              </div>
              <div class="px-3">
                <label for="status_presentation" class="mb-2">Status</label>
                <select name="status_presentation" class="form-select">
                  <option value="ongoing">Sedang Berlangsung</option>
                  <option value="finish">Selesai</option>
                  <option value="notfinish">Tidak Selesai</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light-danger text-danger"
                  data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
      </form>
    </div>
</div>
</div>

<div class="modal fade" id="show-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title px-3" id="staticBackdropLabel">Detail presentasi</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="px-3">
            <h6 class="">Tanggal: </h6>
            <p id="date"></p>
            <h6>Judul presentasi: </h6>
            <p id="title"></p>
            <h6 class="mt-4">Desripsi: </h6>
            <p id="description"></p>
            <h6 class="mt-4">Tanggapan mentor:</h6>
            <p id="callback"></p>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-danger text-danger"
                data-bs-dismiss="modal">Tutup</button>
        </div>
    </div>
</div>
</div>


@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

        $('.show-btn').on('click', function() {
            let id = $(this).data('id');
            let date = $(this).data('date');
            let title = $(this).data('title');
            let description = $(this).data('description');
            let callback = $(this).data('callback');

            $('#date').text(date);
            $('#title').text(title);
            $('#description').text(description);
            $('#callback').text(callback);
            $('#show-modal').modal('show');
        });

        $('.callback-btn').on('click', function() {
          let id = $(this).data('id');
          $('#form-callback').attr('action', '/mentor/presentation/callback/' + id);
          $('#callback-modal').modal('show');
        });

    </script>
@endsection
