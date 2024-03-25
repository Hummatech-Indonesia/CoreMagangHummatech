@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-md-4">
            <h4>Selamat Datang Admin</h4>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. .</p>
        </div>
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-end">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">Ubah Data Admin</button>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Data Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @if ($dataadmin == null)
                    <form action="/data-admin/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="d-flex justify-content-center">
                                <label class="form-label text-white" for="image-input1">
                                    <img id="preview-image1" src="https://task.hummatech.com/assets/img/avatars/pen.png"
                                        alt="example placeholder"
                                        style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;object-fit: cover"
                                        class="rounded-circle">
                                    <input type="file" class="form-control d-none" id="image-input1" name="image"
                                        accept="image/*">
                                </label>
                            </div>
                            <div class="mb-2">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" id="" name="name"
                                    placeholder="Masukkan Nama">
                            </div>
                            <div class="mb-2">
                                <label for="">PT</label>
                                <input type="text" class="form-control" id="" name="company"
                                    placeholder="Masukkan PT">
                            </div>
                            <div class="mb-2">
                                <label for="">Jabatan</label>
                                <input type="text" class="form-control" id="" name="field"
                                    placeholder="Masukkan Jabatan">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary ">Save Changes</button>
                        </div>
                    </form>
                @else
                    <form action="/data-admin/update/{{ $dataadmin->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="d-flex justify-content-center">
                                <label class="form-label text-white" for="image-input1">
                                    <img id="preview-image1" src="{{ asset('storage/' . $dataadmin->image) }}"
                                        alt="example placeholder"
                                        style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;object-fit: cover"
                                        class="rounded-circle">
                                    <input type="file" class="form-control d-none" id="image-input1" name="image"
                                        accept="image/*">
                                </label>
                            </div>
                            <div class="mb-2">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" value="{{ $dataadmin->name }}" id="" name="name"
                                    placeholder="Masukkan Nama">
                            </div>
                            <div class="mb-2">
                                <label for="">PT</label>
                                <input type="text" class="form-control" id="" value="{{ $dataadmin->company }}" name="company"
                                    placeholder="Masukkan PT">
                            </div>
                            <div class="mb-2">
                                <label for="">Jabatan</label>
                                <input type="text" class="form-control" id="" value="{{ $dataadmin->field }}" name="field"
                                    placeholder="Masukkan Jabatan">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary ">Save Changes</button>
                        </div>
                    </form>
                @endif
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#image-input1').on('change', function(e) {
                var file = e.target.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview-image1').attr('src', e.target.result);
                }

                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
