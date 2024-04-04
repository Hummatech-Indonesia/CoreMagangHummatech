@extends('student_online.layouts.app')

@section('content')
    <div class="mb-3 mb-md-5 row">
        <div class="col-md-2">
            <select id="status" class="form-select">
                <option @if (!request()->get('status')) selected @endif value="">Semua Jadwal</option>
                <option @if (request()->get('status') === 'past') selected @endif value="past">Berakhir</option>
                <option @if (request()->get('status') === 'today') selected @endif value="today">Hari Ini</option>
                <option @if (request()->get('status') === 'upcoming') selected @endif value="upcoming">Mendatang</option>
            </select>
        </div>
    </div>

    <div class="row">
        @forelse ($zoomSchedules as $zoom)
        <div class="col-md-4 col-xl-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-white p-2 pb-0">
                    <div class="p-4 rounded bg-primary d-flex justify-content-between w-100">
                        <h5 class="mb-0 text-white text-truncate">Judul Kegiatan</h5>
                        <div>
                            <span class="p-2 px-3 bg-white rounded text-primary">Mendatang</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="d-flex flex-column gap-1 mb-3 col-md-6">
                            <span class="fw-bolder d-lg-none">Tanggal Kegiatan</span>
                            <span class="d-flex gap-2 align-items-center">
                                <i class="fas fa-calendar"></i>
                                12 Maret 2024
                            </span>
                        </div>
                        <div class="d-flex flex-column gap-1 mb-3 col-md-6">
                            <span class="fw-bolder d-lg-none">Tanggal Kegiatan</span>
                            <span class="d-flex gap-2 align-items-center">
                                <i class="fas fa-clock"></i>
                                06.00 s/d 08.00
                            </span>
                        </div>
                        <div class="d-flex flex-column gap-1 col-md-12">
                            <span class="fw-bolder d-lg-none">Tautan Kegiatan</span>
                            <span class="d-flex gap-2 align-items-center">
                                <i class="fas fa-link"></i>
                                <a class="text-truncate" target="_blank"
                                    href="https://us05web.zoom.us/j/6417801427?pwd=a2xjM09oWkFrOVZ6U0xLY2dveWZVQT09">https://us05web.zoom.us/j/6417801427?pwd=a2xjM09oWkFrOVZ6U0xLY2dveWZVQT09</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12 text-center">
            <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}" alt="No Data" height="120px" />
            <h3 class="text-center">Belum Ada Kegiatan</h3>
        </div>
        @endforelse
    </div>
@endsection

@section('script')
    <script>
        // Function to get query parameters from URL
        function getQueryParams() {
            return new URLSearchParams(window.location.search);
        }

        // Function to update URL
        function updateUrl() {
            const baseUrl = window.location.href.split('?')[0];
            const queryParams = getQueryParams();


            if (statusSelect.value !== '')
                queryParams.set('status', statusSelect.value);
            else
                queryParams.delete('status')

            const newUrl = queryParams.size > 0 ? `${baseUrl}?${queryParams.toString()}` : baseUrl;

            // Update the URL
            window.location.href = newUrl;
        }

        // Selecting the elements
        const statusSelect = document.getElementById('status');

        // Adding event listeners
        statusSelect.addEventListener('change', updateUrl);
    </script>
@endsection
