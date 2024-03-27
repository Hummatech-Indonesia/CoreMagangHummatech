@extends('student_offline.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Tata Tertib</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Tata Tertib</li>
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

<div class="row">
    <div class="col-lg-6 mb-3">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Lorem ipsum dolor sit amet consectetur pellentesque.
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style>
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong>
                        Lorem ipsum dolor sit amet consectetur. Sodales metus nunc amet quam facilisi facilisis sagittis feugiat.
                        In commodo purus viverra vel diam nec pellentesque. Eleifend praesent porttitor mattis dictum ut pellentesque varius nullam id cras pellentesque.
                    </div>
                </div>
            </div>
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="heading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        Lorem ipsum dolor sit amet consectetur pellentesque.
                    </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionExample" style>
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong>
                        Lorem ipsum dolor sit amet consectetur. Sodales metus nunc amet quam facilisi facilisis sagittis feugiat.
                        In commodo purus viverra vel diam nec pellentesque. Eleifend praesent porttitor mattis dictum ut pellentesque varius nullam id cras pellentesque.
                    </div>
                </div>
            </div>
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="heading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        Lorem ipsum dolor sit amet consectetur pellentesque.
                    </button>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample" style>
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong>
                        Lorem ipsum dolor sit amet consectetur. Sodales metus nunc amet quam facilisi facilisis sagittis feugiat.
                        In commodo purus viverra vel diam nec pellentesque. Eleifend praesent porttitor mattis dictum ut pellentesque varius nullam id cras pellentesque.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-3">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Lorem ipsum dolor sit amet consectetur pellentesque.
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style>
                    <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur. Sodales metus nunc amet quam facilisi facilisis sagittis feugiat.
                        In commodo purus viverra vel diam nec pellentesque. Eleifend praesent porttitor mattis dictum ut pellentesque varius nullam id cras pellentesque.
                    </div>
                </div>
            </div>
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="flush-heading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                        Lorem ipsum dolor sit amet consectetur pellentesque.
                    </button>
                </h2>
                <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2" data-bs-parent="#accordionFlushExample" style>
                    <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur. Sodales metus nunc amet quam facilisi facilisis sagittis feugiat.
                        In commodo purus viverra vel diam nec pellentesque. Eleifend praesent porttitor mattis dictum ut pellentesque varius nullam id cras pellentesque.
                    </div>
                </div>
            </div>
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="flush-heading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                        Lorem ipsum dolor sit amet consectetur pellentesque.
                    </button>
                </h2>
                <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3" data-bs-parent="#accordionFlushExample" style>
                    <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur. Sodales metus nunc amet quam facilisi facilisis sagittis feugiat.
                        In commodo purus viverra vel diam nec pellentesque. Eleifend praesent porttitor mattis dictum ut pellentesque varius nullam id cras pellentesque.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
