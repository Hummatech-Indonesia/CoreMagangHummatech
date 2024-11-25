@extends('mentor.layouts.app')
@section('content')
    <div class="container-fluid note-has-grid">
        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
            <li class="nav-item">
                <a data-bs-toggle="tab" href="#project-submissions" role="tab"
                    class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color {{ request()->has('waiting_page') || !request()->hasAny(['waiting_page', 'history_page', 'complete_page']) ? 'active' : '' }}">
                    <i class="ti ti-presentation fill-white me-0 me-md-1  fs-7"></i>
                    <span class="d-none d-md-block font-weight-medium">Pengajuan Project</span>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="tab" href="#history-submissions" role="tab"
                    class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color {{ request()->has('history_page') ? 'active' : '' }}"
                    id="note-business">
                    <i class="ti ti-history fill-white me-0 me-md-1 fs-7"></i>
                    <span class="d-none d-md-block font-weight-medium">Riwayat Pengajuan Project</span>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="tab" href="#complete-project" role="tab"
                    class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color {{ request()->has('complete_page') ? 'active' : '' }}">
                    <i class="ti ti-list-check fill-white me-0 me-md-1 fs-7"></i>
                    <span class="d-none d-md-block font-weight-medium">Project Selesai</span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Waiting Project Submissions -->
            @include('mentor.project-submission2.partials.waiting-submission')
            
            <!-- History Submissions -->
            @include('mentor.project-submission2.partials.history-submission')
            
            <!-- Complete Submissions -->
            @include('mentor.project-submission2.partials.complete-submission')
            
        </div>
    </div>


@endsection
