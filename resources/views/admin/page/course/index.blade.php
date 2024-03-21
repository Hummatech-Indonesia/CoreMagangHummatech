@extends('admin.layouts.app')
@section('content')


<div class="card">
    <div class="card-body">
        <div class="row g-2 align-items-center">
            <div class="col-sm-4">
                <div class="bg-dark-subtle">
                    <ul class="nav nav-pills custom-nav nav-justified"role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="steparrow-gen-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-gen-info" type="button" role="tab"
                            aria-controls="steparrow-gen-info" aria-controls="steparrow-gen-info" aria-selected="true" data-position="0">
                            Pagi
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="steparrow-description-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-description-info" type="button" role="tab"
                            aria-controls="steparrow-description-info" aria-selected="false" data-position="1" tabindex="-1">
                                Sore
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-experience-tab" data-bs-toggle="pill" data-bs-target="#pills-experience" type="button" role="tab" aria-controls="pills-experience"
                            aria-selected="false" data-position="2" tabindex="-1">
                            Laporan
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-auto ms-auto d-flex justify-content-between ">
                <div class="list-grid-nav hstack gap-1">
                    <button class="btn btn-success mx-3" type="button" data-bs-toggle="modal" data-bs-target="#add">
                        Tambah Data
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@if($errors->all())
<div class="alert alert-danger">
    <h3>Ada Kesalahan</h3>

    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>
@endif




<div class="tab-content">
    <!-- Pagi -->
    <div id="steparrow-gen-info" class="tab-pane fade show active">

        <div class="row row-cols-xxl-6 row-cols-lg-5 row-cols-1 justify-content-center">
            <!-- Senin -->
            <div class="col mx-3">
                <div class="card ribbon-box border shadow-none mb-lg-0">
                    <div class="card-body">
                        <img class="card-img-top img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}" style="object-fit: cover;" alt="Card image cap" />
                        <div class="d-flex justify-content-between px-3" style="margin-top: -27px">
                            <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" class="rounded-circle rounded" width="50px">
                            <div class="px-2 py-1 rounded-2 rounded" style="background: #fff; font-size: 12px;">Website</div>
                        </div>
                        <a href="/siswa-offline/course/detail" style="font-size: 15px" class="text-dark">
                            Tutorial Laravel SPA Menggunakan Blade Template Engine (Splade)
                        </a>
                    <div class="d-flex justify-content-between pt-3">
                        <div class="gap-2 d-flex">
                            <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg" class="mt-1">
                                <path d="M10.554 2.375H17.8013M10.554 5.875H15.0835M10.554 11.125H17.8013M10.554 14.625H15.0835M1.49487 2.375C1.49487 2.14294 1.59032 1.92038 1.76021 1.75628C1.9301 1.59219 2.16052 1.5 2.40078 1.5H6.02442C6.26469 1.5 6.49511 1.59219 6.665 1.75628C6.83489 1.92038 6.93033 2.14294 6.93033 2.375V5.875C6.93033 6.10706 6.83489 6.32962 6.665 6.49372C6.49511 6.65781 6.26469 6.75 6.02442 6.75H2.40078C2.16052 6.75 1.9301 6.65781 1.76021 6.49372C1.59032 6.32962 1.49487 6.10706 1.49487 5.875V2.375ZM1.49487 11.125C1.49487 10.8929 1.59032 10.6704 1.76021 10.5063C1.9301 10.3422 2.16052 10.25 2.40078 10.25H6.02442C6.26469 10.25 6.49511 10.3422 6.665 10.5063C6.83489 10.6704 6.93033 10.8929 6.93033 11.125V14.625C6.93033 14.8571 6.83489 15.0796 6.665 15.2437C6.49511 15.4078 6.26469 15.5 6.02442 15.5H2.40078C2.16052 15.5 1.9301 15.4078 1.76021 15.2437C1.59032 15.0796 1.49487 14.8571 1.49487 14.625V11.125Z" stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <p class="text-muted">5 Tugas</p>
                        </div>
                        <div class="gap-2 d-flex">
                            <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="mt-1">
                                <path d="M10 14.4165C8.74584 13.6924 7.32318 13.3112 5.875 13.3112C4.42682 13.3112 3.00416 13.6924 1.75 14.4165V2.49982C3.00416 1.77573 4.42682 1.39453 5.875 1.39453C7.32318 1.39453 8.74584 1.77573 10 2.49982M10 14.4165C11.2542 13.6924 12.6768 13.3112 14.125 13.3112C15.5732 13.3112 16.9958 13.6924 18.25 14.4165V2.49982C16.9958 1.77573 15.5732 1.39453 14.125 1.39453C12.6768 1.39453 11.2542 1.77573 10 2.49982M10 14.4165V2.49982" stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <p class="text-muted">27 Materi</p>
                        </div>
                    </div>
                </div>
                <button data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-soft-primary w-100 d-flex align-items-center justify-content-center" style="font-size: 18px;">
                    <i class="ri-ball-pen-line mx-2"></i>
                    Edit Siswa
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $(".tambah").select2({
            dropdownParent: $("#add")
        });
    });
    $(document).ready(function() {
        $(".js-example-basic-single").select2({
            dropdownParent: $("#editModal")
        });
    });
</script>
<script>
    var studentSelect = document.getElementById('studentSelect');

    studentSelect.addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];

        // Remove the selected option
        this.removeChild(selectedOption);
    });
</script>

@endsection
