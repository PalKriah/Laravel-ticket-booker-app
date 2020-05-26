@extends('layout.main')

@section('content')
<div class="row justify-content-center">
    <h1 class="col-md-8">{{ __('Register') }}</h1>
    <form action="{{ route('register') }}" method="POST" class="col-md-8">
        @csrf
        <div class="row">
            <div class="form-group col-md-6 col-12">
                <label for="firstname">{{ __('First name') }}</label>
                <input class="form-control @error('firstname') is-invalid @enderror" type="text" name="firstname"
                    value="{{ old('firstname') }}" autofocus>
                @error('firstname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="lastname">{{ __('Last name') }}</label>
                <input class="form-control @error('lastname') is-invalid @enderror" type="text" name="lastname"
                    value="{{ old('lastname') }}">
                @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="email">{{ __('Email address') }}</label>
            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                value="{{ old('email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="row">
            <div class="form-group col-md-6 col-12">
                <label for="password">{{ __('Password') }}</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="password_confirmation">{{ __('Password confirmation') }}</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password"
                    name="password_confirmation">
            </div>
        </div>
        <div class="form-group mt-3 text-right">
            <button class="btn btn-primary " type="submit">{{ __('Register') }}</button>
        </div>
    </form>
</div>
@endsection