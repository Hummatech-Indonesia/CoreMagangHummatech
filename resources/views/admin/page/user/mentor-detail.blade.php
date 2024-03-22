@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mt-1">Data Mentor</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center py-4">
                        <div class="">
                            <img src="{{ asset('storage/' . $mentor->image) }}" alt=""
                                class="rounded-circle img-thumbnail avatar-lg">
                        </div>
                    </div>
                    <div class="text-center ">
                        <h5 class="mb-1">{{ $mentor->name }}</h5>
                        <p class="mb-1 badge bg-secondary-subtle text-secondary " style="font-size: 12px">
                            {{ $mentor->division->name }}</p>
                        <p class="mb-3 text-primary" style="font-size: 15px"><i
                                class="ri-mail-line me-1"></i>{{ $mentor->email }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header align-items-center d-flex justify-content-between mx-3">
                            <h5 class="card-title mb-0">SIswa</h5>
                        </div><!-- end card header -->

                        <div class="card-body mx-3">
                            <div class="live-preview ">
                                <div class="table-responsive table-card">
                                    <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Sekolah</th>
                                                <th scope="col">Jenis magang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($mentor->mentorstudent as $student)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $student->student->name }}</td>
                                                    <td>{{ $student->student->email }}</td>
                                                    <td>{{ $student->student->school }}</td>
                                                    <td>
                                                        <span class="badge bg-secondary-subtle text-secondary">
                                                            {{ $student->student->internship_type }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        Tidak ada siswa
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
