@extends('Hummatask.team.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Presentation</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Board</a></li>
                            <li class="breadcrumb-item" aria-current="page">Presentation</li>
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

    <div class="text-end mb-3">
        <button class="btn btn-primary text-light btn-xs px-4 fs-3 font-medium" data-bs-toggle="modal"
            data-bs-target="#addPresentationModal">Presentasi</button>
    </div>


    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">No</h6>
                    </th>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Judul</h6>
                    </th>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Tanggal</h6>
                    </th>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Status Presentasi</h6>
                    </th>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Jadwal </h6>
                    </th>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Detail</h6>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($presentations->whereNotNull('hummatask_team_id') as $presentation)
                    <tr>
                        <td>
                            <p class="mb-0 fw-normal fs-4">{{ $loop->iteration }}</p>
                        </td>
                        <td>
                            <p class="mb-0 fw-normal fs-4">{{ $presentation->title }}</p>
                        </td>
                        <td>
                            <p class="mb-0 fw-normal fs-4">{{ \Carbon\Carbon::parse($presentation->created_at)->format('j F Y') }}</</p>
                        </td>
                        <td>
                            <p class="mb-0 fw-normal fs-4">{{ $presentation->status_presentation }}</p>
                        </td>
                        <td>
                            <p class="mb-0 fw-normal fs-4">{{ $presentation->schedule_to }}</p>
                        </td>
                        <td>
                            <button class="btn mb-1 waves-effect waves-light btn-warning" data-bs-toggle="modal"
                                data-bs-target="#historyModal{{ $presentation->id }}">
                                <i class="ti ti-eye fs-7"></i>
                            </button>
                        </td>
                    </tr>
                    <!--Detail Modal -->
                    <div class="modal fade" id="historyModal{{ $presentation->id }}" tabindex="-1"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="historyModalLabel">Feedback</h5>
                                    <button type="button" class="close border-0 bg-transparent" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Riwayat Presentasi -->
                                    <div class="mb-3">
                                        <p>Judul Presentasi: {{ $presentation->title }}</p>
                                        <hr>
                                        <p>Tanggal: {{ \Carbon\Carbon::parse($presentation->created_at)->format('j F Y') }}</p>
                                        <hr>
                                        <p>Jadwal :
                                            {{ $presentation->schedule_to }} : {{ $presentation->start_date }} - {{ $presentation->end_date }}
                                        </p>
                                        <hr>
                                        <p>Deskripsi : {{ $presentation->description }}</p>
                                        <hr>
                                        <p>Feedback dari mentor :
                                            {{ $presentation->callback ?? 'Mentor tidak atau belum memberi anda feedback' }}
                                        </p>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>





    <!-- Add presentation -->
    <div class="modal fade" id="addPresentationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addPresentationForm" action="" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pengajuan Presentasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="">
                            <label for="" class="form-label">Judul Presentasi</label>
                            <input type="text" name="title" id="" class="form-control">
                        </div>
                        <div class="">
                            <label class="mb-3" class="form-label">Pilih Jadwal</label>
                            <div class="row">
                                @forelse ($presentations as $key=> $presentation)
                                    <div class="col-md-6">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <input
                                                    class="form-check-input date_range {{ $presentation->hummatask_team_id ? 'disable' : '' }}"
                                                    type="radio" name="date_range" id="date_range"
                                                    value="{{ $presentation->start_date }}"
                                                    data-id="{{ $presentation->id }}"
                                                    data-start-date="{{ $presentation->start_date }}"
                                                    data-schedule-to="{{ $presentation->schedule_to }}"
                                                    data-end-date="{{ $presentation->end_date }}"
                                                    data-hummatask-team-id="{{ $slugs->id }}">
                                                {{-- <input type="hidden" name="hummatask_team_id"
                                                    value="{{ $slugs->id }}"> --}}
                                                <label class="form-check-label"
                                                    for="date_range_{{ $presentation->id }}">{{ $presentation->start_date }}
                                                    -
                                                    {{ $presentation->end_date }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="mb-3 mt-5 text-center" style="margin: 0 auto;">
                                        <img src="{{ asset('empty-asset.png') }}" alt="" width="100px"
                                            srcset="">
                                        <p class="fs-3 text-dark">
                                            Belum ada jadwal
                                        </p>

                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="">
                            <label for="" class="form-label">Deskripsi(opsional)</label>
                            <textarea name="description" id="" cols="15" rows="5" class="form-control"
                                placeholder="deskripi opsional"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script>
    $(document).ready(function(){
        var selectedId = $('input[name="presentation_id"]:checked').val();
        console.log(selectedId);

        $('form').submit(function() {
            var presentationId = $('input[name="presentation_id"]:checked').val();
            if (presentationId) {
                var formAction = "{{ route('presentation.update', ':presentation_id') }}";
                formAction = formAction.replace(':presentation_id', presentationId);
                this.action = formAction;
            }
        });
    });
</script> --}}

    <script>
        $(document).on('click', '#date_range', function() {

            const id = $(this).data('id');
            const scheduleTo = $(this).data('schedule-to');
            const startDate = $(this).data('start-date');
            const endDate = $(this).data('end-date');
            const hummataskTeamId = $(this).data('hummatask-team-id');
            console.log(scheduleTo);
            console.log(id);
            console.log(startDate);
            console.log(endDate);
            console.log(hummataskTeamId);
            let url = `{{ route('presentation.update', ['slug' => ':slug', 'presentation' => ':presentation']) }}`;
            url = url.replace(':slug', hummataskTeamId).replace(':presentation', id);
            $('#addPresentationForm').attr('action', url);


        });


        document.querySelectorAll('.date_range').forEach(function(radio) {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.date_range').forEach(function(r) {
                    r.checked = false;
                });
                this.checked = true;
            });
        });
    </script>
@endsection
`
