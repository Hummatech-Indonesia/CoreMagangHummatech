@extends('student_offline.layouts.app')
@section('style')
    <style>
        .line{
            content: " ";
            width: 52vw;
            margin-top: 20px;
            padding: 2.5px 0;
            background-color: #000;
        }
        .line-2{
            content: " ";
            width: 52vw;
            margin-top: 5px;
            padding: 1px 0;
            background-color: #000;
        }
    </style>
@endsection
@section('content')
    <h5>Preview</h5>
    <div class="row pb-5">
        <div class="col-12 d-flex justify-content-center">
            <img src="{{ $letterheads ? asset('kop_example.png') : asset('kop_example.png') }}" class="w-100" alt="">
        </div>
        <div class="col-12">
            @if ($letterheads == null)
            <form action="{{route('letterhead.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <label for="" class="text-dark fw-bold">Kop Atas</label>
                        <input type="text" class="form-control"  name="letterhead_top"
                            value="{{ $letterheads == null ? '' : $letterheads->letterhead_top }}"
                            placeholder="Masukkan kop surat">
                    </div>
                    <div class="col-6">
                        <label for="" class="text-dark fw-bold">Kop Tengah</label>
                        <input type="text" class="form-control" name="letterhead_middle"
                            value="{{ $letterheads == null ? '' : $letterheads->letterhead_middle }}"
                            placeholder="Masukkan kop tengah">
                    </div>
                    <div class="col-6">
                        <label for="" class="text-dark fw-bold">Kop Bawah</label>
                        <input type="text" class="form-control" name="letterhead_bottom"
                            value="{{ $letterheads == null ? '' : $letterheads->letterhead_bottom }}"
                            placeholder="Masukkan kop bawah">
                    </div>
                    <div class="col-6">
                        <label for="" class="text-dark fw-bold">Footer</label>
                        <input type="text" class="form-control" name="footer"
                            value="{{ $letterheads == null ? '' : $letterheads->footer }}"
                            placeholder="Masukkan footer">
                    </div>
                    <div class="col-12">
                        <label for="" class="text-dark fw-bold">Logo</label>
                        <input type="file" class="form-control" name="logo" id="" onchange="previewImage(event)">
                        <div class="w-25 mt-3">
                            <img src="{{ $letterheads ? asset('storage/' . $letterheads->logo) : asset('') }}" class="w-50" alt="">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-3">
                    <button class=" btn btn-success" type="submit">Simpan</button>
                    @if ($letterheads != null)
                        <button type="button" class="btn btn-primary btn-preview">Preview</button>
                        <button type="button" class=" btn btn-rounded bg-danger-subtle text-danger btn-delete" data-id="{{ $letterheads->id }}">Hapus</button>
                    @endif
                </div>
            </form>
            @else
            <form action="/letter-head/{{ $letterheads->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <label for="" class="text-dark fw-bold">Kop Atas</label>
                        <input type="text" class="form-control"  name="letterhead_top"
                            value="{{ $letterheads == null ? '' : $letterheads->letterhead_top }}"
                            placeholder="SMKS 2 HUMMATECH MALANG">
                    </div>
                    <div class="col-6">
                        <label for="" class="text-dark fw-bold">Kop Tengah</label>
                        <input type="text" class="form-control" name="letterhead_middle"
                            value="{{ $letterheads == null ? '' : $letterheads->letterhead_middle }}"
                            placeholder="“SMKS 2 HUMMATECH ” MALANG">
                    </div>
                    <div class="col-6">
                        <label for="" class="text-dark fw-bold">Kop Bawah</label>
                        <input type="text" class="form-control" name="letterhead_bottom"
                            value="{{ $letterheads == null ? '' : $letterheads->letterhead_bottom }}"
                            placeholder="SMKS 2 HUMMATECH MALANG AKREDITASI “A”">
                    </div>
                    <div class="col-6">
                        <label for="" class="text-dark fw-bold">Footer</label>
                        <input type="text" class="form-control" name="footer"
                            value="{{ $letterheads == null ? '' : $letterheads->footer }}"
                            placeholder="perum permatas regency blok 10 no 28 kec karangploso kab malang jawa timur">
                    </div>
                    <div class="col-12">
                        <label for="" class="text-dark fw-bold">Logo</label>
                        <input type="file" class="form-control" name="logo" id="">
                        <div class="w-25 pt-3">
                            <img src="{{ $letterheads == null ? asset('logopkldark.png') : asset('storage/' . $letterheads->logo) }}"
                                class="w-50" alt="">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-3">
                    <button class=" btn btn-success" type="submit">Simpan</button>
                    @if ($letterheads != null)
                        <button type="button" class="btn btn-primary btn-preview">Preview</button>
                        <button type="button" class=" btn btn-rounded bg-danger-subtle text-danger btn-delete" data-id="{{ $letterheads->id }}">Hapus</button>
                    @endif
                </div>
            </form>
            @endif
        </div>
    </div>


    @if ($letterheads != null)
    <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                       Preview
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center ps-5">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-1">
                            <img src="{{ asset('storage/'. $letterheads->logo) }}" class="w-100">
                        </div>
                        <div class="text-center col-xl-8">
                            <h5><b>{{ $letterheads->letterhead_top }}</b></h5>
                            <h3><b>{{ $letterheads->letterhead_middle }}</b></h3>
                            <h6><b>{{ $letterheads->letterhead_bottom }}</b></h6>
                            <h6>
                                {{ $letterheads->footer }}
                            </h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="line-2"></div>
                </div>
                <div class="modal-footer pe-4 me-2">
                    <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                        data-bs-dismiss="modal">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @include('admin.components.delete-modal-component')
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.btn-preview').click(function() {
        $('#add').modal('show');
    });
    $('.btn-delete').click(function () {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/letter-head/' + id);
        $('#modal-delete').modal('show');
    });
</script>
<script>
    function previewImage(event) {
        var input = event.target;
        var previewImage = input.nextElementSibling.querySelector('img');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection
