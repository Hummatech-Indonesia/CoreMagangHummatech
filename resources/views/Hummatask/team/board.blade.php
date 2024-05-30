@extends('Hummatask.team.layouts.app')

@section('style')
<style>
.horizontal-scroll-container {
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: thin;
    gap: 30px;
}

.horizontal-scroll-container .card-container {
    flex: 0 0 30%;
    min-width: 250px;
}

/* Atur margin antar kartu */
.horizontal-scroll-container .card-container {
    margin-right: 15px;
}


@media (max-width: 600px) {
    .horizontal-scroll-container .card-container {
        flex-basis: 100%;
    }
}

</style>
@endsection

@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Board</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Board</a></li>
                        <li class="breadcrumb-item" aria-current="page">Board</li>
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
<div class="text-end mb-3">
   <button class="btn btn-primary text-light btn-xs px-4 fs-3 font-medium" data-bs-toggle="modal" data-bs-target="#bs-example-modal-md">Tambah List</button>
</div>

{{-- edit team modal --}}
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

<!-- Add List -->
<div class="modal fade" id="bs-example-modal-md" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('list.store', ['slug' => $team->slug] )}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="judul" name="hummatask_team_id" value="{{$team->id}}" placeholder="Masukkan judul disini" hidden>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="judul" name="title" placeholder="Masukkan judul disini">
                        @error('title')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Edit List -->
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="form-update">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="hummatask_team_id-edit" name="hummatask_team_id" value="" placeholder="Masukkan judul disini" hidden>
                            <input type="text" class="form-control" id="title-edit" name="title" placeholder="Masukkan judul disini"
                                value="">
                                @error('title')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<div class="horizontal-scroll-container">
    @forelse ($categoryBoards as $categoryBoard)
        <div class="card-container">
            <div class="card" style="background-color: #EAEFF4; padding: 0px;">
                <div class="card-body rounded-2 mb-3" >
                    <div class="d-flex align-items-center mb-3">
                        <h5 class="card-title pt-1" style="font-size: 18px;">{{$categoryBoard->title}}</h5>
                            <div class="bg-primary text-light d-inline-flex align-items-center justify-content-center rounded-circle ms-2" style="font-size: 14px; width: 25px; height: 25px;">{{ $boardCounts[$categoryBoard->id] ?? 0 }}</div>
                        <div class="d-flex justify-content-end align-items-center ms-auto">
                            <div class="m3-3">
                                <button class="btn show-form" data-target="formContainer-{{ $categoryBoard->id }}">
                                    <i class="ti ti-plus fs-4"></i>
                                </button>
                            </div>
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center ms-2" style="width: 25px; height: 25px; background-color: #FFFFFF;">
                                <div class="dropdown dropstart">
                                    <a href="#" class="link text-dark show" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="ti ti-dots-vertical fs-4"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-24px, 4.8px, 0px);">
                                        <li>
                                            <button type="button" class="btn btn-edit"
                                            data-id="{{ $categoryBoard->id }}"
                                            data-title="{{ $categoryBoard->title }}"
                                            data-hummatask_team_id="{{ $categoryBoard->hummatask_team_id }}"
                                            >
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item text-danger btn-delete" data-id="{{ $categoryBoard->id }}">Hapus</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="formContainer-{{ $categoryBoard->id }}" class="form-container" style="display: none;">
                            <form class="myForm" method="POST" action="{{ route('board.store') }}">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    @foreach ($studentTeams as $studentProject)
                                        <input type="text" class="form-control" id="category" name="student_project_id" value="{{ $studentProject->id }}" placeholder="Masukkan judul disini" hidden>
                                    @endforeach
                                    <input type="text" class="form-control" id="category" name="category_board_id" value="{{ $categoryBoard->id }}" placeholder="Masukkan judul disini" hidden>
                                    @error('category_board_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control" id="tim" name="hummatask_team_id" value="{{ $categoryBoard->hummatask_team_id }}" placeholder="Masukkan judul disini" hidden>
                                    @error('hummatask_team_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control bg-white mb-2" id="nametext-{{ $categoryBoard->id }}" placeholder="Judul Tugas" name="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <button type="submit" class="btn btn-primary btn-sm mb-3 float-end">Tambah</button>
                            </form>

                        </div>

                            @forelse ($boards as $board)
                                @if ($board->category_board_id == $categoryBoard->id)
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body" style="padding: 13px;">
                                            <div class="dropdown dropstart text-end">
                                                <a href="#" class="link text-dark show" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                                    <i class="ti ti-dots-vertical fs-4"></i>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-24px, 4.8px, 0px);">
                                                    <li>
                                                        <button type="button" class="btn border-0 w-100 text-start edit-board"
                                                        data-id="{{ $board->id }}"
                                                        data-judul="{{ $board->name }}"
                                                        data-description="{{ $board->description }}"
                                                        data-label="{{ $board->label }}"
                                                        data-priority="{{ $board->priority }}"
                                                        data-status="{{ $board->status }}"
                                                        data-start_date="{{ $board->start_date }}"
                                                        data-end_date="{{ $board->end_date }}"
                                                        {{-- data-student_project_id="{{ $board->student_project_id }}"
                                                        data-category_board_id="{{ $board->category_board_id }}" --}}
                                                        >
                                                            <i class="ti ti-pencil-plus fs-4"></i>
                                                            Edit
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-danger border-0 w-100 text-start btn delete-board"
                                                        data-id="{{ $board->id }}">
                                                            <i class="ti ti-trash fs-4"></i>
                                                            Hapus</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="card-text">{{$board->name}}</h5>
                                            <p class="card-text">{{$board->description}}</p>
                                            <span class="mb-1 badge rounded-pill font-medium bg-light-warning text-warning" style="font-size: 10px">{{$board->label}}</span>
                                            <span class="mb-1 badge rounded-pill font-medium bg-light-danger text-danger" style="font-size: 10px">{{$board->priority}}</span>
                                            <span class="mb-1 badge rounded-pill font-medium bg-primary text-light" style="font-size: 10px">{{$board->status}}</span>

                                            <div class="d-flex align-items-center justify-content-between pt-8">
                                                <h6 class="mb-0 text-danger">{{ $board->countdown() }}</h6>
                                                <div class="d-flex align-items-end justify-content-end">
                                                    {{-- <div class="position-relative" style="z-index: {{ $loop->remaining + 1 }};">
                                                    </div> --}}
                                                    @foreach ($studentTeams as $student)
                                                        @if(Storage::disk('public')->exists($student->student->avatar))
                                                            <img src="{{ asset('storage/' . $student->student->avatar) }}" alt="avatar" class="rounded-circle border border-2 border-white" width="35" height="35" style="margin-left: -15px;">
                                                        @else
                                                            <img src="{{ asset('user.webp') }}" alt="default avatar" class="rounded-circle border border-2 border-white" width="35" height="35" style="margin-left: -15px;">
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @endif

                            @empty
                            <div class="mb-3 mt-5 text-center" style="margin: 0 auto;">
                                <img src="{{ asset('empty-asset.png') }}" alt="" width="100px" srcset="">
                                <p class="fs-3 text-dark">
                                    Belum ada tugas
                                </p>
                            </div>
                            @endforelse
                    </div>
                </div>
            </div>
        </div>
    @empty
    <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
        <img src="{{ asset('no data.png') }}" alt="" width="200px" srcset="">
        <p class="fs-5 text-dark">
            Belum Ada Board
        </p>
    </div>
    @endforelse
</div>



    <!--  Edit Tugas -->
    <div class="modal fade" id="edittugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Judul Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Tab menu -->
                            <ul class="nav flex-column" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">
                                        <i class="ti ti-pencil-plus fs-4 me-2"></i>
                                        Edit Tugas
                                    </button>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">
                                        <i class="ti ti-clock-hour-5 fs-4 me-2"></i>
                                        Aktifitas</button>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <!-- Tab content -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                    <form id="form-update-board" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul</label>
                                            <input type="text" class="form-control" id="judul-edit" name="name" placeholder="Masukkan judul tugas">
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="description-edit" name="description" rows="3" placeholder="Masukkan deskripsi tugas"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="start_date" class="form-label">Tanggal Mulai</label>
                                                    <input type="date" class="form-control" id="start_date-edit" name="start_date">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="end_date" class="form-label">Deadline</label>
                                                    <input type="date" class="form-control" id="end_date-edit" name="end_date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-select" id="status-edit" name="status">
                                                        <option value="baru">Baru</option>
                                                        <option value="dikerjakan">Dikerjakan</option>
                                                        <option value="selesai">Selesai</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="prioritas" class="form-label">Prioritas</label>
                                                    <select class="form-select" id="priority-edit" name="priority">
                                                        <option value="biasa">Biasa</option>
                                                        <option value="penting">Penting</option>
                                                        <option value="mendesak">Mendesak</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="prioritas" class="form-label">Board</label>
                                            <select class="form-select" id="priority-edit" name="category_board_id">
                                                @foreach ($categoryBoards as $categoryBoard)
                                                <option value="{{$categoryBoard->id}}">{{$categoryBoard->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="assignee" class="form-label">Label</label>
                                            <select class="form-select" id="label" name="label">
                                                <option value="frontend">Front End</option>
                                                <option value="backend">Back End </option>
                                                <option value="ui/ux">UI/UX</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="assignee" class="form-label">Tugas Untuk</label>
                                            <select class="form-select" id="student_team_id-edit" name="student_team_id">
                                                {{-- <option value="{{$team->id}}">{{$team->student->name}}</option> --}}
                                                @foreach ($studentTeams as $studentTeam)
                                                <option value="{{$studentTeam->id}}">{{$studentTeam->student->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt="avatar" class="rounded-circle" width="40">
                                        <div class="ms-3 m-0 p-0">
                                            <div class="user-meta-info d-flex">
                                                <h5 class="user-name mb-0" data-name="Emma Adams">Emma Adams</h5>
                                                <p class="ms-3 mb-0">Membuat Tugas Memperbaiki sidebar</p>
                                            </div>
                                            <p class="p-0 m-0">3 Jam yang lalu</p>
                                        </div>

                                    </div>
                                    <div class="d-flex align-items-center pt-3">
                                        <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt="avatar" class="rounded-circle" width="40">
                                        <div class="ms-3">
                                            <div class="user-meta-info d-flex">
                                                <h5 class="user-name mb-0" data-name="Emma Adams">Emma Adams</h5>
                                                <p class="ms-3">Mengupdate Tugas Memperbaiki sidebar</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-5 pt-">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="p-0">Judul</h6>
                                            <h6>Memperbaik sidebar</h6>
                                        </div>
                                        <hr class="my-2">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="p-0">Deadline</h6>
                                            <h6>22 Maret 2022</h6>
                                        </div>
                                        <hr class="my-2">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="p-0">Status Tugas</h6>
                                            <h6>Tugas Baru</h6>
                                        </div>
                                        <hr class="my-2">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="p-0">Label</h6>
                                            <span class="mb-1 badge rounded-pill font-medium bg-light-warning text-warning">Front End</span>
                                        </div>
                                        <hr class="my-2">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="p-0">Prioritas</h6>
                                            <span class="mb-1 badge rounded-pill font-medium bg-light-danger text-danger">Mendesak</span>
                                        </div>
                                        <hr class="my-2">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="p-0">Tugas Untuk</h6>
                                            <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt="avatar" class="rounded-circle" width="35">
                                        </div>
                                        <hr class="my-2">
                                    </div>
                                    <p class="p-0 ms-5">3 Jam yang lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div> --}}
            </div>
        </div>
    </div>
 </div>

 @include('admin.components.delete-modal-component')


@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    $('.btn-edit').click(function () {
        var id = $(this).data('id');
        var title = $(this).data('title');
        var hummatask_team_id = $(this).data('hummatask_team_id');


        $('#form-update').attr('action', '/hummateam/board/list/update/' + id);
        $('#title-edit').val(title);
        $('#hummatask_team_id-edit').val(hummatask_team_id);

        $('#modal-edit').modal('show');
    });

    $('.btn-delete').click(function () {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/hummateam/board/list/delete/' + id);
        $('#modal-delete').modal('show');
    });

    $('.edit-board').click(function () {
        var id = $(this).data('id');
        var judul = $(this).data('judul');
        var description = $(this).data('description');
        var label = $(this).data('label');
        var priority = $(this).data('priority');
        var status = $(this).data('status');
        var start_date = $(this).data('start_date');
        var end_date = $(this).data('end_date');
        var student_team_id = $(this).data('student_team_id');
        // var category_project_id = $(this).data('category_project_id');


        $('#judul-edit').val(judul);
        $('#description-edit').val(description);
        $('#label-edit').val(label);
        $('#priority-edit').val(priority);
        $('#status-edit').val(status);
        $('#start_date-edit').val(start_date);
        $('#end_date-edit').val(end_date);
        $('#student_team_id-edit').val(student_team_id);
        // $('#category_board-edit').val(category_board);
        $('#form-update-board').attr('action', '/hummateam/board/update/' + id);

        $('#edittugas').modal('show');
    });

    $('.delete-board').click(function () {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/hummateam/board/delete/' + id);
        $('#modal-delete').modal('show');
    });
</script>
<script>
$(document).ready(function() {
    $('.show-form').on('click', function() {
        var target = $(this).data('target');

        $('#' + target).toggle();
    });
});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var tabs = document.querySelectorAll('.nav-link');
        tabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                var target = this.getAttribute('data-bs-target');
                var activeTab = document.querySelector(target);
                var activeTabs = document.querySelectorAll('.tab-pane.show');

                // Menghapus kelas 'show' dari semua tab content yang aktif
                activeTabs.forEach(function(tabContent) {
                    tabContent.classList.remove('show');
                });

                // Menambahkan kelas 'show' ke tab content yang sesuai dengan tab yang dipilih
                activeTab.classList.add('show');
            });
        });
    });
</script>

@endsection
