@extends('layout.main')

@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible mt-2">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('message') }}
        </p>
    @endif
    <h1><span class="header-underline">Booked tickets:</span></h1>
    @foreach ($tickets as $ticket)
        <div class="card border border-white bg-transparent col-md-10 mx-auto mt-4">
            <div class="row">
                <div class="col-md-6">
                    <h4>Cinema: {{ $ticket->program->cinema->name }}</h4>
                    <h6>{{ $ticket->program->cinema->city }}, {{ $ticket->program->cinema->location }}</h6>
                </div>
                <div class="col-md-6">
                    <h4>Movie:</h4>
                    <h6>{{ $ticket->program->movie->name }}</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-6">
                    <h4>Date:</h4>
                </div>
                <h6 class="col-md-4 col-6 mt-auto">{{ $ticket->program->date }}</h6>
            </div>
            <div class="row">
                <h4 class="col-md-2 col-6">Room: </h4>
                <h4 class="col-md-2 col-6">{{ $ticket->program->room_id }}. Room</h4>
            </div>
            <div class="row">
                <h4 class="col-md-2 col-6">Row: </h4>
                <h4 class="col-md-2 col-6">{{ $ticket->row }}</h4>
            </div>
            <div class="row">
                <h4 class="col-md-2 col-6">Seat: </h4>
                <h4 class="col-md-2 col-6">{{ $ticket->seat }}</h4>
            </div>
        </div>
    @endforeach
@endsection