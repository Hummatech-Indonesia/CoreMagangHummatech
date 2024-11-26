@extends('admin.layouts.app')
@section('content')

    {{-- <!-- Header Section -->
    <div class="flex justify-between items-center mb-5">
        <a href="{{ url()->previous() }}" class="flex items-center text-purple-500 hover:text-purple-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span>Kembali</span>
        </a>
        <h1 class="text-2xl font-bold text-purple-700">Revisi Project</h1>
    </div> --}}

    <div class="card card-header">
        <button class="btn btn-back py-3 px-3 me-3 d-flex align-items-center custom-card shadow-sm" style="background-color: rgba(234, 233, 255, 1); border-radius: 8px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="rgba(105, 94, 239, 1)">
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z"></path>
            </svg>
        </button>
    </div>

    <div class="d-flex align-items-center justify-content-between mb-4">
        <!-- Tombol Kembali -->
        <button class="btn btn-back py-3 px-3 me-3 d-flex align-items-center custom-card shadow-sm" style="background-color: rgba(234, 233, 255, 1); border-radius: 8px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="rgba(105, 94, 239, 1)">
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z"></path>
            </svg>
        </button>

        <!-- Header Judul -->
        <div class="flex-grow-1 text-center py-3 px-3 rounded fw-bold custom-card shadow-sm" 
            style="background-color: rgba(234, 233, 255, 1); color: rgba(105, 94, 239, 1); border-radius: 8px; ">
            Detail Project
        </div>
    </div>

    <!-- Table Section -->
    
        <table class="w-full table-auto border-collapse border border-gray-200">
            <thead>
                <tr class="bg-purple-100 text-left">
                    <th class="px-4 py-2 border border-gray-300">No</th>
                    <th class="px-4 py-2 border border-gray-300">Revisi</th>
                    <th class="px-4 py-2 border border-gray-300">Status</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 10; $i++)
                    <tr class="{{ $i % 2 == 0 ? 'bg-gray-50' : '' }}">
                        <td class="px-4 py-2 border border-gray-300 text-center">{{ $i }}</td>
                        <td class="px-4 py-2 border border-gray-300">
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
                        </td>
                        <td class="px-4 py-2 border border-gray-300 text-center">
                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">
                                Selesai
                            </span>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

@endsection