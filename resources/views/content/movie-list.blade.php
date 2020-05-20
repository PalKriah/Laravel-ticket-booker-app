@extends('layout.main')

@section('content')
<div class="row" id="movie-list">
    @foreach ($movies as $movie)
    <div class="col-md-4 col-12 d-flex flex-column justify-content-center mt-2 mb-2">
        <img class="m-auto" src="{{ asset($movie->poster_path) }}" alt="">
        <a href="{{ route('movies.show', ['movie' => $movie->id]) }}" class="text-center">{{ $movie->name }}</a>
    </div>
    @endforeach
</div>
@endsection