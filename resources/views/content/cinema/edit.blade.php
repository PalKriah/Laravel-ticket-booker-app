@extends('layout.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1><span class="header-underline">{{ __('Edit Cinema') }}</span></h1>
        <form action="{{ route('cinemas.update', ['cinema'=>$cinema]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="cinema[name]">{{ __('Name') }}</label>
                <input class="form-control @error('cinema.name') is-invalid @enderror" type="text" name="cinema[name]"
                    value="{{ old('cinema.name', $cinema->name) }}">
                @error('cinema.name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="cinema[country]">{{ __('Country') }}</label>
                <input class="form-control @error('cinema.country') is-invalid @enderror" type="text"
                    name="cinema[country]" value="{{ old('cinema.country', $cinema->country) }}">
                @error('cinema.country')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="cinema[city]">{{ __('City') }}</label>
                <input class="form-control @error('cinema.city') is-invalid @enderror" type="text"
                    name="cinema[city]" value="{{ old('cinema.city', $cinema->city) }}">
                @error('cinema.city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="cinema[location]">{{ __('Location') }}</label>
                <input class="form-control @error('cinema.location') is-invalid @enderror" type="text"
                    name="cinema[location]" value="{{ old('cinema.location', $cinema->location) }}">
                @error('cinema.location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <input type="submit" name="submit" class="btn btn-info mt-2" value="Submit"/>
        </form>
    </div>
</div>
@endsection