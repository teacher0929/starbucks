@extends('admin.layouts.app')
@section('title')
    @lang('app.verifications')
@endsection
@section('content')
    <div class="h3 mb-3">
        @lang('app.verifications')
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="small">
            <tr>
                <th>@lang('app.id')</th>
                <th>@lang('app.phone')</th>
                <th>@lang('app.code')</th>
                <th>@lang('app.status')</th>
                <th>@lang('app.createdAt')</th>
                <th>@lang('app.updatedAt')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td><i class="bi-person-bounding-box text-secondary"></i> +993 {{ $obj->phone }}</td>
                    <td><i class="bi-lock-fill text-secondary"></i>  {{ $obj->code }}</td>
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
