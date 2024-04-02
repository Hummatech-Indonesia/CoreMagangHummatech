@extends('student_offline.layouts.app')
@section('style')
<style>
    /* Penyesuaian untuk layar desktop */
    @media (min-width: 992px) {
        .btn-desktop {
            padding: 4px 8px; /* Padding lebih kecil untuk desktop */
            font-size: 12px; /* Ukuran font lebih kecil untuk desktop */
        }
    }
</style>
@endsection
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Detail Pembelian</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Pembelian</a></li>
                            <li class="breadcrumb-item" aria-current="page">Detail Pembelian</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets-user/dist/images/backgrounds/track-bg.png') }}" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shop-detail">
        <div class="card shadow-none border">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{ asset('assets-user/dist/images/nft/3.jpg') }}" alt="" class="img-fluid rounded-2 mb-3" style="width: 500px">
                    </div>
                    <div class="col-lg-8">
                        <div class="shop-content">
                            <h4 class="fw-semibold mb-3">Lorem ipsum dolor sit amet consectetur. Egestas mattis amet ridiculus vivamus vel pretium purus purus faucibus.</h4>
                            <p class="mb-3">
                                Lorem ipsum dolor sit amet consectetur. Eget nibh sit ligula tempus curabitur. Suspendisse faucibus viverra nisl aliquet dictum.
                                Sed purus adipiscing volutpat a. Eget amet viverra eu pellentesque elementum vitae eget elit faucibus. Aliquet nibh ac non in vulputate ipsum tincidunt.
                            </p>
                            <span>
                                <i class="ti ti-book text-primary"></i>
                                27 Materi
                            </span>
                            <div class="d-flex align-items-center gap-7 border-top py-2 mt-2 border-bottom">
                                <h6 class="mb-0 fs-4 fw-semibold">Kategori : </h6>
                                <span class="mb-1 badge font-medium bg-light-warning text-warning">Website</span>
                            </div>
                            <div class="d-flex align-items-center gap-3 pt-5 mb-7">
                                <h4 class="text-primary">Rp.299.000.000</h4>
                                <a href="javascript:void(0)" class="btn d-block btn-primary px-4 mx-4 py-2 mb-2 mb-sm-0 w-80">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane active" id="task" role="tabpanel">
        <div class="all-category note-important">
            <div class="d-flex align-items-center mb-3 pt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-info-square text-primary">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M19 2a3 3 0 0 1 2.995 2.824l.005 .176v14a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-14a3 3 0 0 1 2.824 -2.995l.176 -.005h14zm-7 9h-1l-.117 .007a1 1 0 0 0 0 1.986l.117 .007v3l.007 .117a1 1 0 0 0 .876 .876l.117 .007h1l.117 -.007a1 1 0 0 0 .876 -.876l.007 -.117l-.007 -.117a1 1 0 0 0 -.764 -.857l-.112 -.02l-.117 -.006v-3l-.007 -.117a1 1 0 0 0 -.876 -.876l-.117 -.007zm.01 -3l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" />
                </svg>
                <h5 class="mb-0 ms-2">Sub Materi Yang Ada Didalamnya</h5>
            </div>
            <div class="d-flex flex-wrap">
                @foreach (range(1, 4) as $item)
                <div class="col-lg-12">
                    <div class="card border-start border-info">
                      <div class="card-body px-4 py-3">
                        <div class="d-flex no-block align-items-center">
                          <div class="">
                            <span class="d-flex display-6">
                                <img src="{{ asset('assets/images/materi-1.png') }}"style="width: 6.7pc; height: 6.7pc; object-fit: cover;">
                                <div class="px-3 pe-5">
                                    <div class="d-flex gap-2">
                                        <i class="text-primary ti ti-list-details fs-6"></i>
                                        <p class="text-muted" style="font-size: 15px">5 Tugas</p>
                                    </div>
                                    <h5>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus debitis molestiae, distinctio obcaecati repellat veritatis labore.
                                    </h5>
                                    <h6 class="text-muted">
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil, error.
                                    </h6>
                                </div>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                {{-- <div class="p-1 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('assets-user/dist/images/crypto/c2.jpg') }}" alt="Deskripsi Gambar" class="img-fluid mb-3 rounded-2">
                            <div class="d-flex flex-wrap gap-2">
                                <h6 class=" text-info" style="font-size: 18px">
                                    Rp.299.999
                                </h6>
                            </div>
                            <h4>Lorem ipsum dolor sit, amet consectetur adipisicing.</h4>
                            <p class="text-mute">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda inventore molestias necessitatibus nisi.
                            </p>
                            <div class="d-flex">
                                <a href="{{ url('siswa-offline/purchase/detail') }}" class="btn btn-sm btn-rounded btn-outline-primary w-100">
                                    Lihat Detail
                                </a>
                                <a href="{{ url('siswa-offline/purchase/detail') }}" class="btn btn-sm btn-primary w-100 mx-2">
                                    Beli Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                @endforeach
            </div>
        </div>
    </div>
@endsection
