@extends('mentor.layouts.app')
@section('content')

<div class="row mb-3">
    <div class="col-md-4 col-lg-2 col-xl-2">
        <select class="form-select">
            <option selected>Semua</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
        </select>
    </div>
</div>

<div class="row">
    @forelse ($processedSchedules as $zoomSchedule)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-header text-bg-primary d-flex align-items-center rounded-top-4
                    @if($zoomSchedule->status === 'Berakhir') bg-warning text-dark @endif">
                    <h4 class="card-title text-white mb-0">{{$zoomSchedule->title}}</h4>
                    <div class="ms-auto d-flex">
                        <span class="mb-1 badge bg-light text-dark">{{ $zoomSchedule->status }}</span>
                    </div>
                </div>
                <div class="card-body collapse show">
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <h6>
                                {{ \Carbon\Carbon::parse($zoomSchedule->start_date)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}
                            </h6>
                        </div>
                        <div>
                            <h6>
                                {{ \Carbon\Carbon::parse($zoomSchedule->start_date)->format('H:i') }} - {{ \Carbon\Carbon::parse($zoomSchedule->end_date)->format('H:i') }}

                            </h6>
                        </div>
                    </div>
                    <div class="mx-3">
                        <h6>Link Meet :</h6>
                        <a href="{{$zoomSchedule->link}}" target="_blank">
                            {{$zoomSchedule->link}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
            <img src="{{ asset('no data.png') }}" alt="" width="300px" srcset="">
            <p class="fs-5 text-dark">
                Belum Ada Jadwal
            </p>
        </div>
    @endforelse
</div>


@endsection
