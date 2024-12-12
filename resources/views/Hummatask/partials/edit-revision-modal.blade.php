<div class="modal fade" id="editRevisionModal" aria-labelledby="editRevisionModalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editRevisionForm" method="POST">
                @csrf
                @method('PUT')
                <input name="status" id="editRevisionStatus" type="hidden" value="">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="editRevisionModalLabel">Edit Revisi</h1>
                    <button class="btn-close btn-sm" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <label class="fs-2 mb-2 mt-1" for="editRevision">Revisi</label>
                        <textarea class="form-control @error('revision') is-invalid @enderror" 
                                  name="revision" 
                                  id="editRevision"></textarea>
                        @error('revision')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-sm" data-bs-dismiss="modal" type="button">Batal</button>
                    <button class="btn btn-success btn-sm" type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
