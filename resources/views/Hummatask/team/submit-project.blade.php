@extends('Hummatask.team.layouts.app')
@section('content')
    <div class="card p-4 bg-light-info overflow-hidden shadow-none">
        <div class="d-flex gap-4">
          <div class="description">
            <h4 class="text-primary text-capitalize" style="font-weight: 700">Perhatikan!</h4>
            <p class="m-0">List <span style="font-weight: 800">10</span> tema projek untuk tim anda beserta deskripsinya.</p>
            <p class="m-0">Apabila sudah anda ajukan, silahkan temui mentor anda dan tunggu mentor untuk menyetujui salah satu tema projek yang diajukan tim anda.</p>
            <h6 class="mt-2 text-warning" style="font-weight: 600">Mentor: Test Mentor</h6>
          </div>
        </div>
    </div>
    <div class="card">
        <div class="card-bod p-3">
            <form action="{{ route('project.store', ['slug' => $slugs->slug]) }}" method="post">
                @csrf
                @foreach (range(0, 9) as $key => $item)
                    <div class="row col-12 mb-4">
                        <div class="col-4">
                            <label for="" class="mt-1 mb-1">Tema ke-{{ ++$key }}</label>
                            <input type="text" name="title[]" class="form-control" placeholder="Masukkan Tema"
                                value="{{ old('title*') }}">
                            @error('title*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-8">
                            <label for="" class="mt-1 mb-1">Deskripsi tema ke-{{ $key }}</label>
                            <input type="text" name="description[]" class="form-control" placeholder="Masukkan Deskripsi Tema"
                                value="{{ old('description*') }}">
                            @error('description*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endforeach
                <button type="submit" class="justify-content-center w-100 btn mb-1 btn-rounded btn-info d-flex align-items-center">
                    <i class="ti ti-send fs-4 me-2"></i>
                    Ajukan semua tema
                </button>
            </form>
        </div>
    </div>
@endsection
