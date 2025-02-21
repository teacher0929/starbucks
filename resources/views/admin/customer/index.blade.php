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
                <th>@lang('app.invited')</th>
                <th>@lang('app.platform')<br>@lang('app.language')</th>
                <th>@lang('app.name')<br>@lang('app.surname')</th>
                <th>@lang('app.username')</th>
                <th>@lang('app.invitationCode')</th>
                <th>@lang('app.lastSeen')</th>
                <th>@lang('app.createdAt')</th>
                <th>@lang('app.updatedAt')</th>
                <th>@lang('app.invites')</th>
                <th>@lang('app.orders')</th>
                <th>@lang('app.reviews')</th>
                <th>@lang('app.notifications')</th>
                <th>@lang('app.gifts')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>
                        @if($obj->invited_id)
                            <i class="bi-person-bounding-box text-secondary"></i> {{ $obj->invited->getName() }}
                        @endif
                    </td>
                    <td>{{ $obj->platform() }}, {{ $obj->language() }}</td>
                    <td><i class="bi-person-bounding-box text-secondary"></i> {{ $obj->name }} {{ $obj->surname }}</td>
                    <td>+993 {{ $obj->username }}</td>
                    <td class="font-monospace">{{ $obj->invitation_code }}</td>
                    <td>{{ $obj->last_seen }}</td>
                    <td>{{ $obj->created_at }}</td>
                    <td>{{ $obj->updated_at }}</td>
                    <td><a href="{{ route('admin.customers.index', ['invited' => $obj->id]) }}" class="text-decoration-none" target="_blank">{{ $obj->invites_count }}</a></td>
                    <td><a href="{{ route('admin.orders.index', ['customer' => $obj->id]) }}" class="text-decoration-none" target="_blank">{{ $obj->orders_count }}</a></td>
                    <td><a href="{{ route('admin.reviews.index', ['customer' => $obj->id]) }}" class="text-decoration-none" target="_blank">{{ $obj->reviews_count }}</a></td>
                    <td><a href="{{ route('admin.notifications.index', ['customer' => $obj->id]) }}" class="text-decoration-none" target="_blank">{{ $obj->notifications_count }}</a></td>
                    <td><a href="{{ route('admin.gifts.index', ['customer' => $obj->id]) }}" class="text-decoration-none" target="_blank">{{ $obj->gifts_count }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>{{ $objs->links() }}</div>
@endsection
