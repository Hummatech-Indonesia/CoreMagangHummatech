<div class="modal fade" id="delete-{{ $revision->id }}" tabindex="-1" aria-labelledby="deleteLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('student-offline.project.revision.delete', $revision->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header d-flex justify justify-content-center">
                </div>
                <div class="modal-body">
                    <div class="d-flex justify justify-content-center mb-4">
                        <svg style="color: #f95e5e" xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-flip-vertical">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 3l0 18" />
                            <path d="M16 7l0 10l5 0l-5 -10" />
                            <path d="M8 7l0 10l-5 0l5 -10" />
                        </svg>
                    </div>
                    <div style="text-align: center; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif"
                        class="mb-4 fw-bold">
                        <h5>PERINGATAN!!!</h5>
                        <hp>Tindakan Tidak Dapat Dibatalkan</hp>
                    </div>
                    <div class="d-flex justify-content-center gap-4">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-light-warning text-warning btn-sm">Batalkan</button>
                        <button type="submit" class="btn btn-light-danger text-danger btn-sm">Hapus</button>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </form>
        </div>
    </div>
</div>
