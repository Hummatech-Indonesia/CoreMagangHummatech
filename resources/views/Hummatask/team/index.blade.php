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
    <div class="col-12">
        @forelse ($projects as $project)
        <div class="d-flex align-items-center gap-4 mb-4 ">
            <div class="position-relative">
                @if ($project->hummataskTeam->image != null)
                    <div class="border border-2 border-primary rounded-circle">
                        <img src="{{ asset('storage/'.$project->hummataskTeam->image) }}" style="width: 60px; height: 60px; object-fit: cover;" class="img-fluid rounded-circle m-1" alt="user1"
                        width="60" />
                    </div>
                @else
                    <div class="text-center align-content-center ">
                        <div class="bg-primary rounded rounded-circle text-white d-flex align-items-center justify-content-center text-uppercase fs-1" style="width: 4pc; height: 4pc;">
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
                @if ($project->start_date != null)
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
                <a href="{{ route('project.index', ['slug' => $slugs->slug]) }}" class="btn btn-primary">Ajukan projek</a>
            </div>
        @endforelse
    </div>

    <div class="modal fade" id="add-team" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title px-3" id="staticBackdropLabel">Projek yang akan anda ajukan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    @foreach (range(0, 9) as $key => $item)
                        <div class="row col-12">
                            <div class="col-4">
                                <label for="" class="mt-1 mb-1">Tema ke-{{ ++$key }}</label>
                                <input type="text" name="title" class="form-control" placeholder="Masukkan Tema"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-8">
                                <label for="" class="mt-1 mb-1">Deskripsi Tema</label>
                                <input type="text" name="description" class="form-control" placeholder="Masukkan Deskripsi Tema"
                                    value="{{ old('description') }}">
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach
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
