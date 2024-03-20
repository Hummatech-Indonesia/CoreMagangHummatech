@extends('mentor.layouts.app')
@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header text-bg-info d-flex align-items-center">
                  <h4 class="card-title text-white mb-0">Belajar LARAVEL11</h4>
                  <div class="card-actions cursor-pointer ms-auto d-flex button-group">
                    <a href="javascript:void(0)" class="link text-white d-flex align-items-center" data-action="collapse"><i class="ti ti-minus fs-6"></i></a>
                    <a href="javascript:void(0)" class="mb-0 btn-minimize px-2 cursor-pointer text-white link d-flex align-items-center" data-action="expand"><i class="ti ti-arrows-maximize fs-6"></i></a>
                    <a href="javascript:void(0)" class="mb-0 link d-flex text-white align-items-center pe-0 cursor-pointer" data-action="close">
                      <i class="ti ti-x fs-6"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body collapse show">
                  <h4 class="card-title">Special title treatment</h4>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                </div>
              </div>
        </div>
    </div>
@endsection
