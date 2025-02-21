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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="phone" class="form-label fw-semibold">
                                @lang('app.phone') <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">+993</span>
                                <input type="number" min="60000000" max="71999999" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                       name="phone" value="{{ $phone }}" readonly>
                            </div>
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="code" class="form-label fw-semibold">
                                @lang('app.code') <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi-lock-fill"></i></span>
                                <input type="number" min="10000" max="99999" class="form-control @error('code') is-invalid @enderror" id="code"
                                       name="code" value="{{ $code  }}" readonly>
                            </div>
                            @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">
                                @lang('app.name') <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="surname" class="form-label fw-semibold">
                                @lang('app.surname') <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname"
                                   name="surname" value="{{ old('surname') }}" required>
                            @error('surname')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="invitation_code" class="form-label fw-semibold">
                                @lang('app.invitationCode')
                            </label>
                            <input type="text" class="form-control @error('invitation_code') is-invalid @enderror" id="invitation_code"
                                   name="invitation_code" value="{{ old('invitation_code') }}">
                            @error('invitation_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">@lang('app.login')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
