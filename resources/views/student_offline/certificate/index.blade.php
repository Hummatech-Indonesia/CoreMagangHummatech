@extends('student_offline.layouts.app')

@section('style')
<style>
.responsive-badge {
    font-size: 12px;
  }

  .responsive-button {
    font-size: 14px;
  }

    .image-container {
                position: relative;
                width: 100%;
            }

            .break-word {
                word-wrap: break-word;
            }

            .image-container img {
                width: 100%;
                height: auto;
            }

            .overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                display: flex;
                justify-content: center;
                align-items: center;
                opacity: 0;
                transition: opacity 0.5s;
            }

            .overlay a {
                color: #fff;
                margin: 0 10px;
                font-size: 20px;
            }

            .overlay a:hover {
                color: #ddd;
            }

            .image-container:hover .overlay {
                opacity: 1;
            }

</style>
<style>
     @media (max-width: 992px) {
    .responsive-badge {
      font-size: 14px;
    }

    .responsive-button {
      padding: 8px 16px;
      font-size: 16px;
    }
  }

  @media (max-width: 768px) {
    .responsive-badge {
      font-size: 12px;
    }

    .responsive-button {
      padding: 7px 14px;
      font-size: 14px;
    }
  }

  @media (max-width: 576px) {
    .responsive-badge {
      font-size: 10px;
    }

    .responsive-button {
      padding: 6px 12px;
      font-size: 12px;
    }
  }
  </style>

@endsection

@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Sertifikat</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Beranda</a></li>
                            <li class="breadcrumb-item" aria-current="page">Sertifikat</li>
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


    <div class="row el-element-overlay">
        @foreach (range(1, 5) as $item)

        <div class="col-lg-3 col-md-6">
            <div class="card overflow-hidden">
                <div class="pt-3 ms-3">
                    <div class="d-flex justify-content-start">
                    </div>
                </div>
                <div class="el-card-item pb-3 mx-3">
                    <div class="d-flex flex-wrap gap-2">
                        <p class="badge bg-primary-subtle text-primary responsive-badge text-break">
                            Di Berikan Pada: 29 Oktober 2023
                        </p>
                    </div>
                    <p id="modalName">
                        <div class="image-container">
                            <img src="{{ asset('assets-user/dist/images/blog/blog-img1.jpg') }}" alt="My Image" style="width: 100%; height: auto;">
                            <div class="overlay">
                                <a href="{{ asset('assets-user/dist/images/blog/blog-img1.jpg') }}" class="image-popup" data-modal-id="showModal_" title="My Image">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ asset('assets-user/dist/images/blog/blog-img1.jpg') }}" download>
                                    <i class="ri-download-2-line"></i>
                                </a>
                            </div>
                        </div>
                    </p>
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <button type="button" class="btn btn-primary mb-1 responsive-button">Download</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>




    {{-- <div class="d-flex flex-wrap  all-category note-important">
        @foreach (range(1, 5) as $item)
        <div class="p-1 col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <p class="badge bg-primary-subtle text-primary" style="font-size: 12px">
                            Di Berikan Pada: 29 Oktober 2023 10:33
                        </p>
                    </div>
                    <p id="modalName">
                        <div class="image-container">
                        <img src="{{ asset('assets-user/dist/images/blog/blog-img1.jpg') }}" alt="My Image"
                                style="width: 100%; height: auto;" class="rounded-2">
                            <div class="overlay">
                                <a href="{{ asset('assets-user/dist/images/blog/blog-img1.jpg') }}" class="image-popup"
                                    data-modal-id="showModal_" title="My Image">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ asset('assets-user/dist/images/blog/blog-img1.jpg') }}" download>
                                    <i class="ri-download-2-line"></i>
                                </a>
                            </div>
                        </div>
                        </p>
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <button type="button" class="btn btn-primary">Download</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        @endforeach
   </div> --}}

@endsection

@section('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

<script>
    $('.image-popup').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        },
        callbacks: {
            beforeOpen: function() {
                var modalId = this.st.el.attr('data-modal-id');
                $('#' + modalId).modal('hide');
            },
            afterClose: function() {
                var modalId = this.st.el.attr('data-modal-id');
                $('#' + modalId).modal('show');
            }
        }
    });
</script>
@endsection
