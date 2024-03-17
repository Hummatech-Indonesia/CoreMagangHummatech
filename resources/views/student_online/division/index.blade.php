@extends('student_online.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Pilih kelas sesuai minat dan bakat kamu : Perkelas kamu akan di bimbing oleh mentor yang berpengalaman di bidangnya</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="index-2.html">Beranda</a></li>
                            <li class="breadcrumb-item" aria-current="page">Kelas Divisi</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="fs-4 mb-4 text-dark">
        Kelas Divisi
    </p>
    <div class="row">
        <div class="col-md-6 col-lg-4 col-xl-3 col-12">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="{{ asset('assets-user/dist/images/blog/blog-img5.jpg') }}"
                            class="card-img-top rounded-0" alt="..."></a>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_36_894)">
                                    <path
                                        d="M3 17V15.3333C3 14.4493 3.35119 13.6014 3.97631 12.9763C4.60143 12.3512 5.44928 12 6.33333 12H9.66667C10.5507 12 11.3986 12.3512 12.0237 12.9763C12.6488 13.6014 13 14.4493 13 15.3333V17M13.8333 2.10834C14.5503 2.29192 15.1859 2.70892 15.6397 3.29359C16.0935 3.87827 16.3399 4.59736 16.3399 5.3375C16.3399 6.07764 16.0935 6.79673 15.6397 7.3814C15.1859 7.96608 14.5503 8.38308 13.8333 8.56666M18 17V15.3333C17.9958 14.5976 17.7483 13.884 17.2961 13.3037C16.8439 12.7233 16.2124 12.3089 15.5 12.125M4.66667 5.33333C4.66667 6.21738 5.01786 7.06523 5.64298 7.69035C6.2681 8.31547 7.11594 8.66666 8 8.66666C8.88405 8.66666 9.7319 8.31547 10.357 7.69035C10.9821 7.06523 11.3333 6.21738 11.3333 5.33333C11.3333 4.44927 10.9821 3.60143 10.357 2.97631C9.7319 2.35119 8.88405 2 8 2C7.11594 2 6.2681 2.35119 5.64298 2.97631C5.01786 3.60143 4.66667 4.44927 4.66667 5.33333Z"
                                        stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_36_894">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            6 Mentor
                        </div>
                        <div class="d-flex">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_36_894)">
                                    <path
                                        d="M3 17V15.3333C3 14.4493 3.35119 13.6014 3.97631 12.9763C4.60143 12.3512 5.44928 12 6.33333 12H9.66667C10.5507 12 11.3986 12.3512 12.0237 12.9763C12.6488 13.6014 13 14.4493 13 15.3333V17M13.8333 2.10834C14.5503 2.29192 15.1859 2.70892 15.6397 3.29359C16.0935 3.87827 16.3399 4.59736 16.3399 5.3375C16.3399 6.07764 16.0935 6.79673 15.6397 7.3814C15.1859 7.96608 14.5503 8.38308 13.8333 8.56666M18 17V15.3333C17.9958 14.5976 17.7483 13.884 17.2961 13.3037C16.8439 12.7233 16.2124 12.3089 15.5 12.125M4.66667 5.33333C4.66667 6.21738 5.01786 7.06523 5.64298 7.69035C6.2681 8.31547 7.11594 8.66666 8 8.66666C8.88405 8.66666 9.7319 8.31547 10.357 7.69035C10.9821 7.06523 11.3333 6.21738 11.3333 5.33333C11.3333 4.44927 10.9821 3.60143 10.357 2.97631C9.7319 2.35119 8.88405 2 8 2C7.11594 2 6.2681 2.35119 5.64298 2.97631C5.01786 3.60143 4.66667 4.44927 4.66667 5.33333Z"
                                        stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_36_894">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                            27 Materi
                        </div>
                    </div>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold mb-2" href="#">Kelas Web Development</a>
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Quis felis sed turpis metus est habitant turpis id semper.
                        Dictum purus tristique senectus massa quam maecenas.
                    </p>
                    <div class="d-flex justify-content-end gap-4">
                        <a href="#" class="btn btn-primary">Lihat Kelas</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3 col-12">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="{{ asset('assets-user/dist/images/blog/blog-img2.jpg') }}"
                            class="card-img-top rounded-0" alt="..."></a>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_36_894)">
                                    <path
                                        d="M3 17V15.3333C3 14.4493 3.35119 13.6014 3.97631 12.9763C4.60143 12.3512 5.44928 12 6.33333 12H9.66667C10.5507 12 11.3986 12.3512 12.0237 12.9763C12.6488 13.6014 13 14.4493 13 15.3333V17M13.8333 2.10834C14.5503 2.29192 15.1859 2.70892 15.6397 3.29359C16.0935 3.87827 16.3399 4.59736 16.3399 5.3375C16.3399 6.07764 16.0935 6.79673 15.6397 7.3814C15.1859 7.96608 14.5503 8.38308 13.8333 8.56666M18 17V15.3333C17.9958 14.5976 17.7483 13.884 17.2961 13.3037C16.8439 12.7233 16.2124 12.3089 15.5 12.125M4.66667 5.33333C4.66667 6.21738 5.01786 7.06523 5.64298 7.69035C6.2681 8.31547 7.11594 8.66666 8 8.66666C8.88405 8.66666 9.7319 8.31547 10.357 7.69035C10.9821 7.06523 11.3333 6.21738 11.3333 5.33333C11.3333 4.44927 10.9821 3.60143 10.357 2.97631C9.7319 2.35119 8.88405 2 8 2C7.11594 2 6.2681 2.35119 5.64298 2.97631C5.01786 3.60143 4.66667 4.44927 4.66667 5.33333Z"
                                        stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_36_894">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            6 Mentor
                        </div>
                        <div class="d-flex">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_36_894)">
                                    <path
                                        d="M3 17V15.3333C3 14.4493 3.35119 13.6014 3.97631 12.9763C4.60143 12.3512 5.44928 12 6.33333 12H9.66667C10.5507 12 11.3986 12.3512 12.0237 12.9763C12.6488 13.6014 13 14.4493 13 15.3333V17M13.8333 2.10834C14.5503 2.29192 15.1859 2.70892 15.6397 3.29359C16.0935 3.87827 16.3399 4.59736 16.3399 5.3375C16.3399 6.07764 16.0935 6.79673 15.6397 7.3814C15.1859 7.96608 14.5503 8.38308 13.8333 8.56666M18 17V15.3333C17.9958 14.5976 17.7483 13.884 17.2961 13.3037C16.8439 12.7233 16.2124 12.3089 15.5 12.125M4.66667 5.33333C4.66667 6.21738 5.01786 7.06523 5.64298 7.69035C6.2681 8.31547 7.11594 8.66666 8 8.66666C8.88405 8.66666 9.7319 8.31547 10.357 7.69035C10.9821 7.06523 11.3333 6.21738 11.3333 5.33333C11.3333 4.44927 10.9821 3.60143 10.357 2.97631C9.7319 2.35119 8.88405 2 8 2C7.11594 2 6.2681 2.35119 5.64298 2.97631C5.01786 3.60143 4.66667 4.44927 4.66667 5.33333Z"
                                        stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_36_894">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                            27 Materi
                        </div>
                    </div>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold mb-2" href="#">Kelas UI / UX</a>
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Quis felis sed turpis metus est habitant turpis id semper.
                        Dictum purus tristique senectus massa quam maecenas.
                    </p>
                    <div class="d-flex justify-content-end gap-4">
                        <a href="#" class="btn btn-primary">Lihat Kelas</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3 col-12">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="{{ asset('assets-user/dist/images/blog/blog-img1.jpg') }}"
                            class="card-img-top rounded-0" alt="..."></a>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_36_894)">
                                    <path
                                        d="M3 17V15.3333C3 14.4493 3.35119 13.6014 3.97631 12.9763C4.60143 12.3512 5.44928 12 6.33333 12H9.66667C10.5507 12 11.3986 12.3512 12.0237 12.9763C12.6488 13.6014 13 14.4493 13 15.3333V17M13.8333 2.10834C14.5503 2.29192 15.1859 2.70892 15.6397 3.29359C16.0935 3.87827 16.3399 4.59736 16.3399 5.3375C16.3399 6.07764 16.0935 6.79673 15.6397 7.3814C15.1859 7.96608 14.5503 8.38308 13.8333 8.56666M18 17V15.3333C17.9958 14.5976 17.7483 13.884 17.2961 13.3037C16.8439 12.7233 16.2124 12.3089 15.5 12.125M4.66667 5.33333C4.66667 6.21738 5.01786 7.06523 5.64298 7.69035C6.2681 8.31547 7.11594 8.66666 8 8.66666C8.88405 8.66666 9.7319 8.31547 10.357 7.69035C10.9821 7.06523 11.3333 6.21738 11.3333 5.33333C11.3333 4.44927 10.9821 3.60143 10.357 2.97631C9.7319 2.35119 8.88405 2 8 2C7.11594 2 6.2681 2.35119 5.64298 2.97631C5.01786 3.60143 4.66667 4.44927 4.66667 5.33333Z"
                                        stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_36_894">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            6 Mentor
                        </div>
                        <div class="d-flex">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_36_894)">
                                    <path
                                        d="M3 17V15.3333C3 14.4493 3.35119 13.6014 3.97631 12.9763C4.60143 12.3512 5.44928 12 6.33333 12H9.66667C10.5507 12 11.3986 12.3512 12.0237 12.9763C12.6488 13.6014 13 14.4493 13 15.3333V17M13.8333 2.10834C14.5503 2.29192 15.1859 2.70892 15.6397 3.29359C16.0935 3.87827 16.3399 4.59736 16.3399 5.3375C16.3399 6.07764 16.0935 6.79673 15.6397 7.3814C15.1859 7.96608 14.5503 8.38308 13.8333 8.56666M18 17V15.3333C17.9958 14.5976 17.7483 13.884 17.2961 13.3037C16.8439 12.7233 16.2124 12.3089 15.5 12.125M4.66667 5.33333C4.66667 6.21738 5.01786 7.06523 5.64298 7.69035C6.2681 8.31547 7.11594 8.66666 8 8.66666C8.88405 8.66666 9.7319 8.31547 10.357 7.69035C10.9821 7.06523 11.3333 6.21738 11.3333 5.33333C11.3333 4.44927 10.9821 3.60143 10.357 2.97631C9.7319 2.35119 8.88405 2 8 2C7.11594 2 6.2681 2.35119 5.64298 2.97631C5.01786 3.60143 4.66667 4.44927 4.66667 5.33333Z"
                                        stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_36_894">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                            27 Materi
                        </div>
                    </div>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold mb-2" href="#">Kelas Digital Marekting</a>
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Quis felis sed turpis metus est habitant turpis id semper.
                        Dictum purus tristique senectus massa quam maecenas.
                    </p>
                    <div class="d-flex justify-content-end gap-4">
                        <a href="#" class="btn btn-primary">Lihat Kelas</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3 col-12">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="{{ asset('assets-user/dist/images/blog/blog-img4.jpg') }}"
                            class="card-img-top rounded-0" alt="..."></a>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_36_894)">
                                    <path
                                        d="M3 17V15.3333C3 14.4493 3.35119 13.6014 3.97631 12.9763C4.60143 12.3512 5.44928 12 6.33333 12H9.66667C10.5507 12 11.3986 12.3512 12.0237 12.9763C12.6488 13.6014 13 14.4493 13 15.3333V17M13.8333 2.10834C14.5503 2.29192 15.1859 2.70892 15.6397 3.29359C16.0935 3.87827 16.3399 4.59736 16.3399 5.3375C16.3399 6.07764 16.0935 6.79673 15.6397 7.3814C15.1859 7.96608 14.5503 8.38308 13.8333 8.56666M18 17V15.3333C17.9958 14.5976 17.7483 13.884 17.2961 13.3037C16.8439 12.7233 16.2124 12.3089 15.5 12.125M4.66667 5.33333C4.66667 6.21738 5.01786 7.06523 5.64298 7.69035C6.2681 8.31547 7.11594 8.66666 8 8.66666C8.88405 8.66666 9.7319 8.31547 10.357 7.69035C10.9821 7.06523 11.3333 6.21738 11.3333 5.33333C11.3333 4.44927 10.9821 3.60143 10.357 2.97631C9.7319 2.35119 8.88405 2 8 2C7.11594 2 6.2681 2.35119 5.64298 2.97631C5.01786 3.60143 4.66667 4.44927 4.66667 5.33333Z"
                                        stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_36_894">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            6 Mentor
                        </div>
                        <div class="d-flex">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_36_894)">
                                    <path
                                        d="M3 17V15.3333C3 14.4493 3.35119 13.6014 3.97631 12.9763C4.60143 12.3512 5.44928 12 6.33333 12H9.66667C10.5507 12 11.3986 12.3512 12.0237 12.9763C12.6488 13.6014 13 14.4493 13 15.3333V17M13.8333 2.10834C14.5503 2.29192 15.1859 2.70892 15.6397 3.29359C16.0935 3.87827 16.3399 4.59736 16.3399 5.3375C16.3399 6.07764 16.0935 6.79673 15.6397 7.3814C15.1859 7.96608 14.5503 8.38308 13.8333 8.56666M18 17V15.3333C17.9958 14.5976 17.7483 13.884 17.2961 13.3037C16.8439 12.7233 16.2124 12.3089 15.5 12.125M4.66667 5.33333C4.66667 6.21738 5.01786 7.06523 5.64298 7.69035C6.2681 8.31547 7.11594 8.66666 8 8.66666C8.88405 8.66666 9.7319 8.31547 10.357 7.69035C10.9821 7.06523 11.3333 6.21738 11.3333 5.33333C11.3333 4.44927 10.9821 3.60143 10.357 2.97631C9.7319 2.35119 8.88405 2 8 2C7.11594 2 6.2681 2.35119 5.64298 2.97631C5.01786 3.60143 4.66667 4.44927 4.66667 5.33333Z"
                                        stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_36_894">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                            27 Materi
                        </div>
                    </div>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold mb-2" href="#">Kelas Mobile Devloper</a>
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Quis felis sed turpis metus est habitant turpis id semper.
                        Dictum purus tristique senectus massa quam maecenas.
                    </p>
                    <div class="d-flex justify-content-end gap-4">
                        <a href="#" class="btn btn-primary">Lihat Kelas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
