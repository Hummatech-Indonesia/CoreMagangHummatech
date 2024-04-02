@extends('mentor.layouts.app')
@section('content')

<div class="row mb-3">
    <div class="col-md-4 col-lg-2 col-xl-2">
        <select class="form-select">
            <option selected>Semua</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card h-100">
            <div class="card-header text-bg-primary d-flex align-items-center rounded-top-4">
                <h4 class="card-title text-white mb-0">Belajar Laravel 11</h4>
                <div class="ms-auto d-flex">
                    <span class="mb-1 badge bg-light text-dark">Mendatang</span>
                </div>
            </div>
            <div class="card-body collapse show">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <h6>12 Maret 2024</h6>
                    </div>
                    <div>
                        <h6>08.00 - 09.00</h6>
                    </div>
                </div>
                <div class="mx-3">
                    <h6>Link Meet :</h6>
                    <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ipsam fugiat tenetur.</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card h-100">
            <div class="card-header text-bg-warning d-flex align-items-center rounded-top-4">
                <h4 class="card-title text-white mb-0">Belajar Laravel 11</h4>
                <div class="ms-auto d-flex">
                    <span class="mb-1 badge bg-light text-dark">Berakhir</span>
                </div>
            </div>
            <div class="card-body collapse show">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <h6>12 Maret 2024</h6>
                    </div>
                    <div>
                        <h6>08.00 - 09.00</h6>
                    </div>
                </div>
                <div class="mx-3">
                    <h6>Link Meet :</h6>
                    <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ipsam fugiat tenetur.</a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
