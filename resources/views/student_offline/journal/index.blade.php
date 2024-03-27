@extends('student_offline.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Data Jurnal</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Jurnal</li>
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
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Tambah Jurnal
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/create/jurnal" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <label for="" class="mt-2 mb-2">Judul</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                        <label for="" class="mt-2 mb-2">Bukti</label>
                        <figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
                            <img class="img-thumbnail image-preview" itemprop="thumbnail">
                        </figure>
                        <input type="file" name="image" class="form-control" onchange="preview(event)">
                        @error('image')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                        <label for="" class="mt-2 mb-2">Deskripsi</label>
                        <textarea name="description" id="" class="form-control"></textarea>
                        @error('description')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit"
                            class="btn btn-light-primary text-primary font-medium waves-effect text-start"
                            data-bs-dismiss="modal">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between mb-4">
        <h4>
            Data Jurnal
        </h4>
        <button type="button" class="btn mb-1 btn-light-primary text-primary btn-lg px-4 fs-4 font-medium"
            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Tambah
        </button>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive rounded-2 mb-4">
                <table class="table border text-nowrap customize-table mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Nama</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Tanggal</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Bukti</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Kegiatan</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Aksi</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($journals as $key => $journal)
                            <tr>
                                <td>
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $journal->user->name }}</h6>
                                        <span class="fw-normal">{{ $journal->user->email }}</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 fw-normal fs-4">
                                        {{ \Carbon\Carbon::parse($journal->created_at)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}
                                    </p>
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $journal->image) }}" width="100px"
                                        style="object-fit: cover" alt="" srcset="">
                                </td>
                                <td>
                                    <p class="">
                                        {{ Str::limit($journal->description, 50) }}
                                    </p>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @if ($journal->created_at->isToday())
                                        <button type="button" class="bg-transparent border-0 btn-edit"
                                            data-id="{{ $journal->id }}"
                                            data-title="{{ $journal->title }}"
                                            data-image="{{ asset('storage/'.$journal->image) }}"
                                            data-description="{!! nl2br($journal->description) !!}">
                                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18.6667 5.83335L22.1667 9.33335M10.5011 8.24829C8.45447 8.53989 6.59463 9.59678 5.29668 11.2058C3.99874 12.8148 3.35928 14.8561 3.5073 16.9181C3.65533 18.98 4.57981 20.9091 6.09427 22.3162C7.60873 23.7233 9.60047 24.5037 11.6677 24.5C13.6317 24.5002 15.5299 23.7926 17.0146 22.507C18.4993 21.2214 19.471 19.4438 19.7516 17.5M14 17.5L23.7825 7.6825C24.242 7.22302 24.5001 6.59982 24.5001 5.95C24.5001 5.30019 24.242 4.67699 23.7825 4.2175C23.323 3.75802 22.6998 3.49988 22.05 3.49988C21.4002 3.49988 20.777 3.75802 20.3175 4.2175L10.5 14V17.5H14Z"
                                                    stroke="#FFAA05" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        @endif
                                        <button type="button" class="bg-transparent border-0 btn-detail"
                                            data-id="{{ $journal->id }}"
                                            data-name="{{ $journal->user->name }}"
                                            data-date="{{ $journal->created_at }}"
                                            data-school="{{ $journal->user->student->school }}"
                                            {{-- data-school="{{ $journal->user->school }}" --}}
                                            data-description="{!! br2nl($journal->description) !!}"
                                            data-image="{{ asset('storage/'. $journal->image) }}">
                                            <svg width="29" height="32" viewBox="0 0 29 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_429_487)">
                                                    <path
                                                        d="M13.3228 7.64337C13.8779 7.64337 14.3851 7.68179 14.8446 7.75863L15.4188 7.84508C16.4142 7.97955 17.5149 8.34455 18.7208 8.94008L19.3525 9.25705C19.4865 9.31468 19.6252 9.39633 19.7688 9.50199C19.9124 9.60765 20.0416 9.69889 20.1564 9.77574C20.4053 9.92942 20.7403 10.1696 21.1614 10.4961L21.3337 10.6402C21.6208 10.8707 21.8601 11.0821 22.0515 11.2742L22.8842 12.1098C22.9799 12.2059 23.1521 12.398 23.401 12.6861L23.6307 12.9743C24.1858 13.6082 24.6931 14.2902 25.1525 15.0202L25.3822 15.366C25.7842 16 26.0521 16.4514 26.1861 16.7204C26.2436 16.8164 26.2771 16.8884 26.2866 16.9365C26.2962 16.9845 26.301 17.095 26.301 17.2679C26.301 17.4408 26.2723 17.5944 26.2149 17.7289C26.1766 17.825 26.1096 17.945 26.0139 18.0891C25.9182 18.2332 25.8416 18.3533 25.7842 18.4493C25.1908 19.5251 24.4729 20.5433 23.6307 21.5038L23.401 21.7919C23.1521 22.0801 22.9799 22.2722 22.8842 22.3683L22.0515 23.2039C21.8409 23.4152 21.5921 23.6362 21.305 23.8667L20.8455 24.2125C19.9842 24.9233 18.7495 25.586 17.1416 26.2008C16.5099 26.4313 15.6772 26.6234 14.6436 26.7771C14.3756 26.8155 13.9784 26.8347 13.452 26.8347C12.9256 26.8347 12.5475 26.8251 12.3178 26.8059C12.0307 26.8059 11.734 26.7771 11.4277 26.7195C9.93465 26.4697 8.65215 26.0759 7.5802 25.538C7.23564 25.3651 7.02508 25.2498 6.94851 25.1922L6.6901 25.0481C6.51782 24.9521 6.3934 24.8752 6.31683 24.8176C5.62772 24.3181 5.04389 23.8667 4.56535 23.4633C3.97195 22.9446 3.44554 22.4259 2.98614 21.9072C2.25875 21.0427 1.6462 20.2263 1.14851 19.4579L0.918812 19.1121C0.516832 18.4781 0.248845 18.0267 0.114851 17.7577C0.0574257 17.6617 0.0239274 17.5896 0.0143564 17.5416C0.00478548 17.4936 0 17.3927 0 17.239C0 17.0854 0.00478548 16.9845 0.0143564 16.9365C0.0239274 16.8884 0.0574257 16.8164 0.114851 16.7204C0.248845 16.4514 0.516832 16 0.918812 15.366L1.14851 15.0202C1.66535 14.2134 2.43102 13.2336 3.44554 12.081C3.96238 11.5047 4.57492 10.9476 5.28317 10.4097L5.42673 10.2944C5.56073 10.1792 5.65644 10.1023 5.71386 10.0639C5.88614 9.96784 6.08713 9.83337 6.31683 9.66047C6.3934 9.60284 6.51782 9.526 6.6901 9.42995L6.94851 9.28587C7.17822 9.11297 7.47013 8.94488 7.82426 8.78159C8.17838 8.6183 8.52772 8.48863 8.87228 8.39258C10.1739 8.02758 11.198 7.78745 11.9446 7.67218C12.1168 7.65297 12.5762 7.64337 13.3228 7.64337ZM13.3228 10.0639H12.404C12.1934 10.0639 11.935 10.0927 11.6287 10.1503L11.198 10.2368C10.6812 10.3136 10.1548 10.4577 9.61881 10.669C9.2934 10.8035 8.83399 11.0244 8.24059 11.3318L7.83861 11.5335C7.80033 11.5527 7.71419 11.6103 7.5802 11.7064L7.3505 11.8793C6.77624 12.2635 6.19241 12.7534 5.59901 13.3489C5.19703 13.7523 4.6802 14.319 4.04851 15.049C3.79967 15.3372 3.45512 15.8367 3.01485 16.5475L2.58416 17.239L2.95743 17.8154C3.37855 18.4877 3.68482 18.9488 3.87624 19.1985L3.99109 19.3426C4.60363 20.111 5.09175 20.6777 5.45545 21.0427C6.43168 22.0225 7.5132 22.8101 8.7 23.4056C9.38911 23.7514 10.0974 24.0108 10.8248 24.1837C11.6287 24.3566 12.5092 24.443 13.4663 24.443C13.9449 24.443 14.4426 24.395 14.9594 24.2989C15.2657 24.2221 15.7059 24.1068 16.2802 23.9531L16.3663 23.9243C16.5769 23.8667 16.8832 23.7418 17.2851 23.5497L17.7446 23.3192C18.0125 23.2039 18.338 23.0118 18.7208 22.7429L18.9505 22.5988C19.6396 22.1377 20.2713 21.619 20.8455 21.0427C20.9413 20.9467 21.1231 20.7354 21.3911 20.4088L21.6208 20.1494C21.9845 19.746 22.2477 19.4387 22.4104 19.2273C22.5731 19.016 22.798 18.6798 23.0851 18.2188C23.3149 17.8538 23.4776 17.604 23.5733 17.4696L23.7168 17.239L23.602 17.0661C22.9703 16.1056 22.4726 15.3852 22.1089 14.905C21.5155 14.1173 20.9413 13.4834 20.3861 13.0031C19.3333 12.081 18.3475 11.399 17.4287 10.9572C16.1845 10.3617 14.8158 10.0639 13.3228 10.0639ZM13.1218 13.6371C13.7917 13.6371 14.3851 13.7811 14.902 14.0693C15.3231 14.319 15.7059 14.6744 16.0505 15.1355C16.2611 15.4236 16.4238 15.7214 16.5386 16.0288C16.6535 16.3746 16.7109 16.778 16.7109 17.239C16.7109 17.9114 16.5673 18.5069 16.2802 19.0256C16.0505 19.429 15.6964 19.8133 15.2178 20.1783C14.9307 20.3896 14.6244 20.5481 14.299 20.6537C13.9736 20.7594 13.5908 20.8122 13.1505 20.8122C12.3465 20.8122 11.667 20.6201 11.1119 20.2359C10.6333 19.8901 10.2314 19.4002 9.90594 18.7663C9.67624 18.3052 9.56139 17.7961 9.56139 17.239C9.56139 16.4706 9.77195 15.7886 10.1931 15.1931C10.5376 14.6936 11.0162 14.2902 11.6287 13.9829C12.0881 13.7523 12.5858 13.6371 13.1218 13.6371ZM13.2366 16.0576H12.9782C12.7868 16.0576 12.6002 16.1296 12.4183 16.2737C12.2365 16.4178 12.1168 16.5667 12.0594 16.7204C11.9254 17.1238 11.9493 17.508 12.1312 17.873C12.313 18.238 12.5954 18.4205 12.9782 18.4205H13.3228C13.5716 18.4205 13.8013 18.3148 14.0119 18.1035C14.2224 17.8922 14.3277 17.6617 14.3277 17.4119V17.0661C14.3277 16.8548 14.2224 16.6435 14.0119 16.4322C13.763 16.1825 13.5046 16.0576 13.2366 16.0576Z"
                                                        fill="#5D87FF" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_429_487">
                                                        <rect width="29" height="32" fill="white"
                                                            transform="matrix(1 0 0 -1 0 32)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    Data Masih Kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if (session('error'))
    <script>
            alert('{{ session('error') }}')
            </script>
    @endif
    <div class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Edit Jurnal
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data" id="form-update">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label for="" class="mt-2 mb-2">Judul</label>
                        <input type="text" name="title" id="title-edit" class="form-control">
                        @error('title')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                        <label for="" class="mt-2 mb-2">Bukti</label>
                        <figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
                            <img class="img-thumbnail image-preview" id="image-edit" itemprop="thumbnail">
                        </figure>
                        <input class="form-control @error('image') is-invalid @enderror" id="image" name="image" type="file" onchange="preview(event)">
                        @error('image')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                        <label for="" class="mt-2 mb-2">Deskripsi</label>
                        <textarea name="description" id="description-edit" class="form-control"></textarea>
                        @error('description')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit"
                            class="btn btn-light-primary text-primary font-medium waves-effect text-start"
                            data-bs-dismiss="modal">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade modal-bookmark" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content px-2">
                <div class="modal-header border-bottom">
                    <h5 class="modal-title me-2" id="exampleModalLabel">Detail Jurnal</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-6 text-start" id="detail-content">
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end">
                        <button class="purchase-btn btn btn-hover-effect btn-light-danger text-danger f-w-500" type="button" data-bs-dismiss="modal">Tutup</button>
                    </div>
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
            var title = $(this).data('title');
            var description = $(this).data('description');
            var image = $(this).data('image');
            $('#form-update').attr('action', '/journal/' + id);
            $('#title-edit').val(title);
            $('#description-edit').val(description);
            $('#image-edit').attr('src', image);
            $('#modal-edit').modal('show');
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

        $('.btn-detail').click(function() {
            var detail = $('#detail-content');
            detail.empty();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var date = $(this).data('date');
            var school = $(this).data('school');
            var description = $(this).data('description');
            var image = $(this).data('image');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Nama</h6>');
            detail.append('<p class="text-muted">' + name + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Tanggal</h6>');
            detail.append('<p class="text-muted">' + date + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Sekolah</h6>');
            detail.append('<p class="text-muted">' + school + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Kegiatan</h6>');
            detail.append('<p>' + description + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Bukti</h6>');
            detail.append('<img src="' + image + '" width="100%"></img>')
            detail.append('</div>');
            $('#detail').modal('show');
        });

        $('.btn-delete').click(function () {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/division/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
