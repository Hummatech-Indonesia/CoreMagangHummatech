@extends('admin.layouts.app')
@section('content')

<div class="col-sm-4 mt-2 mb-4">
    <h4 class="mx-3">Data Siswa Dibanned</h4>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3 d-flex justify-content-between">
                    <div class="col-sm-auto">
                        <div class="d-flex">
                            <h5 class="mx-2 pt-2">Show</h5>
                            <select name=""class="form-select" id="expiry-month-input">
                                <option value="1">10</option>
                            </select>
                            <h5 class="mx-2 pt-2">entries</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <form action="/students-banned" class="d-flex gap-2 align-items-center">
                            <label for="search">Cari:</label>
                            <input type="text" name="name" value="{{request()->name}}" id="search" class="form-control">
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle table table-nowrap table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Masa Magang</th>
                                <th scope="col">Sekolah</th>
                                <th scope="col">Status Siswa</th>
                                <th scope="col" class="text-center" style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->major }}</td>
                                <td>{{ $student->class }}</td>
                                <td>{{ $student->start_date }} - {{ $student->finish_date }}</td>
                                <td>{{ $student->school }}</td>
                                @if ($student->internship_type == 'online')
                                <td>ONLINE</td>
                                @else
                                <td>OFFLINE</td>
                                @endif
                                <td class="text-center">
                                    <form action="students-banned/Open/{{ $student->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-info shadow-none">Buka Banned</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9">
                                    <div class="d-flex justify-content-center mb-3 mt-3">
                                        <img src="{{ asset('no data.png') }}" width="200px" alt="" srcset="">
                                    </div>
                                    <p class="text-center mb-0 fs-5">
                                        Data Masih Kosong
                                    </p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pt-2">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
