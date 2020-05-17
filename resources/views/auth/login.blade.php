@extends('layout.main')

@section('content')
<div class="row justify-content-center">
    <h1 class="col-md-8">Login</h1>
    <form method="POST" action="{{ route('login') }}" class="col-md-8">
        @csrf
        <div class="form-group">
            <label for="email" class="col-form-label">Email Address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="col-form-label">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">
                    Login
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection