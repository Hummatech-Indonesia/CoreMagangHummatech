<div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-deleteLabel1">
    <div class="modal-dialog modal-sm" role="document">
        <form id="form-delete" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title" id="modal-deleteLabel1">
                        Hapus data
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-dark mb-0">Apakah anda yakin ingin menghapus data?</p>
                </div>
                <div class="modal-footer">
                    <button type="button"style="background-color: #1B3061" class="btn text-white btn-create waves-effect"
                        data-bs-dismiss="modal">
                        Tutup
                    </button>
                    <button type="submit" class="btn btn-danger text-white font-medium waves-effect">
                        Hapus
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
