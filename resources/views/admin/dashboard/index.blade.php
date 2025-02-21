@extends('admin.layouts.app')
@section('title')
    @lang('app.dashboard')
@endsection
@section('content')
    <div class="h3 mb-3">
        @lang('app.dashboard')
    </div>

    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-4">
        @foreach($objs as $obj)
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <a href="{{ $obj['link'] }}" class="stretched-link h5 link-secondary text-decoration-none">{{ $obj['name'] }}</a>
                        <div class="fs-1 text-end">{{ $obj['count'] }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
