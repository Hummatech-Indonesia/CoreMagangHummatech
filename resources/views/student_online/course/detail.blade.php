@extends('student_online.layouts.app')
@section('content')
    <div class="row g-2 mb-4">
        <div class="col-sm-4">
            <h4 class="mx-1">Detail Materi</h4>
        </div>
        <div class="col-sm-auto ms-auto">
            <div class="text-end">
                <a href="{{ url('/siswa-online/materi') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <img alt="{{ $course->title }}" class="img-responsive w-100" src="{{ asset("storage/{$course->image}") }}" />
        </div>
        <div class="col-lg-8 px-4">
            <div class="border-bottom mb-3">
                <h1>{{ $course->title }}</h1>
                <p class="fs-5">{{ $course->description }}</p>
            </div>
            <div class="d-flex gap-5">
                <div class="gap-2 d-flex">
                    <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="mt-1">
                        <path
                            d="M10.554 2.375H17.8013M10.554 5.875H15.0835M10.554 11.125H17.8013M10.554 14.625H15.0835M1.49487 2.375C1.49487 2.14294 1.59032 1.92038 1.76021 1.75628C1.9301 1.59219 2.16052 1.5 2.40078 1.5H6.02442C6.26469 1.5 6.49511 1.59219 6.665 1.75628C6.83489 1.92038 6.93033 2.14294 6.93033 2.375V5.875C6.93033 6.10706 6.83489 6.32962 6.665 6.49372C6.49511 6.65781 6.26469 6.75 6.02442 6.75H2.40078C2.16052 6.75 1.9301 6.65781 1.76021 6.49372C1.59032 6.32962 1.49487 6.10706 1.49487 5.875V2.375ZM1.49487 11.125C1.49487 10.8929 1.59032 10.6704 1.76021 10.5063C1.9301 10.3422 2.16052 10.25 2.40078 10.25H6.02442C6.26469 10.25 6.49511 10.3422 6.665 10.5063C6.83489 10.6704 6.93033 10.8929 6.93033 11.125V14.625C6.93033 14.8571 6.83489 15.0796 6.665 15.2437C6.49511 15.4078 6.26469 15.5 6.02442 15.5H2.40078C2.16052 15.5 1.9301 15.4078 1.76021 15.2437C1.59032 15.0796 1.49487 14.8571 1.49487 14.625V11.125Z"
                            stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="text-muted">{{ $course->countTotalTask() ?? 0 }} Tugas</p>
                </div>
                <div class="gap-2 d-flex">
                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="mt-1">
                        <path
                            d="M10 14.4165C8.74584 13.6924 7.32318 13.3112 5.875 13.3112C4.42682 13.3112 3.00416 13.6924 1.75 14.4165V2.49982C3.00416 1.77573 4.42682 1.39453 5.875 1.39453C7.32318 1.39453 8.74584 1.77573 10 2.49982M10 14.4165C11.2542 13.6924 12.6768 13.3112 14.125 13.3112C15.5732 13.3112 16.9958 13.6924 18.25 14.4165V2.49982C16.9958 1.77573 15.5732 1.39453 14.125 1.39453C12.6768 1.39453 11.2542 1.77573 10 2.49982M10 14.4165V2.49982"
                            stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="text-muted">{{ $course->subCourse?->count() ?? 0 }} Materi</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card my-4 py-3">
        <div class="row g-2 px-4">
            <div class="d-flex g-2 justify-content-between">
                <ul class="nav nav-tabs gap-2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link d-flex active" data-bs-toggle="tab" href="#home2" role="tab">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-book">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                    <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                    <path d="M3 6l0 13" />
                                    <path d="M12 6l0 13" />
                                    <path d="M21 6l0 13" />
                                </svg>
                            </span>
                            <span class="d-none d-md-block ms-2">Materi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" data-bs-toggle="tab" href="#profile2" role="tab">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-list-details">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M13 5h8" />
                                    <path d="M13 9h5" />
                                    <path d="M13 15h8" />
                                    <path d="M13 19h5" />
                                    <path
                                        d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    <path
                                        d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                </svg>
                            </span>
                            <span class="d-none d-md-block ms-2">Tugas</span>
                        </a>
                    </li>
                </ul>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control" id="searchMemberList" placeholder="Cari Materi">
                    <button class="btn btn-primary">Cari</button>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane active" id="home2" role="tabpanel">
            @forelse ($course->subCourse as $subCourse)
                <div class="row">
                    <div class="col-12">
                        <div class="card border-start border-info py-3 px-4">
                            <div class="d-flex no-block align-items-center">
                                <div class="col-lg-1 col-md-10 col-sm-1">
                                    <img class="img-responsive w-100"
                                        src="{{ asset("storage/{$subCourse->image_course}") }}" />
                                </div>
                                <div class="col-lg-9 col-sm-12 px-4">
                                    <h5>{{ $subCourse->title }}</h5>
                                    <p>{{ $subCourse->description }}</p>
                                </div>
                                <div class="ms-auto">
                                    <a href="{{ route('siswa-online.course.subcourse', ['subCourse' => $subCourse->id, 'course' => $course->id]) }}" class="btn btn-light-primary gap-2 d-flex align-items-center text-primary">
                                        Pelajari
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-books">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M5 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                            <path
                                                d="M9 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                            <path d="M5 8h4" />
                                            <path d="M9 16h4" />
                                            <path
                                                d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z" />
                                            <path d="M14 9l4 -1" />
                                            <path d="M16 16l3.923 -.98" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}"
                                alt="No Data" height="150px" width="auto" />
                            <h3>Tidak Ada Data</h3>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
        <div class="tab-pane" id="profile2" role="tabpanel">
            <div class="row">
                <div class="col-12">
                    <div class="card border-start border-info py-3 px-4">
                        <div class="d-flex no-block align-items-center">
                            <div class="col-1">
                                <img class="img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}" />
                            </div>
                            <div class="col-lg-9 px-4">
                                <div class="badge bg-light-success text-success px-4 mb-1" style="font-size: 12px">
                                    low
                                </div>
                                <h5>Lorem ipsum dolor sit amet consectetur. Netus nam porta elit pellentesque accumsan
                                    commodo sed adipiscing turpis integer.</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ipsam fugiat tenetur.
                                </p>
                            </div>
                            <div class="ms-auto">

                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-light-success text-success dropdown text-center px-4"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Selesai
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a href="detail/detail-jawaban" class="dropdown-item btn-show" data-id="1"
                                                data-create="15-03-2024" data-start="15-03-2024" data-end="18-03-2024"
                                                data-description="Lorem ipsum dolor sit amet consectetur. Interdum.."
                                                data-status="Penting">
                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.08333 8.5C7.08333 8.87572 7.23259 9.23606 7.49827 9.50173C7.76394 9.76741 8.12428 9.91667 8.5 9.91667C8.87572 9.91667 9.23606 9.76741 9.50173 9.50173C9.76741 9.23606 9.91667 8.87572 9.91667 8.5C9.91667 8.12428 9.76741 7.76394 9.50173 7.49827C9.23606 7.23259 8.87572 7.08333 8.5 7.08333C8.12428 7.08333 7.76394 7.23259 7.49827 7.49827C7.23259 7.76394 7.08333 8.12428 7.08333 8.5Z"
                                                        stroke="#5A6A85" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M14.875 8.5C13.175 11.3333 11.05 12.75 8.5 12.75C5.95 12.75 3.825 11.3333 2.125 8.5C3.825 5.66667 5.95 4.25 8.5 4.25C11.05 4.25 13.175 5.66667 14.875 8.5Z"
                                                        stroke="#5A6A85" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                Lihat Detail
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item edit-item-btn btn-edit"
                                                data-id="1" data-start="15-03-2024" data-end="18-03-2024"
                                                data-description="Lorem ipsum dolor sit amet consectetur. Interdum.."
                                                data-status="Penting">

                                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.8125 3.43732L10.3125 5.93732M2.8125 8.43732L5.3125 10.9373M1.875 11.8747H4.375L10.9375 5.3122C11.269 4.98068 11.4553 4.53104 11.4553 4.0622C11.4553 3.59336 11.269 3.14372 10.9375 2.8122C10.606 2.48068 10.1563 2.29443 9.6875 2.29443C9.21866 2.29443 8.76902 2.48068 8.4375 2.8122L1.875 9.3747V11.8747ZM13.125 9.37482V11.8748H8.125L10.625 9.37482H13.125Z"
                                                        stroke="#5A6A85" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                Edit Jawaban
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card border-start border-info py-3 px-4">
                    <div class="d-flex no-block align-items-center">
                        <div class="col-1">
                            <img class="img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}" />
                        </div>
                        <div class="col-lg-9 px-4">
                            <div class="badge bg-light-warning text-warning px-4 mb-1" style="font-size: 12px">
                                Medium
                            </div>
                            <h5>Lorem ipsum dolor sit amet consectetur. Netus nam porta elit pellentesque accumsan commodo
                                sed adipiscing turpis integer.</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ipsam fugiat tenetur.</p>
                        </div>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-light-primary text-primary" data-bs-toggle="modal"
                                data-bs-target="#add">
                                Kumpulkan
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-brand-databricks">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 17l9 5l9 -5v-3l-9 5l-9 -5v-3l9 5l9 -5v-3l-9 5l-9 -5l9 -5l5.418 3.01" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card border-start border-info py-3 px-4">
                    <div class="d-flex no-block align-items-center">
                        <div class="col-1">
                            <img class="img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}" />
                        </div>
                        <div class="col-lg-9 px-4">
                            <div class="badge bg-light-danger text-danger px-4 mb-1" style="font-size: 12px">
                                High
                            </div>
                            <h5>Lorem ipsum dolor sit amet consectetur. Netus nam porta elit pellentesque accumsan commodo
                                sed adipiscing turpis integer.</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ipsam fugiat tenetur.</p>
                        </div>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-light-primary text-primary" data-bs-toggle="modal"
                                data-bs-target="#add">
                                Kumpulkan
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-brand-databricks">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 17l9 5l9 -5v-3l-9 5l-9 -5v-3l9 5l9 -5v-3l-9 5l-9 -5l9 -5l5.418 3.01" />
                                </svg>
                            </button>

                            <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex align-items-center">
                                            <h4 class="modal-title" id="myLargeModalLabel">
                                                Kumpulkan Tugas
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="/create/jurnal" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <div class="bg-light-primary rounded-2 p-3">
                                                        <h6 class="mb-0">
                                                            <svg width="20" height="20" viewBox="0 0 26 26"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M20.5837 2.1665C21.4126 2.16646 22.2103 2.48319 22.8134 3.05189C23.4166 3.6206 23.7796 4.39829 23.8282 5.22584L23.8337 5.4165V20.5832C23.8337 21.4121 23.517 22.2098 22.9483 22.813C22.3796 23.4161 21.6019 23.7791 20.7743 23.8278L20.5837 23.8332H5.41699C4.58801 23.8332 3.79035 23.5165 3.18721 22.9478C2.58407 22.3791 2.22104 21.6014 2.17241 20.7738L2.16699 20.5832V5.4165C2.16695 4.58753 2.48368 3.78986 3.05238 3.18672C3.62109 2.58358 4.39877 2.22055 5.22633 2.17192L5.41699 2.1665H20.5837ZM13.0003 11.9165H11.917L11.7902 11.9241C11.5269 11.9554 11.2843 12.0822 11.1082 12.2805C10.9321 12.4787 10.8349 12.7347 10.8349 12.9998C10.8349 13.265 10.9321 13.5209 11.1082 13.7192C11.2843 13.9175 11.5269 14.0443 11.7902 14.0756L11.917 14.0832V17.3332L11.9246 17.4599C11.9531 17.7017 12.0622 17.9269 12.2344 18.0991C12.4066 18.2712 12.6318 18.3804 12.8736 18.4089L13.0003 18.4165H14.0837L14.2104 18.4089C14.4522 18.3804 14.6774 18.2712 14.8496 18.0991C15.0217 17.9269 15.1309 17.7017 15.1594 17.4599L15.167 17.3332L15.1594 17.2064C15.1335 16.9854 15.0402 16.7777 14.8921 16.6116C14.744 16.4455 14.5484 16.329 14.3317 16.278L14.2104 16.2563L14.0837 16.2498V12.9998L14.0761 12.8731C14.0476 12.6313 13.9384 12.4061 13.7662 12.2339C13.5941 12.0618 13.3689 11.9526 13.1271 11.9241L13.0003 11.9165ZM13.0112 8.6665L12.8736 8.67409C12.6103 8.70541 12.3676 8.83221 12.1915 9.03047C12.0154 9.22873 11.9182 9.48468 11.9182 9.74984C11.9182 10.015 12.0154 10.2709 12.1915 10.4692C12.3676 10.6675 12.6103 10.7943 12.8736 10.8256L13.0003 10.8332L13.1379 10.8256C13.4012 10.7943 13.6439 10.6675 13.82 10.4692C13.996 10.2709 14.0933 10.015 14.0933 9.74984C14.0933 9.48468 13.996 9.22873 13.82 9.03047C13.6439 8.83221 13.4012 8.70541 13.1379 8.67409L13.0112 8.6665Z"
                                                                    fill="#5D87FF" />
                                                            </svg>
                                                            Info
                                                        </h6>
                                                        <p class="px-4 mb-0 pb-0">Pengumpulan Tugas Berupa Link Youtube
                                                            Ataupun link yang lain sesuai arahan dari mentor</p>
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <h6>
                                                        <svg width="26" height="26" viewBox="0 0 26 26"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M20.5837 2.1665C21.4126 2.16646 22.2103 2.48319 22.8134 3.05189C23.4166 3.6206 23.7796 4.39829 23.8282 5.22584L23.8337 5.4165V20.5832C23.8337 21.4121 23.517 22.2098 22.9483 22.813C22.3796 23.4161 21.6019 23.7791 20.7743 23.8278L20.5837 23.8332H5.41699C4.58801 23.8332 3.79035 23.5165 3.18721 22.9478C2.58407 22.3791 2.22104 21.6014 2.17241 20.7738L2.16699 20.5832V5.4165C2.16695 4.58753 2.48368 3.78986 3.05238 3.18672C3.62109 2.58358 4.39877 2.22055 5.22633 2.17192L5.41699 2.1665H20.5837ZM13.0003 11.9165H11.917L11.7902 11.9241C11.5269 11.9554 11.2843 12.0822 11.1082 12.2805C10.9321 12.4787 10.8349 12.7347 10.8349 12.9998C10.8349 13.265 10.9321 13.5209 11.1082 13.7192C11.2843 13.9175 11.5269 14.0443 11.7902 14.0756L11.917 14.0832V17.3332L11.9246 17.4599C11.9531 17.7017 12.0622 17.9269 12.2344 18.0991C12.4066 18.2712 12.6318 18.3804 12.8736 18.4089L13.0003 18.4165H14.0837L14.2104 18.4089C14.4522 18.3804 14.6774 18.2712 14.8496 18.0991C15.0217 17.9269 15.1309 17.7017 15.1594 17.4599L15.167 17.3332L15.1594 17.2064C15.1335 16.9854 15.0402 16.7777 14.8921 16.6116C14.744 16.4455 14.5484 16.329 14.3317 16.278L14.2104 16.2563L14.0837 16.2498V12.9998L14.0761 12.8731C14.0476 12.6313 13.9384 12.4061 13.7662 12.2339C13.5941 12.0618 13.3689 11.9526 13.1271 11.9241L13.0003 11.9165ZM13.0112 8.6665L12.8736 8.67409C12.6103 8.70541 12.3676 8.83221 12.1915 9.03047C12.0154 9.22873 11.9182 9.48468 11.9182 9.74984C11.9182 10.015 12.0154 10.2709 12.1915 10.4692C12.3676 10.6675 12.6103 10.7943 12.8736 10.8256L13.0003 10.8332L13.1379 10.8256C13.4012 10.7943 13.6439 10.6675 13.82 10.4692C13.996 10.2709 14.0933 10.015 14.0933 9.74984C14.0933 9.48468 13.996 9.22873 13.82 9.03047C13.6439 8.83221 13.4012 8.70541 13.1379 8.67409L13.0112 8.6665Z"
                                                                fill="#5D87FF" />
                                                        </svg>
                                                        Soal!
                                                    </h6>
                                                    <p class="px-4 ms-1">Lorem ipsum dolor sit amet consectetur. Semper
                                                        phasellus aenean vel dolor purus commodo egestas rhoncus. Magna
                                                        massa nunc id sagittis eget pellentesque ut ullamcorper. Ipsum felis
                                                        aliquam at neque elementum viverra turpis. Facilisis faucibus
                                                        pretium laoreet scelerisque aliquam. Volutpat ante sit iaculis sit
                                                        donec. Amet dictumst lorem in vehicula lorem. Aenean est gravida
                                                        fermentum sed nibh imperdiet. Nullam neque gravida mattis in
                                                        quisque. Massa amet arcu et aliquam justo aliquet vulputate ultrices
                                                        urna. Laoreet eleifend integer ut vitae. Nunc vitae aliquam enim
                                                        vivamus lorem augue egestas ullamcorper. Nulla ut maecenas et varius
                                                        faucibus ultrices viverra mi. Nunc feugiat leo porttitor sem urna
                                                        sed amet.
                                                        Malesuada ornare rhoncus pretium in tristique scelerisque. Sit
                                                        condimentum velit feugiat est felis tempus feugiat non feugiat. Enim
                                                        purus at euismod lectus lobortis placerat sollicitudin.</p>
                                                </div>
                                                <div class="px-4">
                                                    <label for="" class="mt-2 mb-2">Link Tugas</label>
                                                    <input type="url" name="link" class="form-control">
                                                    @error('link')
                                                        <p class="text-danger">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer pe-4 me-2">
                                                <button type="button"
                                                    class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                                                    data-bs-dismiss="modal">
                                                    Tutup
                                                </button>
                                                <button type="submit"
                                                    class="btn btn-primary font-medium waves-effect text-start"
                                                    data-bs-dismiss="modal">
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card border-start border-info py-3 px-4">
                    <div class="d-flex no-block align-items-center">
                        <div class="col-1">
                            <img class="img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}" />
                        </div>
                        <div class="col-lg-9 px-4">
                            <div class="badge bg-light-primary text-primary px-4 mb-1" style="font-size: 12px">
                                Very high
                            </div>
                            <h5>Lorem ipsum dolor sit amet consectetur. Netus nam porta elit pellentesque accumsan commodo
                                sed adipiscing turpis integer.</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ipsam fugiat tenetur.</p>
                        </div>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-light-primary text-primary" data-bs-toggle="modal"
                                data-bs-target="#add">
                                Kumpulkan
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-brand-databricks">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 17l9 5l9 -5v-3l-9 5l-9 -5v-3l9 5l9 -5v-3l-9 5l-9 -5l9 -5l5.418 3.01" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    {{-- modal edit task start --}}
    <div class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Edit Tugas
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="bg-light-primary rounded-2 p-3">
                                <h6 class="mb-0">
                                    <svg width="20" height="20" viewBox="0 0 26 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20.5837 2.1665C21.4126 2.16646 22.2103 2.48319 22.8134 3.05189C23.4166 3.6206 23.7796 4.39829 23.8282 5.22584L23.8337 5.4165V20.5832C23.8337 21.4121 23.517 22.2098 22.9483 22.813C22.3796 23.4161 21.6019 23.7791 20.7743 23.8278L20.5837 23.8332H5.41699C4.58801 23.8332 3.79035 23.5165 3.18721 22.9478C2.58407 22.3791 2.22104 21.6014 2.17241 20.7738L2.16699 20.5832V5.4165C2.16695 4.58753 2.48368 3.78986 3.05238 3.18672C3.62109 2.58358 4.39877 2.22055 5.22633 2.17192L5.41699 2.1665H20.5837ZM13.0003 11.9165H11.917L11.7902 11.9241C11.5269 11.9554 11.2843 12.0822 11.1082 12.2805C10.9321 12.4787 10.8349 12.7347 10.8349 12.9998C10.8349 13.265 10.9321 13.5209 11.1082 13.7192C11.2843 13.9175 11.5269 14.0443 11.7902 14.0756L11.917 14.0832V17.3332L11.9246 17.4599C11.9531 17.7017 12.0622 17.9269 12.2344 18.0991C12.4066 18.2712 12.6318 18.3804 12.8736 18.4089L13.0003 18.4165H14.0837L14.2104 18.4089C14.4522 18.3804 14.6774 18.2712 14.8496 18.0991C15.0217 17.9269 15.1309 17.7017 15.1594 17.4599L15.167 17.3332L15.1594 17.2064C15.1335 16.9854 15.0402 16.7777 14.8921 16.6116C14.744 16.4455 14.5484 16.329 14.3317 16.278L14.2104 16.2563L14.0837 16.2498V12.9998L14.0761 12.8731C14.0476 12.6313 13.9384 12.4061 13.7662 12.2339C13.5941 12.0618 13.3689 11.9526 13.1271 11.9241L13.0003 11.9165ZM13.0112 8.6665L12.8736 8.67409C12.6103 8.70541 12.3676 8.83221 12.1915 9.03047C12.0154 9.22873 11.9182 9.48468 11.9182 9.74984C11.9182 10.015 12.0154 10.2709 12.1915 10.4692C12.3676 10.6675 12.6103 10.7943 12.8736 10.8256L13.0003 10.8332L13.1379 10.8256C13.4012 10.7943 13.6439 10.6675 13.82 10.4692C13.996 10.2709 14.0933 10.015 14.0933 9.74984C14.0933 9.48468 13.996 9.22873 13.82 9.03047C13.6439 8.83221 13.4012 8.70541 13.1379 8.67409L13.0112 8.6665Z"
                                            fill="#5D87FF" />
                                    </svg>
                                    Info
                                </h6>
                                <p class="px-4 mb-0 pb-0">Pengumpulan Tugas Berupa Link Youtube Ataupun link yang lain
                                    sesuai arahan dari mentor</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <h6>
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.5837 2.1665C21.4126 2.16646 22.2103 2.48319 22.8134 3.05189C23.4166 3.6206 23.7796 4.39829 23.8282 5.22584L23.8337 5.4165V20.5832C23.8337 21.4121 23.517 22.2098 22.9483 22.813C22.3796 23.4161 21.6019 23.7791 20.7743 23.8278L20.5837 23.8332H5.41699C4.58801 23.8332 3.79035 23.5165 3.18721 22.9478C2.58407 22.3791 2.22104 21.6014 2.17241 20.7738L2.16699 20.5832V5.4165C2.16695 4.58753 2.48368 3.78986 3.05238 3.18672C3.62109 2.58358 4.39877 2.22055 5.22633 2.17192L5.41699 2.1665H20.5837ZM13.0003 11.9165H11.917L11.7902 11.9241C11.5269 11.9554 11.2843 12.0822 11.1082 12.2805C10.9321 12.4787 10.8349 12.7347 10.8349 12.9998C10.8349 13.265 10.9321 13.5209 11.1082 13.7192C11.2843 13.9175 11.5269 14.0443 11.7902 14.0756L11.917 14.0832V17.3332L11.9246 17.4599C11.9531 17.7017 12.0622 17.9269 12.2344 18.0991C12.4066 18.2712 12.6318 18.3804 12.8736 18.4089L13.0003 18.4165H14.0837L14.2104 18.4089C14.4522 18.3804 14.6774 18.2712 14.8496 18.0991C15.0217 17.9269 15.1309 17.7017 15.1594 17.4599L15.167 17.3332L15.1594 17.2064C15.1335 16.9854 15.0402 16.7777 14.8921 16.6116C14.744 16.4455 14.5484 16.329 14.3317 16.278L14.2104 16.2563L14.0837 16.2498V12.9998L14.0761 12.8731C14.0476 12.6313 13.9384 12.4061 13.7662 12.2339C13.5941 12.0618 13.3689 11.9526 13.1271 11.9241L13.0003 11.9165ZM13.0112 8.6665L12.8736 8.67409C12.6103 8.70541 12.3676 8.83221 12.1915 9.03047C12.0154 9.22873 11.9182 9.48468 11.9182 9.74984C11.9182 10.015 12.0154 10.2709 12.1915 10.4692C12.3676 10.6675 12.6103 10.7943 12.8736 10.8256L13.0003 10.8332L13.1379 10.8256C13.4012 10.7943 13.6439 10.6675 13.82 10.4692C13.996 10.2709 14.0933 10.015 14.0933 9.74984C14.0933 9.48468 13.996 9.22873 13.82 9.03047C13.6439 8.83221 13.4012 8.70541 13.1379 8.67409L13.0112 8.6665Z"
                                        fill="#5D87FF" />
                                </svg>
                                Soal!
                            </h6>
                            <p class="px-4 ms-1">Lorem ipsum dolor sit amet consectetur. Semper phasellus aenean vel dolor
                                purus commodo egestas rhoncus. Magna massa nunc id sagittis eget pellentesque ut
                                ullamcorper. Ipsum felis aliquam at neque elementum viverra turpis. Facilisis faucibus
                                pretium laoreet scelerisque aliquam. Volutpat ante sit iaculis sit donec. Amet dictumst
                                lorem in vehicula lorem. Aenean est gravida fermentum sed nibh imperdiet. Nullam neque
                                gravida mattis in quisque. Massa amet arcu et aliquam justo aliquet vulputate ultrices urna.
                                Laoreet eleifend integer ut vitae. Nunc vitae aliquam enim vivamus lorem augue egestas
                                ullamcorper. Nulla ut maecenas et varius faucibus ultrices viverra mi. Nunc feugiat leo
                                porttitor sem urna sed amet.
                                Malesuada ornare rhoncus pretium in tristique scelerisque. Sit condimentum velit feugiat est
                                felis tempus feugiat non feugiat. Enim purus at euismod lectus lobortis placerat
                                sollicitudin.</p>
                        </div>
                        <div class="px-4">
                            <label for="" class="mt-2 mb-2">Link Tugas</label>
                            <input type="url" name="link" class="form-control">
                            @error('link')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer pe-4 me-2">
                        <button type="button"
                            class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                            data-bs-dismiss="modal">
                            Tutup
                        </button>
                        <button type="submit" class="btn btn-primary font-medium waves-effect text-start"
                            data-bs-dismiss="modal">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal edit task end --}}
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            $('#form-update').attr('action', '/material/' + id);
            $('#modal-edit').modal('show');
        });

        function preview(event) {
            var input = event.target;
            var previewImages = document.getElementsByClassName('image-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
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

        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/division/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
