<div class="modal fade" id="edit-journal-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Edit Jurnal
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" id="form-update">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="" class="mt-2 mb-2">Judul</label>
                    <input type="text" name="title" id="title-edit" value="{{ old('title') }}"
                        class="form-control">
                    @error('title', 'edit')
                        <p class="text-danger error-edit">
                            {{ $message }}
                        </p>
                    @enderror
                    <label for="" class="mt-2 mb-2">Bukti</label>
                    <figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
                        <img class="img-thumbnail image-preview" id="image-edit" itemprop="thumbnail">
                    </figure>
                    <input class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/png, image/jpeg"
                        type="file" onchange="preview(event)">
                    @error('image', 'edit')
                        <p class="text-danger error-edit">
                            {{ $message }}
                        </p>
                    @enderror
                    <label for="description-edit" class="mt-2 mb-2">Deskripsi</label>
                    <textarea name="description" id="description-edit" class="form-control" rows="3"
                        oninput="countCharactersEdit(this)">{{ old('description') }}</textarea>
                    <div id="characterCountEdit"></div>
                    @error('description', 'edit')
                        <p class="text-danger error-edit">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <hr>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                        data-bs-dismiss="modal">
                        Tutup
                    </button>
                    <button type="submit"
                        class="btn btn-light-primary text-primary font-medium waves-effect text-start"
                        data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
