@extends('admin.layouts.app')
@section('style')
    <style>
        .btn-back {
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background-color: #dddcf8;
            /* Warna hover */
            transform: translateY(-2px);
        }

        .custom-card {
            box-shadow: 0 4px 8px rgba(223, 221, 221, 0.267);
            border: none;
        }

        .status-badge {
            border-radius: 34px;
            font-size: 12px;
            color: ;
            min-width: 140px;
            min-height: 30px;
            padding-top: 12px;
            padding-bottom: 0px;
            font-weight: 100;
        }

        .detail-badge {
            background-color: rgba(93, 135, 255, 0.1);
            border-radius: 6px;
            font-size: 12px;
            color: rgba(93, 135, 255, 1);
            min-width: 122px;
            min-height: 30px;
            padding-top: 8px;
            padding-bottom: 0px;
            font-weight: 100;
            justify-content: end;
            align-items: flex-end
        }

        .category-badge {
            background-color: rgba(93, 135, 255, 0.1);
            border-radius: 34px;
            font-size: 12px;
            color: rgba(93, 135, 255, 1);
            min-width: 145px;
            min-height: 30px;
            padding-top: 9px;
            font-weight: 100;
        }

        .status-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .status-badge-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .detail-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(93, 135, 255, 0.1);
            border-radius: 6px;
            font-size: 12px;
            color: rgba(93, 135, 255, 1);
            min-width: 122px;
            height: 30px;
            padding: 0 8px;
            font-weight: 500;
            border: none;
        }

        .bg-label-primary {
            background-color: #eff3ff !important;
            color: #557be8 !important;
        }

        .bg-label-info {
            background-color: #d9ebff !important;
            color: #0da8ff !important;
        }

        .bg-label-warning {
            background-color: #fef5e5 !important;
            color: #ffaa05 !important;
        }

        .bg-label-danger {
            background-color: #fbf2ef !important;
            color: #e12d5b !important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between w-100 mb-4 gap-2 navbar-shadow">
            <a class="btn btn-back py-3 px-3 me-3 d-flex align-items-center custom-card shadow-sm"
                style="background-color: rgba(234, 233, 255, 1); border-radius: 8px;"
                href="javascript:history.back()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"
                    fill="rgba(105, 94, 239, 1)">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path
                        d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z">
                    </path>
                </svg>
            </a>
            <div class="flex-grow-1 text-center py-3 px-3 rounded fw-bold custom-card shadow-sm"
                style="background-color: rgba(234, 233, 255, 1); color: rgba(105, 94, 239, 1); border-radius: 8px; ">
                Detail Revisi
            </div>
        </div>
        <div class="col-12">
            <div class="card card-body">

                <div class=" col-md-7 col-sm-12">
                    <div class="step-arrow-nav">
                        <ul class="nav nav-pills custom-nav nav-justified" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="online-tab" data-bs-toggle="pill"
                                    data-bs-target="#all" type="button" role="tab" aria-controls="offline"
                                    aria-selected="false" data-position="2" tabindex="-1">
                                    <i class="ri-list-unordered"></i>
                                    Semua
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="offline-tab" data-bs-toggle="pill" data-bs-target="#todo"
                                    type="button" role="tab" aria-controls="online" aria-selected="false"
                                    data-position="1" tabindex="-1">
                                    <i class="ri-time-line"></i>
                                    Menunggu
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="offline-tab" data-bs-toggle="pill" data-bs-target="#inprogress"
                                    type="button" role="tab" aria-controls="online" aria-selected="false"
                                    data-position="1" tabindex="-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        width="16" height="16">
                                        <path
                                            d="M2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12ZM20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12ZM12 12V6C13.6569 6 15.1569 6.67157 16.2426 7.75736L12 12Z">
                                        </path>
                                    </svg>
                                    Dikerjakan
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="online-tab" data-bs-toggle="pill" data-bs-target="#completed "
                                    type="button" role="tab" aria-controls="online" aria-selected="false"
                                    data-position="2" tabindex="-1">
                                    <i class="ri-list-check-3"></i>
                                    Selesai
                                </button>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="card card-body">
            <div class="table-responsive table-card p-3">
            <div class="table-responsive">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="all">
                        <table class="table mb-0 align-middle text-nowrap ">
                            <thead>
                                <tr>
                                    <th class="ps-0">No</th>
                                    <th>Revisi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-black">
                                @if ($revisions->presentation?->revision && $revisions->presentation->revision->isNotEmpty())
                                    @foreach ($revisions->presentation->revision as $revision)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $revision->revision }}</td>
                                            <td>
                                                <span @class([
                                                    'bg-label-danger text-sm p-2 rounded-pill' =>
                                                        $revision->status == \App\Enum\RevisionStatusEnum::Todo->value,
                                                    'bg-label-warning text-sm p-2 rounded-pill' =>
                                                        $revision->status == \App\Enum\RevisionStatusEnum::InProgress->value,
                                                    'bg-label-primary text-sm p-2 rounded-pill' =>
                                                        $revision->status == \App\Enum\RevisionStatusEnum::Completed->value,
                                                ])>
                                                    {{ ucwords($revision->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <div class="col-md-12 text-center">
                                                <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}"
                                                    alt="No Data" height="120px" />
                                                <h3 class="text-center">Data Masih Kosong</h3>
                                            </div>
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade show" id="todo">
                        <table class="table mb-0 align-middle text-nowrap ">
                            <thead>
                                <tr>
                                    <th class="ps-0">No</th>
                                    <th>Revisi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-black">
                                @if ($todo_revisions->presentation?->revision && $revisions->presentation->revision->isNotEmpty())
                                    @foreach ($todo_revisions->presentation->revision as $revision)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $revision->revision }}</td>
                                            <td>
                                                <span @class([
                                                    'bg-label-danger text-sm p-2 rounded-pill' =>
                                                        $revision->status == \App\Enum\RevisionStatusEnum::Todo->value,
                                                    'bg-label-warning text-sm p-2 rounded-pill' =>
                                                        $revision->status == \App\Enum\RevisionStatusEnum::InProgress->value,
                                                    'bg-label-primary text-sm p-2 rounded-pill' =>
                                                        $revision->status == \App\Enum\RevisionStatusEnum::Completed->value,
                                                ])>
                                                    {{ ucwords($revision->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <div class="col-md-12 text-center">
                                                <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}"
                                                    alt="No Data" height="120px" />
                                                <h3 class="text-center">Data Masih Kosong</h3>
                                            </div>
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade show " id="inprogress">
                        <table class="table mb-0 align-middle text-nowrap ">
                            <thead>
                                <tr>
                                    <th class="ps-0">No</th>
                                    <th>Revisi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-black">
                                @if ($inprogress_revisions->presentation?->revision && $revisions->presentation->revision->isNotEmpty())
                                    @foreach ($inprogress_revisions->presentation->revision as $revision)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $revision->revision }}</td>
                                            <td>
                                                <span @class([
                                                    'bg-label-danger text-sm p-2 rounded-pill' =>
                                                        $revision->status == \App\Enum\RevisionStatusEnum::Todo->value,
                                                    'bg-label-warning text-sm p-2 rounded-pill' =>
                                                        $revision->status == \App\Enum\RevisionStatusEnum::InProgress->value,
                                                    'bg-label-primary text-sm p-2 rounded-pill' =>
                                                        $revision->status == \App\Enum\RevisionStatusEnum::Completed->value,
                                                ])>
                                                    {{ ucwords($revision->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <div class="col-md-12 text-center">
                                                <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}"
                                                    alt="No Data" height="120px" />
                                                <h3 class="text-center">Data Masih Kosong</h3>
                                            </div>
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade show " id="completed">
                        <table class="table mb-0 align-middle text-nowrap ">
                            <thead>
                                <tr>
                                    <th class="ps-0">No</th>
                                    <th>Revisi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-black">
                                @if ($completed_revisions->presentation?->revision && $revisions->presentation->revision->isNotEmpty())
                                    @foreach ($completed_revisions->presentation->revision as $revision)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $revision->revision }}</td>
                                            <td>
                                                <span @class([
                                                    'bg-label-danger text-sm p-2 rounded-pill' =>
                                                        $revision->status == \App\Enum\RevisionStatusEnum::Todo->value,
                                                    'bg-label-warning text-sm p-2 rounded-pill' =>
                                                        $revision->status == \App\Enum\RevisionStatusEnum::InProgress->value,
                                                    'bg-label-primary text-sm p-2 rounded-pill' =>
                                                        $revision->status == \App\Enum\RevisionStatusEnum::Completed->value,
                                                ])>
                                                    {{ ucwords($revision->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <div class="col-md-12 text-center">
                                                <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}"
                                                    alt="No Data" height="120px" />
                                                <h3 class="text-center">Data Masih Kosong</h3>
                                            </div>
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
