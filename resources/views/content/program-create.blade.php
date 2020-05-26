@extends('layout.main')

@section('content')
<div class="row justify-content-center">
    <h2 class="col-md-8"><span class="header-underline">{{ $cinema->name }} add program:</span></h2>
    <form action="{{ route('programs.insert', ['cinema'=>$cinema]) }}" method="POST" class="col-md-8">
        @csrf
        <div class="row mt-4">
            <div class="col-md-9 form-group">
                <label for="program[movie_id]">Movie</label>
                <select class="form-control @error('program.room_id') is-invalid @enderror" name="program[movie_id]">
                    <option value>Select movie</option>
                    @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}">{{ $movie->name }}</option>
                    @endforeach
                </select>
                @error('program.movie_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-md-3 form-group">
                <label for="program[room_id]">Room</label>
                <select class="form-control @error('program.room_id') is-invalid @enderror" name="program[room_id]">
                    <option value>Select room</option>
                    @foreach ($cinema->rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->number }}</option>
                    @endforeach
                </select>
                @error('program.room_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label>{{ __('Date') }}</label>
        <input type="datetime-local" class="form-control @error('program.date') is-invalid @enderror" name="program[date]" value="{{ old('program.date') }}"/>
            @error('program.date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <input type="hidden" name="program[cinema_id]" value="{{ $cinema->id }}">
        <input type="submit" value="Submit" class="btn btn-info">
    </form>
</div>
@endsection