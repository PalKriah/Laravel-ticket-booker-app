@extends('layout.main')

@section('content')
    <h1><span class="header-underline">{{ __('Booked tickets:') }}</span></h1>
    @foreach ($tickets as $ticket)
        <div class="card border border-white bg-transparent col-md-10 mx-auto mt-4">
            <div class="row">
                <div class="col-md-6">
                    <h4>{{ __('Cinema:') }} {{ $ticket->program->cinema->name }}</h4>
                    <h6>{{ $ticket->program->cinema->city }}, {{ $ticket->program->cinema->location }}</h6>
                </div>
                <div class="col-md-6">
                    <h4>{{ __('Movie:') }}</h4>
                    <h6>{{ $ticket->program->movie->name }}</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-6">
                    <h4>{{ __('Date:') }}</h4>
                </div>
                <h6 class="col-md-4 col-6 mt-auto">{{ $ticket->program->date }}</h6>
            </div>
            <div class="row">
                <h4 class="col-md-2 col-6">{{ __('Room:') }} </h4>
                <h4 class="col-md-2 col-6">{{ $ticket->program->room_id }}. {{ __('Room') }}</h4>
            </div>
            <div class="row">
                <h4 class="col-md-2 col-6">{{ __('Row:') }} </h4>
                <h4 class="col-md-2 col-6">{{ $ticket->row }}</h4>
            </div>
            <div class="row">
                <h4 class="col-md-2 col-6">{{ __('Seat:') }} </h4>
                <h4 class="col-md-2 col-6">{{ $ticket->seat }}</h4>
            </div>
        </div>
    @endforeach
@endsection