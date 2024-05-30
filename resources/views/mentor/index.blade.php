@extends('mentor.layouts.app')
@section('content')
    <div class="row flex-wrap">
        <div class="col-lg-8">
            <div class=" d-flex align-items-stretch">
                <div class="card w-100 bg-light-info overflow-hidden shadow-none">
                    <div class="card-body position-relative">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="d-flex align-items-center mb-3 flex-column flex-sm-row">
                                    <div class="d-flex align-items-center justify-content-center overflow-hidden me-sm-6 mb-3 mb-sm-0"
                                        style="width: 40px; height: 40px;">
                                        {{-- <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" alt="" class="img-fluid rounded-circle" style="object-fit: cover;"> --}}
                                        @if (auth()->user()->mentor && !empty(auth()->user()->mentor->mentor))
                                            @php
                                                $avatarPath = 'storage/' . auth()->user()->mentor->mentor;
                                                $avatarExists = file_exists(public_path($avatarPath));
                                            @endphp

                                            @if ($avatarExists)
                                                <img src="{{ asset($avatarPath) }}" class="rounded-circle" width="35"
                                                    height="35" alt="" />
                                            @else
                                                <img src="{{ asset('user.webp') }}" class="rounded-circle" width="35"
                                                    height="35" alt="" />
                                            @endif
                                        @else
                                            <img src="{{ asset('user.webp') }}" class="rounded-circle" width="35"
                                                height="35" alt="" />
                                        @endif
                                    </div>
                                    <h5 class="fw-semibold mb-3 mb-sm-0 fs-5 text-center text-sm-start">Selamat Datang
                                        {{ auth()->user()->name }}!</h5>
                                </div>
                                <div class="d-flex align-items-center mt-4">
                                    <div class="border-end pe-4 border-muted border-opacity-10">
                                        <h4>Mentor {{ auth()->user()->mentor->division->name}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="welcome-bg-img mb-n7 text-end">
                                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/welcome-bg.svg"
                                        alt="" class="img-fluid" style="width: 300px; height: auto;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-body">
                <h4>Siswa</h4>
                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item">
                            <tr>
                                <th>Siswa</th>
                                <th>Email</th>
                                <th>Sekolah</th>
                                <th>No. Hp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mentorStudent as $student)
                                <tr class="search-items">
                                    <td class="d-flex">
                                        <div class="n-chk align-self-center text-center">
                                            {{-- <img src="{{ asset('storage/' . $student->student->avatar) }}" alt="avatar" class="rounded-circle" width="35" height="35"> --}}
                                            @if (Storage::disk('public')->exists($student->student->avatar))
                                                <img src="{{ asset('storage/' . $student->student->avatar) }}"
                                                    alt="avatar" class="rounded-circle" width="35" height="35">
                                            @else
                                                <img src="{{ asset('user.webp') }}" alt="default avatar"
                                                    class="rounded-circle" width="35" height="35">
                                            @endif
                                        </div>
                                        <div class="ms-3">
                                            <div class="user-meta-info">
                                                <h6 class="user-name mb-0" data-name="Emma Adams">
                                                    {{ $student->student->name }}</h6>
                                                <span class="user-work fs-3"
                                                    data-occupation="Web Developer">{{ $student->student->division->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="usr-email-addr">{{ $student->student->email }}</h6>
                                    </td>
                                    <td>
                                        <h6>{{ $student->student->school }}</h6>
                                    </td>
                                    <td>
                                        <h6>{{ $student->student->phone }}</h6>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada siswa</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="">
                        {{ $mentorStudent->links() }}
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card bg-light-warning shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="round rounded bg-warning d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-backpack"
                                        style="color: white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M5 18v-6a6 6 0 0 1 6 -6h2a6 6 0 0 1 6 6v6a3 3 0 0 1 -3 3h-8a3 3 0 0 1 -3 -3z" />
                                        <path d="M10 6v-1a2 2 0 1 1 4 0v1" />
                                        <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                                        <path d="M11 10h2" />
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <h3 class="mb-0 fw-semibold fs-5">{{ $countCourse }} materi</h3>
                                <span class="fw-bold">materi</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card bg-light-success shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="round rounded bg-success d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-month"
                                        style="color: white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                        <path d="M16 3v4" />
                                        <path d="M8 3v4" />
                                        <path d="M4 11h16" />
                                        <path d="M7 14h.013" />
                                        <path d="M10.01 14h.005" />
                                        <path d="M13.01 14h.005" />
                                        <path d="M16.015 14h.005" />
                                        <path d="M13.015 17h.005" />
                                        <path d="M7.01 17h.005" />
                                        <path d="M10.01 17h.005" />
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <h3 class="mb-0 fw-semibold fs-5">{{$jumlahSiswa}} Siswa</h3>
                                <span class="fw-bold">Siswa</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="col-lg-12 col-md-12 col-sm-12 mb-4 col-12">
                <h5 class="mb-3">Jadwal Hari Ini</h5>
                @forelse ($processedSchedule as $zoomSchedule)
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

@endsection
