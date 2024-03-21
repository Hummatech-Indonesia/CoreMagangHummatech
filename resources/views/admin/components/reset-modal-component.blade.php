<div class="modal fade" id="modal-reset" tabindex="-1" aria-labelledby="modal-resetLabel1">
    <div class="modal-dialog " role="document">
        <form id="form-reset" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title" id="modal-resetLabel1">
                        Konfirmasi reset password
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-dark fs-7 mb-0">Apakah anda yakin ingin mereset password?<br> password akan diganti menjadi "password"</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light  font-medium waves-effect"
                        data-bs-dismiss="modal">
                        Tidak
                    </button>
                    <button type="submit" class="btn text-white btn-success">
                        Yakin
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
