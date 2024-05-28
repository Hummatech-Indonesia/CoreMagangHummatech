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
                @if($histories->whereNotNull('hummatask_team_id')->isEmpty())
                <tr>
                    <td colspan="6">
                        <div class="mb-3 mt-5 text-center" style="margin: 0 auto;">
                            <img src="{{ asset('empty-asset.png') }}" alt="" width="100px" srcset="">
                            <p class="fs-3 text-dark">
                                Belum melakukan presentasi
                            </p>
                        </div>
                    </td>
                </tr>
            @else
                @foreach ($histories as $presentation)
                    <tr>
                        <td>
                            <p class="mb-0 fw-normal fs-4">{{ $loop->iteration }}</p>
                        </td>
                        <td>
                            <p class="mb-0 fw-normal fs-4">{{ $presentation->title }}</p>
                        </td>
                        <td>
                            <p class="mb-0 fw-normal fs-4">{{ \Carbon\Carbon::parse($presentation->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
                        </td>
                        <td>
                            <p class="mb-0 fw-normal fs-4">
                                @if ($presentation)
                                <span class="badge bg-{{$presentation->status_presentation?->color()}}">
                                    {{$presentation->status_presentation?->label()}}
                                </span>
                            @endif
                        </p>
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
                                        <p>Tanggal: {{ \Carbon\Carbon::parse($presentation->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
                                        <hr>
                                        <p>
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
            @endif

            </tbody>
        </table>
    </div>


    <!-- Add presentation -->
    <div class="modal fade" id="addPresentationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="addPresentationForm" action="">

                    <div id="method">
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pengajuan Presentasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <label for="title" class="form-label">Judul Presentasi</label>
                            <input type="text" name="title" id="title" value="{{ isset($presentation->title) ? $presentation->title : '' }}" class="form-control">
                        </div>
                        <div class="pt-3">
                            <label class="mb-3 text-dark form-label">Pilih Jadwal</label>
                            <div class="row">
                                @forelse ($presentations as $key => $presentation)
                                        <div class="col-md-6">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <input class="form-check-input date_range {{ $presentation->hummatask_team_id ? 'disable' : '' }}"
                                                        type="radio" name="date_range" id="date_range_{{ $presentation->id }}"
                                                        value="{{ $presentation->start_date }}"
                                                        data-id="{{ $presentation->id }}"
                                                        data-start-date="{{ $presentation->start_date }}"
                                                        data-schedule-to="{{ $presentation->schedule_to }}"
                                                        data-end-date="{{ $presentation->end_date }}"
                                                        data-hummatask-team-id="{{ $team->id }}">

                                                    <div class="text-center">
                                                        <label for="date_range_{{ $presentation->id }}" class="d-block">{{ $presentation->schedule_to }}</label>
                                                        <label class="form-check-label text-danger d-block" for="date_range_{{ $presentation->id }}">
                                                            {{ $presentation->start_date }} - {{ $presentation->end_date }}
                                                        </label>
                                                        @if ($presentation && $presentation->hummatask_team_id)
                                                            <p class="pt-2 text-muted">Sudah dipilih</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @empty
                                    <div class="mb-3 mt-5 text-center" style="margin: 0 auto;">
                                        <img src="{{ asset('empty-asset.png') }}" alt="" width="100px">
                                        <p class="fs-3 text-dark">Belum ada jadwal</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="">
                            <label for="description" class="form-label">Deskripsi (opsional)</label>
                            <textarea name="description" id="description" cols="15" rows="5" class="form-control" placeholder="Deskripsi opsional">{{ isset($presentation->description) ? $presentation->description : '' }}</textarea>
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
    $(document).on('click', '.date_range', function() {
    const id = $(this).data('id');
    const hummataskTeamId = $(this).data('hummatask-team-id');
    let url = `{{ route('presentation.update', ['slug' => ':slug', 'presentation' => ':presentation']) }}`;
    url = url.replace(':slug', hummataskTeamId).replace(':presentation', id);
    $('#addPresentationForm').attr('method', 'POST');
    $('#addPresentationForm').attr('action', url);
    $('#method').html('@csrf @method('PATCH')');
    });

    document.querySelectorAll('.date_range').forEach(function(radio) {
    radio.addEventListener('change', function() {
        document.querySelectorAll('.date_range').forEach(function(r) {
            r.checked = false;
        });
        this.checked = true;
    });
    });
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addPresentationForm = document.getElementById('addPresentationForm');
        const titleInput = document.getElementById('title');
        const descriptionInput = document.getElementById('description');
        const methodContainer = document.getElementById('method');
        const dateRanges = document.querySelectorAll('.date_range');
        let selectedDateRange = null;

        dateRanges.forEach(function (radio) {
            radio.addEventListener('click', function () {
                const id = this.dataset.id;
                const hummataskTeamId = this.dataset.hummataskTeamId;
                let url = `{{ route('presentation.update', ['slug' => ':slug', 'presentation' => ':presentation']) }}`;
                url = url.replace(':slug', hummataskTeamId).replace(':presentation', id);
                addPresentationForm.setAttribute('method', 'POST');
                addPresentationForm.setAttribute('action', url);
                methodContainer.innerHTML = '@csrf @method('PATCH')';
                selectedDateRange = this.value;
            });
        });

        addPresentationForm.addEventListener('submit', function () {
            const formData = {
                title: titleInput.value,
                date_range: selectedDateRange,
                description: descriptionInput.value
            };
            localStorage.setItem('presentationFormData', JSON.stringify(formData));
        });

        const addPresentationModal = document.getElementById('addPresentationModal');
        addPresentationModal.addEventListener('show.bs.modal', function () {
            const formData = JSON.parse(localStorage.getItem('presentationFormData'));
            if (formData) {
                titleInput.value = formData.title || '';
                if (formData.date_range) {
                    const dateRangeElement = document.querySelector(`input[name="date_range"][value="${formData.date_range}"]`);
                    if (dateRangeElement) {
                        dateRangeElement.checked = true;
                    }
                }
                descriptionInput.value = formData.description || '';
            }
        });
    });
</script>

@endsection
`
