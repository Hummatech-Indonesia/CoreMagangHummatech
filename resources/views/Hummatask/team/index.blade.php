@extends('Hummatask.team.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Project</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Project</li>
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
    @if ($activeProject)
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-4 mb-4">
                    <div class="row align-items-center gap-4">
                        <div class="col">
                            <h3 class="fw-semibold">{{ $activeProject->title }}</h3>
                            @if ($activeProject->start_date != null)
                                <span>Tanggal Mulai: {{ \Carbon\Carbon::parse($activeProject->start_date)->locale('id')->isoFormat('dddd, D MMMM Y') }} - Tenggat: {{ \Carbon\Carbon::parse($activeProject->end_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}</span>
                            @else
                                <p class="text-muted">{{ $activeProject->description }}</p>
                            @endif
                            <div class="mt-2">
                                <span class="badge text-bg-{{ $activeProject->status->color() }}">{{ $activeProject->status->label() }}</span>
                                <span class="badge text-bg-primary">{{ $activeProject->hummataskTeam->categoryProject->name }}</span>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <button class="btn btn-primary btn-add-repository" data-id="{{ $activeProject->id }}" data-slug="{{ $team->slug }}" data-link="{{ $activeProject->link }}">
                                Tambah link repository
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>Anggota tim</h5>
                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body p-3 d-flex align-items-center">
                                        <div class="me-3">
                                            @if(Storage::disk('public')->exists($team->student->avatar))
                                                <img src="{{ asset('storage/' . $team->student->avatar) }}" alt="avatar" class="rounded-circle" width="40" height="40">
                                            @else
                                                <img src="{{ asset('user.webp') }}" alt="default avatar" class="rounded-circle" width="40" height="40">
                                            @endif
                                        </div>  
                                        <div>
                                            <h6 class="fw-semibold mb-1">{{ $team->student->name }}</h6>
                                            <p class="fs-2 mb-0 text-primary badge bg-light-primary p-1">Ketua Kelompok</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($studentTeams as $student)
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body p-3 d-flex align-items-center">
                                            <div class="me-3">
                                                @if(Storage::disk('public')->exists($student->student->avatar))
                                                    <img src="{{ asset('storage/' . $student->student->avatar) }}" alt="avatar" class="rounded-circle" width="40" height="40">
                                                @else
                                                    <img src="{{ asset('user.webp') }}" alt="default avatar" class="rounded-circle" width="40" height="40">
                                                @endif
                                            </div>
                                            <div>
                                                <h6 class="fw-semibold mb-1">{{ $student->student->name }}</h6>
                                                <p class="fs-2 mb-0 text-warning badge bg-light-warning p-1">Anggota Kelompok</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="col-12">
        @forelse ($projects as $project)
        <div class="d-flex align-items-center gap-4 mb-4 ">
            <div class="position-relative">
                @if ($project->hummataskTeam->image != null)
                    <div class="border border-2 border-primary rounded-2">
                        <img src="{{ asset('storage/'.$project->hummataskTeam->image) }}" style="width: 60px; height: 60px; object-fit: cover;" class="img-fluid rounded-circle m-1" alt="user1"
                        width="60" />
                    </div>
                @else
                    <div class="text-center align-content-center ">
                        <div class="bg-primary rounded rounded-2 text-white d-flex align-items-center justify-content-center text-uppercase fs-1" style="width: 4pc; height: 4pc;">
                        <p class="m-0 p-0">
                            {{ $project->hummataskTeam->categoryProject->name }}
                        </p>
                        </div>
                    </div>
                @endif
            </div>
            <div>
                <h3 class="fw-semibold"><span class="text-dark">{{ $project->title }}</span>
                </h3>
                @if ( $project->start_date != null)
                    <span>Tanggal  Mulai : {{ \Carbon\Carbon::parse($project->start_date)->locale('id')->isoFormat('dddd, D MMMM Y') }} &nbsp; &nbsp;- &nbsp;  Tenggat : {{ \Carbon\Carbon::parse($project->end_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}</span>
                @else
                    <p class="text-muted">{{ $project->description }}</p>
                @endif
                <div class="tb-section-2 mt-2">
                    <span class="badge px-2  text-bg-{{ $project->status->color() }} fs-1">{{ $project->status->label() }}</span>
                    <span class="badge px-2  text-bg-primary fs-1">{{ $project->hummataskTeam->categoryProject->name }}</span>
                </div>
            </div>
        </div>
        @empty
            <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                <img src="{{ asset('empty-asset.png') }}" alt="" width="100px" srcset="">
                <p class="fs-5 text-dark">
                    Tim anda belum mengajukan projek
                </p>
                <a href="{{ route('project.index', ['slug' => $team->slug]) }}" class="btn btn-primary">Ajukan projek</a>
            </div>
        @endforelse
    </div>
    @endif

    <div class="modal fade" id="add-repository-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title px-2" id="staticBackdropLabel">Tambah link repository</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data" id="form-link">
                  @csrf
                  @method('PATCH')
                  <div class="modal-body">
                      <div class="px-2">
                        <label for="link" class="mb-2">Link repository</label>
                        <input name="link" id="link" placeholder="Masukkan link repository projek" type="url" value="{{ old('link') }}" class="form-control">
                      </div>
                      @error('link')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-light-danger text-danger"
                          data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
              </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.48.0/apexcharts.min.js" integrity="sha512-wqcdhB5VcHuNzKcjnxN9wI5tB3nNorVX7Zz9NtKBxmofNskRC29uaQDnv71I/zhCDLZsNrg75oG8cJHuBvKWGw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.48.0/apexcharts.min.css" integrity="sha512-qc0GepkUB5ugt8LevOF/K2h2lLGIloDBcWX8yawu/5V8FXSxZLn3NVMZskeEyOhlc6RxKiEj6QpSrlAoL1D3TA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    $('.btn-add-repository').on('click', function() {
        let id = $(this).data('id');
        let slug = $(this).data('slug');
        let link = $(this).data('link');

        $('#link').val(link);
        $('#form-link').attr('action', '/hummateam/team/'+slug+'/add-repository/' + id);
        $('#add-repository-modal').modal('show');
    });
</script>
@endsection