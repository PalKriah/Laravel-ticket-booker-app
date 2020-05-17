@extends('layout.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h3 class="text-center">Reset Password</h3>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email" class="col-form-label text-md-right">Email Address</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ $email ?? old('email') }}" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="col-form-label text-md-right">Password</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-form-label text-md-right">Confirm Password</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>

            <div class="form-group row justify-content-center">
                <button type="submit" class="btn btn-primary">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection