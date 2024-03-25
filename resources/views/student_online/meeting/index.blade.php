@extends('student_online.layouts.app')

@section('content')
<div class="my-3 row">
    <div class="col-md-4">
        <select id="schedule" class="form-select">
            <option selected>Semua Jadwal</option>
            <option value="past">Yang Sudah</option>
            <option value="today">Hari Ini</option>
            <option value="upcoming">Mendatang</option>
        </select>
    </div>
</div>
@endsection
