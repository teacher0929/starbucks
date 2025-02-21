@extends('admin.layouts.app')
@section('title')
    @lang('app.notifications')
@endsection
@section('content')
    <div class="h3 mb-3">
        @lang('app.notifications')
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="small">
            <tr>
                <th>@lang('app.id')</th>
                <th>@lang('app.customer')</th>
                <th style="width:20%">@lang('app.title')</th>
                <th style="width:50%">@lang('app.body')</th>
                <th>@lang('app.createdAt')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td><i class="bi-person-bounding-box text-secondary"></i> {{ $obj->customer->getName() }}</td>
                    <td>{{ $obj->title }}</td>
                    <td>{{ $obj->body }}</td>
                    <td>{{ $obj->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>{{ $objs->links() }}</div>
@endsection
