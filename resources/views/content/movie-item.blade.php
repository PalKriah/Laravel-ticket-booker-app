@extends('layout.main')

@section('content')
<div class="row justify-content-center mt-10" id="movie-item">
    <div class="col-md-4 text-center">
        <img src="{{ asset($movie->poster_path) }}" alt="">
    </div>
    <div class="col-md-6">
        <div class="flex-d flex-column">
            @auth
            @if (Auth::user()->isAdmin)
            <div class="flex-d flex-row text-right">
                <a href="{{ route('movies.edit', ['movie'=>$movie]) }}" class="btn btn-light">Edit <i class="fas fa-pencil-alt"></i></a>
                <a href="{{ route('movies.delete', ['movie'=>$movie]) }}" class="btn btn-danger" onclick="event.preventDefault();
                    document.getElementById('delete-form').submit();"><i class="fas fa-times"></i></a>
                <form id="delete-form" action="{{ route('movies.delete', ['movie'=>$movie]) }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            @endif
            @endauth
            <h4 class="text-center"><span class="header-underline">{{ $movie->name }}</span></h4>
            <h5 class="mt-3">Genre :</h5>
            <p>
                @foreach ($movie->genres as $genre)
                <span class="genre-label">{{ $genre->name }}</span>
                @endforeach
            </p>
            <h5>Description :</h5>
            <p>{{ $movie->description }}</p>
                <a href="{{ route('cinemas.index', ['movie' => $movie->id]) }}" class="btn btn-block btn-primary">View cinemas</a>
        </div>
    </div>
</div>
@endsection