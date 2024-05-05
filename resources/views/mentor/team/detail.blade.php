@extends('mentor.layouts.app')
@section('style')
<style>

@media (max-width: 767px) {
  #offcanvasRight { width: 100%; }
}

@media (min-width: 768px) and (max-width: 991px) {
  #offcanvasRight { width: 50%; }
}

@media (min-width: 992px) {
  #offcanvasRight { width: 25%; }
}
</style>
@endsection
@section('content')
<div class="col-12 text-end mb-3">
  <a href="/mentor/team" class="btn btn-primary">Kembali</a>
</div>
<div class="card shadow-none position-relative overflow-hidden" style="background-image: url('{{ asset('assets-user/images/laravel-11.jpg') }}'); background-size: cover;">
  <div class="card-body px-4 py-4">
      <div class="row align-items-center">
          <div class="col-12">
              <h2 class="fw-bold mb-8" style="filter: invert(100%)">Tim mini</h2>
              <h4 style="filter: invert(100%)">Pembuatan website menggunakan Laravel</h4>
          </div>
      </div>
  </div>
</div>

@include('admin.components.delete-modal-component')

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<script>
     $('.btn-delete').on('click', function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/mentor/challenge/delete/' + id);
        $('#modal-delete').modal('show');
    });
</script>

@endsection
