<div class="modal fade bs-example-modal-center" id="modal-delete-multiple" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-2 text-center">
                <div class="mt-3 mx-3">
                    <form action="{{ route('administrator.approval.deleteMultiple') }}" id="form-delete-multiple"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="selected_ids" id="remove_selected_ids">
                        <h4>Apakah anda yakin ingin menghapus data yg sudah dicentang?</h4>

                        <div class="mt-4 mb-3 d-flex justify-content-center gap-2">
                            <button id="acceptButton" class="btn btn-danger">Ya, hapus</button>
                            <button class="btn btn-light" type="button" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
