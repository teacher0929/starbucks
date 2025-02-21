@extends('admin.layouts.app')
@section('title')
    @lang('app.gifts')
@endsection
@section('content')
    <div class="h3 mb-3">
        @lang('app.gifts')
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="small">
            <tr>
                <th>@lang('app.id')</th>
                <th>@lang('app.customer')</th>
                <th>@lang('app.startsAt')</th>
                <th>@lang('app.endsAt')</th>
                <th>@lang('app.note')</th>
                <th style="width:20%">@lang('app.status')</th>
                <th>@lang('app.createdAt')</th>
                <th>@lang('app.updatedAt')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td><i class="bi-person-bounding-box text-secondary"></i> {{ $obj->customer->getName() }}</td>
                    <td>{{ $obj->starts_at->format('Y-m-d') }}</td>
                    <td>{{ $obj->ends_at->format('Y-m-d') }}</td>
                    <td>{{ $obj->note }}</td>
                    <td>
                        <span class="badge bg-{{ $obj->statusColor() }}-subtle text-{{ $obj->statusColor() }}-emphasis">
                            {{ $obj->status() }}
                        </span>
                    </td>
                    <td>{{ $obj->created_at }}</td>
                    <td>{{ $obj->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>{{ $objs->links() }}</div>
@endsection
