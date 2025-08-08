<div class="modal fade" id="create-journal-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="create-journal-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Jurnal</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('journal.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <label for="" class="mt-2 mb-2">Judul</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    @error('title', 'create')
                        <p class="text-danger error-create">
                            {{ $message }}
                        </p>
                    @enderror

                    <label for="" class="mt-2 mb-2">Bukti</label>
                    <figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
                        <img class="img-thumbnail image-preview" itemprop="thumbnail">
                    </figure>
                    <input type="file" name="image" class="form-control" onchange="preview(event)" accept="image/png, image/jpeg">
                    @error('image', 'create')
                        <p class="text-danger error-create">
                            {{ $message }}
                        </p>
                    @enderror

                    <label for="" class="mt-2 mb-2">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" rows="3" onkeyup="countCharacters(this)">{{ old('description') }}</textarea>
                    <p id="characterCount">0 characters</p>
                    @error('description', 'create')
                        <p class="text-danger error-create">
                            {{ $message }}
                        </p>
                    @enderror

                </div>
                <div class="modal-footer border-top-gray">
                    <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit"
                        class="btn btn-light-primary text-primary font-medium waves-effect text-start">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
