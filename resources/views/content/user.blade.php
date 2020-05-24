@extends('layout.main')

@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible mt-2">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('message') }}
        </p>
    @endif
    <h1><span class="header-underline">Booked tickets:</span></h1>
@endsection