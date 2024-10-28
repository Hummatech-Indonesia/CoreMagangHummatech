@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-4">
                    <h3 class="mx-3">Kelola Sesi</h3>
                </div>
            </div>
        </div>
    </div>


    @include('admin.components.delete-modal-component')
@endsection
@section('script')

@endsection
