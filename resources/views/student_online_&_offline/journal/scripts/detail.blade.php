<script>
    $(document).ready(function() {
        $('.btn-detail').click(function() {
            var detail = $('#detail-content');
            detail.empty();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var date = $(this).data('date');
            var school = $(this).data('school');
            var title = $(this).data('title');
            var description = $(this).data('description');
            var image = $(this).data('image');
            var content = `
                <div class="mb-2">
                    <h6 class="f-w-600">Nama</h6>
                    <p class="text-muted">${name}</p>
                </div>
                <div class="mb-2">
                    <h6 class="f-w-600">Tanggal</h6>
                    <p class="text-muted">${date}</p>
                </div>
                <div class="mb-2">
                    <h6 class="f-w-600">Sekolah</h6>
                    <p class="text-muted">${school}</p>
                </div>
                <div class="mb-2">
                    <h6 class="f-w-600">Judul</h6>
                    <p class="text-muted">${title}</p>
                </div>
                <div class="mb-2">
                    <h6 class="f-w-600">Kegiatan</h6>
                    <p>${description}</p>
                </div>
                <div class="mb-2">
                    <h6 class="f-w-600">Bukti</h6>
                    <img src="${image}" width="100%"></img>
                </div>
            `;
            detail.html(content);
            $('#detail-journal-modal').modal('show');
        });
    });
</script>
