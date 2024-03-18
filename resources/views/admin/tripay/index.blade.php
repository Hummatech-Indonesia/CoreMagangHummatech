@extends('admin.layouts.app')
@section('content')
    <div class="row">
        @foreach ($channels['data'] as $channel)
            @if ($channel['active'] == true)
            @endif
            <form action="/transaction/tripay" method="post" class="col-md-3">
                @csrf
                @method('POST')

                <input type="hidden" name="method" value="{{ $channel['code'] }}" />

                <button type="submit" class="card w-100">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ $channel['icon_url'] }}" class="mb-3 mt-3"
                                style="min-height: 100px;object-fit:contain" width="200px" alt="{{ $channel['name'] }}" />
                            <h3 class="text-center">{{ $channel['name'] }}</h3>
                        </div>
                    </div>
                </button>
            </form>
        @endforeach

    </div>
@endsection
