@extends('admin.layouts.app')
@section('content')
    <div class="text-end mb-4">
        <a href="/administrator/course/detail" class="btn text-white" style="background-color: #7E7E7E;">Kembali</a>
    </div>

    <div class="row">
        <div class="col-lg-8 px-4">
            <div class="card">
                <div class="card-body">
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                          <li class="nav-item w-50 text-center">
                            <a
                              class="nav-link active"
                              data-bs-toggle="tab"
                              href="#home"
                              role="tab">
                              <span>Materi</span>
                            </a>
                          </li>
                          <li class="nav-item w-50 text-center">
                            <a
                              class="nav-link"
                              data-bs-toggle="tab"
                              href="#profile"
                              role="tab">
                              <span>Video Tutorial</span>
                            </a>
                          </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="p-3">
                                <img class="img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}"/>
                            </div>
                          </div>
                          <div class="tab-pane p-3" id="profile" role="tabpanel">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" title="YouTube video" allowfullscreen></iframe>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="materi">
              <div class="d-flex justify-content-between align-items-center">
                <h5>Tugas</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                    <i class=" ri-add-fill"></i>
                </button>
              </div>
              <div class="row">
                  @foreach (range(1, 5) as $data)
                      <div class="col-lg-12 m-0 p-0">
                          <div class="card border-start border-info py-3 px-4 m-2">
                              <div class="d-flex no-block align-items-center">
                                  <div class="col-2">
                                      <img class="img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}"/>
                                  </div>
                                  <div class="col-lg-9 px-3">
                                      <h6 class="m-0">Lorem ipsum dolor sit amet.</h6>
                                      <p style="font-size: 12px">Lorem ipsum dolor sit amet...</p>
                                  </div>
                                  <div class="ms-auto">
                                    <div class="dropdown d-inline-block">
                                        <button class="bg-transparent border-0 fs-2 dropdown" style="margin-top: -20px" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a href="/administrator/course/detail/sub-course" type="button" class="dropdown-item btn-show" data-bs-toggle="modal"
                                                data-bs-target="#detail">
                                                    Detail Tugas
                                                </a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item edit-item-btn btn-edit" data-bs-toggle="modal"
                                                data-bs-target="#edit">
                                                    Edit Tugas
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item btn-delete text-danger" data-bs-toggle="modal"
                                                data-bs-target="#modal-delete">
                                                    Hapus Tugas
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
            </div>
            <div class="materi">
              <h5>Materi Lainnya</h5>
              <div class="row">
                  @foreach (range(1, 5) as $data)
                      <div class="col-lg-12 m-0 p-0">
                          <div class="card border-start border-info py-3 px-4 m-2">
                              <div class="d-flex no-block align-items-center">
                                  <div class="col-2">
                                      <img class="img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}"/>
                                  </div>
                                  <div class="col-lg-9 px-3">
                                      <h6 class="m-0">Lorem ipsum dolor sit amet.</h6>
                                      <p style="font-size: 12px">Lorem ipsum dolor sit amet...</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item">
                        <a
                          class="page-link link"
                          href="#"
                          aria-label="Previous"
                        >
                          <span aria-hidden="true">
                            <i class="ti ti-chevrons-left fs-4"></i>
                          </span>
                        </a>
                      </li>
                      <li class="page-item">
                        <a class="page-link link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link link" href="#" aria-label="Next">
                          <span aria-hidden="true">
                            <i class="ti ti-chevrons-right fs-4"></i>
                          </span>
                        </a>
                      </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg p-4">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Tambah Tugas
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="course_id" value="">
                        <div class="mb-3">
                            <label for="">Tugas</label>
                            <textarea name="description" id="" class="form-control" rows="5" placeholder="Masukkan tugas"></textarea>
                          </div>
                        <div class="mb-3">
                          <label for="">Level</label>
                          <select class="tambah js-example-basic-single form-control" aria-label=".form-select example" name="student_id">
                            <option value="">Pilih level materi</option>
                            <option value="">Mudah</option>
                            <option value="">Biasa</option>
                            <option value="">Sulit</option>
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-light shadow-none font-medium waves-effect text-start"
                            data-bs-dismiss="modal">
                            Tutup
                        </button>
                        <button type="submit"
                            class="btn btn-primary shadow-none font-medium waves-effect text-start"
                            data-bs-dismiss="modal">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg p-4">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Detail Tugas
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h5>Tugas</h5>
                  <p class="text-muted ">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta non eum harum beatae doloribus deleniti? Magni qui soluta blanditiis animi labore architecto, id dignissimos nam fugit deleniti iure exercitationem suscipit.
                  </p>
                </div>
                <div class="modal-footer text-end">
                  <button class="btn text-white" style="background-color: #7E7E7E;">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg p-4">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Edit Tugas
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="course_id" value="">
                        <div class="mb-3">
                            <label for="">Tugas</label>
                            <textarea name="description" id="" class="form-control" rows="5" placeholder="Masukkan tugas"></textarea>
                          </div>
                        <div class="mb-3">
                          <label for="">Level</label>
                          <select class="tambah js-example-basic-single form-control" aria-label=".form-select example" name="student_id">
                            <option value="">Pilih level materi</option>
                            <option value="">Mudah</option>
                            <option value="">Biasa</option>
                            <option value="">Sulit</option>
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-light shadow-none font-medium waves-effect text-start"
                            data-bs-dismiss="modal">
                            Tutup
                        </button>
                        <button type="submit"
                            class="btn btn-primary shadow-none font-medium waves-effect text-start"
                            data-bs-dismiss="modal">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.btn-edit').click(function () {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var description = $(this).data('description');
            var image = $(this).data('image');
            $('#form-update').attr('action', '/journal/' + id);
            $('#title-edit').val(title);
            $('#description-edit').val(description);
            $('#image-edit').attr('src', image);
            $('#modal-edit').modal('show');
        });

        function preview(event) {
            var input = event.target;
            var previewImages = document.getElementsByClassName('image-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    Array.from(previewImages).forEach(function(previewImage) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';
                    });
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.btn-detail').click(function() {
            var detail = $('#detail-content');
            detail.empty();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var date = $(this).data('date');
            var school = $(this).data('school');
            var description = $(this).data('description');
            var image = $(this).data('image');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Nama</h6>');
            detail.append('<p class="text-muted">' + name + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Tanggal</h6>');
            detail.append('<p class="text-muted">' + date + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Sekolah</h6>');
            detail.append('<p class="text-muted">' + school + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Kegiatan</h6>');
            detail.append('<p>' + description + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Bukti</h6>');
            detail.append('<img src="' + image + '" width="100%"></img>')
            detail.append('</div>');
            $('#detail').modal('show');
        });

        $('.btn-delete').click(function () {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/division/' + id);
            $('#modal-delete').modal('show');
        });

        $(document).ready(function() {
            $(".js-example-basic-single").select2({
                dropdownParent: $("#add")
            });
        });
    </script>
@endsection
