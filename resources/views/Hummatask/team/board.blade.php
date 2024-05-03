@extends('Hummatask.team.layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Board</h4>
   <button class="btn btn-primary text-light btn-xs px-4 fs-3 font-medium" data-bs-toggle="modal" data-bs-target="#bs-example-modal-md">Tambah List</button>
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
                <form action="{{route('list.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="judul" name="hummatask_team_id" value="{{$hummataskTeam->id}}" placeholder="Masukkan judul disini" hidden>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="judul" name="name" placeholder="Masukkan judul disini">
                        @error('name')
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('list.update', $hummataskTeam->id) }}" method="post" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="judul" name="hummatask_team_id" value="{{$hummataskTeam->id}}" placeholder="Masukkan judul disini" hidden>
                        <input type="text" class="form-control" id="judul" name="name" placeholder="Masukkan judul disini"
                               value="">
                               @error('name')
                               <div class="invalid-feedback text-danger">{{ $message }}</div>
                           @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="editForm" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>



 <div class="row">
    @forelse ($categoryBoards as $categoryBoard)

    <div class="col-md-6 col-lg-4">
        <div class="card" style="background-color: #EAEFF4; padding: 15px;">
            <div class="card-body rounded-2 mb-3" >
                <div class="d-flex align-items-center mb-3">
                    <h6 class="card-title pt-1" style="font-size: 14px;">{{$categoryBoard->name}}</h6>
                    <div class="bg-primary text-light d-inline-flex align-items-center justify-content-center rounded-circle ms-2" style="font-size: 14px; width: 25px; height: 25px;">5</div>
                    <div class="d-flex justify-content-end align-items-center ms-auto">
                        <div class="m3-3">
                            <i class="ti ti-plus fs-4"></i>
                        </div>
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center ms-2" style="width: 25px; height: 25px; background-color: #FFFFFF;">
                            <div class="dropdown dropstart">
                                <a href="#" class="link text-dark show" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                    <i class="ti ti-dots-vertical fs-4"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-24px, 4.8px, 0px);">
                                    <li>
                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Edit
                                        </button>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item text-danger">Hapus</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control text-white bg-white mb-2" id="nametext" aria-describedby="judul tugas" placeholder="Name">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mb-3 float-end">Tambah</button>
                    </form>

                    @foreach (range(1,3) as $item)
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body" style="padding: 15px;">
                                <div class="dropdown dropstart text-end">
                                    <a href="#" class="link text-dark show" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="ti ti-dots-vertical fs-4"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-24px, 4.8px, 0px);">
                                        <li>
                                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#edittugas">
                                                <i class="ti ti-pencil-plus fs-4"></i>
                                                Edit
                                              </button>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-item text-danger">
                                                <i class="ti ti-trash fs-4"></i>
                                                Hapus</a>
                                        </li>
                                    </ul>
                                </div>
                                <h6 class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</h6>
                                <span class="mb-1 badge rounded-pill font-medium bg-light-warning text-warning" style="font-size: 10px">Front End</span>
                                <span class="mb-1 badge rounded-pill font-medium bg-light-danger text-danger" style="font-size: 10px">Mendesak</span>
                                <span class="mb-1 badge rounded-pill font-medium bg-primary text-light" style="font-size: 10px">Di Revisi</span>

                                <div class="d-flex align-items-center justify-content-between pt-8">
                                    <h6 class="mb-0 text-danger">Sudah melewati deadline</h6>
                                    <div class="d-flex align-items-end justify-content-end">
                                        <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" class="rounded-circle me-n2 card-hover border border-2 border-white" width="35" height="35" alt="">
                                        <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" class="rounded-circle me-n2 card-hover border border-2 border-white" width="35" height="35" alt="">
                                        <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" class="rounded-circle me-n2 card-hover border border-2 border-white" width="35" height="35" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @empty

    @endforelse

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
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">
                                        <i class="ti ti-clock-hour-5 fs-4 me-2"></i>
                                        Aktifitas</button>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <!-- Tab content -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                    <form>
                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul</label>
                                            <input type="text" class="form-control" id="judul" placeholder="Masukkan judul tugas">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Deadline</label>
                                            <input type="date" class="form-control" id="tanggal">
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select" id="status">
                                                <option value="1">Selesai</option>
                                                <option value="2">Belum Selesai</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="prioritas" class="form-label">Prioritas</label>
                                            <select class="form-select" id="prioritas">
                                                <option value="1">Tinggi</option>
                                                <option value="2">Sedang</option>
                                                <option value="3">Rendah</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="assignee" class="form-label">Label</label>
                                            <select class="form-select" id="assignee">
                                                <option value="1">John Doe</option>
                                                <option value="2">Jane Doe</option>
                                                <option value="3">Alice Smith</option>
                                            </select>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#edittugas').on('shown.bs.modal', function (e) {
            $('#tab1-tab').tab('show');
        });
    });
</script>
@endsection
