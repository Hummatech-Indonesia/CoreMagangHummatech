@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-4">
                    <h4 class="mx-3">Laporan Piket</h4>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="listjs-table"id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div class="d-flex">
                                    <h5 class="mx-2 pt-2">Show</h5>
                                    <select name=""class="form-select" id="expiry-month-input">
                                        <option value="1">10</option>
                                    </select>
                                    <h5 class="mx-2 pt-2">entries</h5>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-card mt-3 mb-1 mx-3">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr align="center">
                                        <th class="sort" data-sort="number">
                                            NO
                                        </th>
                                        <th class="sort" data-sort="name">
                                            Nama
                                        </th>
                                        <th class="sort" data-sort="date">
                                            Waktu
                                        </th>
                                        <th class="sort" data-sort="date">
                                            Bukti
                                        </th>
                                        <th class="sort" data-sort="description">
                                            Deskripsi
                                        </th>
                                        <th class="sort" data-sort="status">
                                            Status
                                        </th>
                                        <th class="sort" data-sort="action">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @forelse ($picketingReport as $index => $picketingReport)
                                        <tr align="center">
                                            <td class="number">{{++$index}}</td>
                                            <td class="name">{{ $picketingReport->user->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($picketingReport->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $picketingReport->proof) }}" alt="My Image"
                                                    style="max-width: 150px; max-height:150px;">
                                            </td>
                                            <td>{{ Str::limit($picketingReport->description, 60) }}</td>
                                            <td class="status">
                                                <h6>
                                                    <span class="badge bg-{{ $picketingReport->status->color() }}">
                                                        {{ $picketingReport->status->label() }}
                                                    </span>
                                                </h6>
                                            </td>
                                            <td>
                                                <div class="view">
                                                    <button class="btn btn-soft-primary btn-detail"
                                                    data-id="{{$picketingReport->id}}"
                                                    data-proof="{{ asset('storage/' . $picketingReport->proof) }}"
                                                    data-description="{{$picketingReport->description}}"
                                                    data-created_at="{{$picketingReport->created_at}}"
                                                    >
                                                        <i class="ri-eye-line"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <div class="d-flex justify-content-center mb-2 mt-5">
                                                    <img src="{{ asset('no data.png') }}" alt="" width="300px"
                                                        srcset="">
                                                </div>
                                                <p class="fs-5 text-dark text-center">
                                                    Data Masih Kosong
                                                </p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Detail Modal -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">Detail Laporan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <h6 style="color: black;">Hari :</h6>
                    <p id="show-created_at"></p>
                </div>
                <div class="mb-3">
                    <h6 style="color: black;">Bukti :</h6>
                    <img id="show-proof" src="" alt="Proof Image" style="width: 100%; height: auto;">
                </div>
                <div>
                    <h6 style="color: black;">Deskripsi :</h6>
                    <p id="show-description"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>




@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/id.min.js"></script>

<script>
    $(document).ready(function() {
        moment.locale('id'); // Set locale to Indonesian

        $('.btn-detail').click(function() {
            let id = $(this).data('id');
            let proof = $(this).data('proof');
            let created_at = $(this).data('created_at');
            let description = $(this).data('description');

            let formattedDate = moment(created_at).format('dddd, DD MMMM YYYY');

            $('#show-created_at').text(formattedDate);
            $('#show-description').text(description);
            $('#show-proof').attr('src', proof );

            $('#showModal').modal('show');
        });
    });
</script>
@endsection
