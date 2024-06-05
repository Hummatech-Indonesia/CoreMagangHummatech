@extends('Hummatask.team.layouts.app')

@section('style')
<style>
    .comment-widgets {
        border-top: 2px solid blue;
    }
</style>
@endsection

@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Catatan</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Board</a></li>
                            <li class="breadcrumb-item" aria-current="page">Catatan</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n4">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid note-has-grid">
        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
            <li class="nav-item">
                <a data-bs-toggle="tab" href="#task" role="tab"
                    class="nav-link note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 text-body-color"
                    id="all-category">
                    <i class="ti ti-list-details"></i>
                    <span class="d-none d-md-block font-weight-medium">Catatan Tim</span>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="tab" href="#done" role="tab"
                    class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color"
                    id="note-business">
                    <i class="ti ti-list-details mx-2"></i>
                    <span class="d-none d-md-block font-weight-medium">Catatan Revisi</span>
                </a>
            </li>
            <li class="nav-item ms-auto">
                <div class="row g-3 align-items-center">
                    <button class="btn me-1 mb-1 btn-info text-light btn-lg px-4 fs-4 font-medium" data-bs-toggle="modal"
                        data-bs-target="#bs-example-modal-lg">
                        <i class="ti ti-file fs-4"></i>
                        Buat Catatan</button>
                </div>
            </li>
        </ul>


        <!-- Add Note -->
        <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buat Catatan Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('team.note.store', ['slug' => $team->slug]) }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <input type="text" class="form-control" id="tim" name="hummatask_team_id"
                                    value="{{ $team->id }}" placeholder="Masukkan judul disini" hidden>
                                <input type="text" class="form-control" id="judulCatatan" name="title"
                                    placeholder="Judul">
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="radio1"
                                        value="team_note" checked>
                                    <label class="form-check-label" for="radio1">
                                        Catatan Tim
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="radio2"
                                        value="revision_note">
                                    <label class="form-check-label" for="radio2">
                                        Catatan Revisi
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3 mt-0 col-md-12">
                                <div id="note-container">
                                    <!-- Kontainer untuk input catatan -->
                                </div>
                                <button type="button" class="btn add-button-trigger btn-primary mt-3">Tambah</button>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- edit tim modal --}}
        <div class="modal fade" id="edit-team" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Edit Tim</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('team-student.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="modal-body">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <label for="image-input3" class="form-label text-white hover-label">
                          <div class="image-container">
                            <div class="img-img text-center">
                              <img
                                src="{{ $team->image == null ? asset('pen.png') : asset('storage/'. $team->image) }}"
                                alt="example placeholder" id="preview-image3" class="img-fluid rounded-circle col-lg-3" style="object-fit: cover">
                            </div>
                          </div>
                          <input type="file" class="d-none" id="image-input3" name="image"
                            onchange="previewImage()" />
                        </label>
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="mx-3">
                            <label for="" class="mt-1 mb-2">Nama Tim</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukkan nama tim" value="{{ old('name', $team->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="" class="mt-4 mb-2">Deskripsi Tema</label>
                            <textarea name="description" class="form-control" rows="5" placeholder="Masukkan deskripsi tema anda">{{ old('description', $team->description) }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
              </div>
            </div>
        </div>


        <div class="tab-content">
            <div class="tab-pane active" id="task" role="tabpanel">
                <div class="row">
                    @forelse ($categoryBoards as $categoryBoard)
                        @if ($categoryBoard->status == 'team_note')
                            <div class="col-md-4 single-note-item all-category">
                                <div class="card card-body">
                                    <span class="side-stick"></span>
                                    <h6 class="note-title text-truncate w-75 mb-0">
                                        {{ $categoryBoard->title }}
                                    </h6>
                                    <p class="note-date fs-2">
                                        {{ \Carbon\Carbon::parse($categoryBoard->created_at)->translatedFormat('d F Y') }}
                                    </p>
                                    <div class="note-content">
                                        <h6>{{ $categoryBoard->category }}</h6>
                                        <p class="note-inner-content">
                                            Catatan <br>
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a class="link me-1" data-bs-toggle="modal" data-bs-target="#updateTeamNoteModal"
                                            data-id="{{ $categoryBoard->id }}" data-title="{{ $categoryBoard->title }}"
                                            data-status="{{ $categoryBoard->status }}"
                                            data-note="{{ $categoryBoard->boards }}" id="updateTeamNote">
                                            <i class="ti ti-pencil fs-5 favourite-note text-warning"></i>
                                        </a>
                                        <button type="button"
                                            class="link text-danger bg-transparent border-0 ms-2 btn-delete"
                                            data-id="{{ $categoryBoard->id }}">
                                            <i class="ti ti-trash fs-5 remove-note"></i>
                                        </button>
                                        <div class="ms-auto">
                                            <div class="category-selector btn-group">
                                                <button type="button" class="btn mb-1 waves-effect waves-light btn-rounded btn-light-primary text-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $categoryBoard->id }}">
                                                    <i class="ti ti-eye fs-5"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                    @empty
                        <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                            <img src="{{ asset('no data.png') }}" alt="" width="200px" srcset="">
                            <p class="fs-5 text-dark">
                                Belum Ada catatan
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="tab-pane" id="done" role="tabpanel">
                <div class="row">
                    @forelse ($revision as $categoryBoard)
                        <div class="col-md-4 single-note-item all-category" style>
                            <div class="card card-body">
                                <span class="side-stick"></span>
                                <h6 class="note-title text-truncate w-75 mb-0">
                                    {{ $categoryBoard->title }}
                                </h6>
                                <p class="note-date fs-2">
                                    {{ \Carbon\Carbon::parse($categoryBoard->created_at)->translatedFormat('d F Y') }}
                                </p>
                                <div class="note-content">
                                    <h6>{{ $categoryBoard->category }}</h6>
                                    <p class="note-inner-content">
                                        Catatan <br>
                                    </p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a class="link me-1" data-bs-toggle="modal" data-bs-target="#updateTeamNoteModal"
                                        data-id="{{ $categoryBoard->id }}" data-title="{{ $categoryBoard->title }}"
                                        data-status="{{ $categoryBoard->status }}"
                                        data-note="{{ $categoryBoard->boards }}" id="updateRevisionNote">
                                        <i class="ti ti-pencil fs-5 favourite-note text-warning"></i>
                                    </a>
                                    <button type="button"
                                        class="link text-danger bg-transparent border-0 ms-2 btn-delete"
                                        data-id="{{ $categoryBoard->id }}">
                                        <i class="ti ti-trash fs-5 remove-note"></i>
                                    </button>
                                    <div class="ms-auto">
                                        <div class="category-selector btn-group">
                                            <button type="button" class="btn mb-1 waves-effect waves-light btn-rounded btn-light-primary text-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $categoryBoard->id }}">
                                                <i class="ti ti-eye fs-5"></i>
                                            </button>
                                            <!-- Tambahkan tombol lain dengan ID yang berbeda jika perlu -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                            <img src="{{ asset('no data.png') }}" alt="" width="200px" srcset="">
                            <p class="fs-5 text-dark">
                                Belum Ada Catatan
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="updateTeamNoteModal" tabindex="-1" aria-labelledby="editNoteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editNoteModalLabel">Edit Catatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" id="updateTeamNoteForm">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <input type="text" class="form-control" id="teamNoteTitle" name="title"
                                    placeholder="Judul" value="" required>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="teamNoteStatus"
                                        value="team_note">
                                    <label class="form-check-label" for="radio1">
                                        Catatan Tim
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="teamNoteStatus"
                                        value="revision_note">
                                    <label class="form-check-label" for="radio2">
                                        Catatan Revisi
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3 mt-0 col-md-12">
                                <div id="update-note-container">
                                    <!-- Kontainer untuk input catatan -->
                                </div>
                                <button type="button" class="btn add-button-trigger2 btn-primary mt-3"
                                    id="addButtonTrigger">Tambah</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Modal -->
        @foreach ($categoryBoards as $categoryBoard)
        <div class="modal fade" id="detailModal{{ $categoryBoard->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $categoryBoard->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel{{ $categoryBoard->id }}">Detail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4 class="card-title mb-1 text-center">Judul</h4>
                        <h3 class="text-center">{{ $categoryBoard->title }}</h3>
                        <div class="card pt-3" style="max-width: 600px; margin: auto;">
                            <div class="comment-widgets scrollable mb-2 common-widget" style="max-height: 450px; overflow-y: auto;">
                                @forelse ($categoryBoard->boards as $board)
                                    <div class="d-flex flex-row comment-row border-bottom p-3">
                                        <div class="comment-text w-100 p-3">
                                            <h5 class="font-weight-medium">{{$board->name}}</h5>
                                            <p class="mb-1 fs-3 text-muted">
                                                {{$board->description}}
                                            </p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="d-flex flex-row comment-row border-bottom p-3">
                                        <div class="comment-text w-100 p-3">
                                            <h5 class="font-weight-medium">No Data</h5>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>

    @include('admin.components.delete-modal-component')
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            function previewImage() {
              var preview = document.getElementById('preview-image3');
              var fileInput = document.getElementById('image-input3');
              var file = fileInput.files[0];
        
              if (file) {
                var reader = new FileReader();
        
                reader.onload = function(e) {
                  preview.src = e.target.result;
                };
        
                reader.readAsDataURL(file);
              } else {
                Swal.fire({
                  icon: 'warning',
                  title: 'Peringatan',
                  text: 'Silahkan pilih file gambar!',
                  showConfirmButton: false
                });
              }
            }
        </script>

    <script>
        // Fungsi untuk menambahkan input catatan baru
        const addNoteInput = () => {
            let noteContainer = document.getElementById('note-container');
            let newNoteInput = document.createElement('div');
            newNoteInput.className =
                'd-flex align-items-center mb-3'; // Class untuk mengatur tata letak input catatan dan tombol hapus

            // Input catatan
            let noteInput = document.createElement('input');
            noteInput.className = 'form-control';
            noteInput.type = 'text';
            noteInput.name = 'name[]';
            noteInput.required = true;
            noteInput.autocomplete = 'name';
            noteInput.placeholder = 'Catatan';
            newNoteInput.appendChild(noteInput);

            // Tombol hapus dengan ikon sampah
            let deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-danger ms-2'; // Margin kiri agar terpisah dari input catatan
            deleteButton.type = 'button';
            deleteButton.innerHTML = '<i class="fas fa-trash"></i>'; // Ikon sampah
            deleteButton.onclick = function() {
                newNoteInput.remove(); // Menghapus input catatan beserta tombol hapusnya
            };
            newNoteInput.appendChild(deleteButton);

            noteContainer.appendChild(
                newNoteInput); // Menambahkan input catatan beserta tombol hapus ke dalam kontainer
        };

        // Event listener untuk tombol "Tambah"
        document.querySelector('.add-button-trigger').addEventListener('click', addNoteInput);

        // Memanggil fungsi addNoteInput() sekali saat dokumen selesai dimuat
        document.addEventListener('DOMContentLoaded', function() {
            addNoteInput();
        });
    </script>

    <script>
        const addUpdateInput = () => {
            let noteContainer = $('#update-note-container');

            // Membuat div baru untuk input catatan dan tombol hapus
            let newNoteInput = $('<div>').addClass('d-flex align-items-center mb-3');

            // Input catatan
            let noteInput = $('<input>')
                .addClass('form-control')
                .attr('type', 'text')
                .attr('name', 'name[]')
                .attr('required', true)
                .attr('autocomplete', 'name')
                .attr('placeholder', 'Catatan');
            newNoteInput.append(noteInput);

            // Tombol hapus dengan ikon sampah
            let deleteButton = $('<button>')
                .addClass('btn btn-danger ms-2')
                .attr('type', 'button')
                .html('<i class="fas fa-trash"></i>')
                .on('click', function() {
                    newNoteInput.remove(); // Menghapus input catatan beserta tombol hapusnya
                });
            newNoteInput.append(deleteButton);

            noteContainer.append(newNoteInput); // Menambahkan input catatan beserta tombol hapus ke dalam kontainer
        };

        $(document).on('click', '#updateTeamNote,#updateRevisionNote', function() {
            $('#updateTeamNoteModal').modal('show');
            const id = $(this).data('id');
            const title = $(this).data('title');
            const status = $(this).data('status');
            const note = $(this).data('note');

            // Set nilai pada elemen modal sesuai data yang diperoleh dari tombol edit
            $('#teamNoteTitle').val(title);
            $('input[name="status"]').prop('checked', false);
            $('input[name="status"][value="' + status + '"]').prop('checked', true);

            // Set action form untuk update berdasarkan ID
            let url = `{{ route('team.note.update', ':id') }}`.replace(':id', id);
            $('#updateTeamNoteForm').attr('action', url);

            // Kosongkan dan tambahkan kembali input catatan berdasarkan data yang ada
            $('#update-note-container').empty();
            if (note && note.length > 0) {
                note.forEach(function(item) {
                    // Membuat div baru untuk input catatan dan tombol hapus
                    let newNoteInput = $('<div>').addClass('d-flex align-items-center mb-3');

                    // Input catatan
                    let noteInput = $('<input>')
                        .addClass('form-control')
                        .attr('type', 'text')
                        .attr('name', 'name[]')
                        .attr('required', true)
                        .attr('autocomplete', 'name')
                        .attr('placeholder', 'Catatan')
                        .val(item['name']);
                    newNoteInput.append(noteInput);

                    // Tombol hapus dengan ikon sampah
                    let deleteButton = $('<button>')
                        .addClass('btn btn-danger ms-2')
                        .attr('type', 'button')
                        .html('<i class="fas fa-trash"></i>')
                        .on('click', function() {
                            newNoteInput.remove(); // Menghapus input catatan beserta tombol hapusnya
                        });
                    newNoteInput.append(deleteButton);

                    $('#update-note-container').append(
                        newNoteInput); // Menambahkan input catatan beserta tombol hapus ke dalam kontainer
                });
            }

            // Menambahkan event handler untuk tombol tambah
            $('#addButtonTrigger').off('click').on('click', function() {
                addUpdateInput(); // Memanggil fungsi addUpdateInput ketika tombol tambah ditekan
            });
        });

        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/hummateam/team/note/delete/' + id);
            $('#modal-delete').modal('show');
        });


    </script>
@endsection
