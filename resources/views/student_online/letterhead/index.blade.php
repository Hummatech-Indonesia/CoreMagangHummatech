@extends('student_online.layouts.app')

@section('content')
    <h5>Preview</h5>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <img src="{{ asset('kop_example.png') }}" class="w-75" alt="">
        </div>
        <div class="col-12">
            <form action="letterhead/store" method="POST" enctype="multipart/form-data">
                @csrf
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
                        <input type="file" class="form-control" name="" id="">
                        <div class="w-25">
                            <img src="{{ $letterheads == null ? asset('logopkldark.png') : asset('storage/' . $letterheads->logo) }}"
                                class="w-50" alt="">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-3">
                    <button class=" btn btn-success" type="submit">Simpan</button>
                    <button class=" btn btn-primary">Preview</button>
                    <button class=" btn btn-rounded bg-danger-subtle text-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
@endsection
