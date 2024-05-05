@extends('Hummatask.team.layouts.app')
@section('content')

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Catatan</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Board</a></li>
                        <li class="breadcrumb-item" aria-current="page">Catatan</li>
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

<div class="container-fluid note-has-grid">
    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
        <li class="nav-item">
            <a data-bs-toggle="tab" href="#task" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 text-body-color" id="all-category">
                <i class="ti ti-list-details"></i>
                <span class="d-none d-md-block font-weight-medium">Catatan Tim</span>
            </a>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="tab" href="#done" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color" id="note-business">
                <i class="ti ti-list-details mx-2"></i>
                <span class="d-none d-md-block font-weight-medium">Catatan Revisi</span>
            </a>
        </li>
        <li class="nav-item ms-auto">
            <div class="row g-3 align-items-center">
                <button class="btn me-1 mb-1 btn-info text-light btn-lg px-4 fs-4 font-medium" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg">
                    <i class="ti ti-file fs-4"></i>
                    Buat Catatan</button>
            </div>
        </li>
    </ul>


<!-- Add Note -->
<div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Catatan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="judulCatatan" placeholder="Judul" required>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kategori" id="radio1" value="option1" checked>
                            <label class="form-check-label" for="radio1">
                                Catatan Tim
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kategori" id="radio2" value="option2">
                            <label class="form-check-label" for="radio2">
                                Catatan Revisi
                            </label>
                        </div>
                    </div>

                    <div class="mb-3 mt-0 col-md-12">
                        <input class="form-control" type="text" name="mission[]" required=""
                            autocomplete="name" placeholder="Catatan" />
                        @error('mission.*')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div id="product-listing"></div>

                        <button type="button" class="btn add-button-trigger btn-primary mt-3">Tambah</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    <div class="tab-content">
        <div class="tab-pane active" id="task" role="tabpanel">
            <div class="row">
                @foreach (range(1,4) as $item)

                <div class="col-md-4 single-note-item all-category" style>
                    <div class="card card-body">
                        <span class="side-stick"></span>
                        <h6 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">
                            Book a Ticket for Movie
                        </h6>
                        <p class="note-date fs-2">11 March 2009</p>
                        <div class="note-content">
                            <h6>Catatan 1</h6>
                            <p class="note-inner-content" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis." >
                                Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.....
                            </p>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="#" class="link me-1" data-bs-toggle="modal" data-bs-target="#editNoteModal">
                                <i class="ti ti-pencil fs-5 favourite-note text-warning"></i>
                            </a>

                            <a href="" class="link text-danger ms-2">
                                <i class="ti ti-trash fs-5 remove-note"></i>
                            </a>
                            <div class="ms-auto">
                                <div class="category-selector btn-group">
                                    <button type="button" class="btn mb-1 waves-effect waves-light btn-rounded btn-light-primary text-primary" data-bs-toggle="modal" data-bs-target="#detailModal">
                                        <i class="ti ti-eye fs-5"></i>
                                    </button>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="tab-pane" id="done" role="tabpanel">
            <div class="row">
                @foreach (range(1,4) as $item)

                <div class="col-md-4 single-note-item all-category" style>
                    <div class="card card-body">
                        <span class="side-stick"></span>
                        <h6 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">
                            Book a Ticket for Movie
                        </h6>
                        <p class="note-date fs-2">11 March 2009</p>
                        <div class="note-content">
                            <h6>Catatan 1</h6>
                            <p class="note-inner-content" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis." >
                                Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.....
                            </p>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="#" class="link me-1" data-bs-toggle="modal" data-bs-target="#editNoteModal">
                                <i class="ti ti-pencil fs-5 favourite-note text-warning"></i>
                            </a>
                            <a href="" class="link text-danger ms-2">
                                <i class="ti ti-trash fs-5 remove-note"></i>
                            </a>
                            <div class="ms-auto">
                                <div class="category-selector btn-group">
                                    <button type="button" class="btn mb-1 waves-effect waves-light btn-rounded btn-light-primary text-primary" data-bs-toggle="modal" data-bs-target="#detailModal">
                                        <i class="ti ti-eye fs-5"></i>
                                    </button>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editNoteModal" tabindex="-1" aria-labelledby="editNoteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editNoteModalLabel">Edit Catatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="judulCatatan" placeholder="Judul" required>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="radio1" value="option1" checked>
                                <label class="form-check-label" for="radio1">
                                    Catatan Tim
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="radio2" value="option2">
                                <label class="form-check-label" for="radio2">
                                    Catatan Revisi
                                </label>
                            </div>
                        </div>

                        <div class="mb-3 mt-0 col-md-12">
                            <input class="form-control" type="text" name="mission[]" required=""
                                autocomplete="name" placeholder="Catatan" />
                            @error('mission.*')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <div id="product-listing"></div>

                            <button type="button" class="btn add-button-trigger btn-primary mt-3">Tambah</button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Catatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="text-center">Judul</h6>
                    <h4 class="text-center">P Balap Keong</h4>

                    <div class="card">
                        <div class="card-body">
                            <h5>Catatan 1</h5>
                            <p>Lorem ipsum dolor sit amet consectetur. A consectetur imperdiet ipsum volutpat arcu sit. Consequat in imperdiet eu ac dignissim arcu non ut mattis nunc urna posuere dignissim nulla.</p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


  </div>

</div>



@endsection

@section('script')
<script>
    const deleteElement = (id) => $('#' + id).remove();

    $('.add-button-trigger').click((e) => {
        let idInput = 'input_' + Math.random().toString(36).substr(2, 9); // Generate random id
        let target = $(e.target).parents('.modal').find('#product-listing');
        target.append(`<div class="d-flex align-items-center mt-3 gap-2" id="${idInput}">
            <input class="form-control" type="text" name="fiturs[]" autocomplete="name" placeholder="Jelaskan fitur produknya" />
            <button onclick="deleteElement('${idInput}')" type="button" class="btn delete-trigger px-3 mt-0 btn-danger"><i
                    class="fas fa-trash"></i></button>
        </div>`);
    });

    $('.btn-close').click((e) => {
        let target = $(e.target).parent('.modal').find('.delete-trigger');
        target.each((i, el) => $(el).click());
    });
</script>

@endsection
