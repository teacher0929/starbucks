@extends('client.layouts.app')
@section('title')
    @lang('app.login')
@endsection
@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-8 col-sm-6 col-md-4 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="h3 text-center mb-3">
                        @lang('app.login')
                    </div>
                    <form method="POST" action="{{ route('verify') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="phone" class="form-label fw-semibold">
                                @lang('app.phone') <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">+993</span>
                                <input type="number" min="60000000" max="71999999" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                       name="phone" value="{{ old('phone') }}" required autofocus>
                            </div>
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">@lang('app.verify')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
