<div class="modal fade" id="link-modal-{{ $presentation->id }}" tabindex="-1" aria-labelledby="deleteLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @csrf
            <div class="modal-header text-dark">
                Link Zoom
            </div>
            <div class="modal-body">
                @if ($presentation->link_online_presentation == '-')
                    <textarea name="" id="" class="form-control bg-white" cols="30" rows="2" disabled></textarea>
                    <div class=" mt-2">
                        <a href="#" class="btn btn-light-info text-info btn-sm disabled w-100">Zoom Belum Tersedia</a>
                    </div>
                @else
                    <textarea name="" id="" class="form-control bg-white" cols="30" rows="2" disabled>{{ $presentation->link_online_presentation }}</textarea>
                    <div class=" mt-2">
                        <a href="{{ $presentation->link_online_presentation }}" class="btn btn-info btn-sm w-100">Masuk
                            ke Zoom</a>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <!-- Add footer content like buttons here -->
            </div>
        </div>
    </div>
</div>
