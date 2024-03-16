@extends('admin.layouts.app')
@section('content')
    <div class="row">
        @foreach ($chanels as $chanel)
            @if ($chanel->active == true)
            @endif
            <form action="/transaction/tripay" method="post">
                @csrf
                @method('POST')
                <input type="hidden" name="method" value="{{ $chanel->code }}">
                <div  class="col-4">
                    <button type="submit" class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <img src="{{ $chanel->icon_url }}" class="mb-3 mt-3"
                                    style="min-height: 100px;object-fit:contain" width="200px" alt=""
                                    srcset="">

                            </div>
                        </div>
                    </button>
                </div>
            </form>
        @endforeach

    </div>
@endsection
