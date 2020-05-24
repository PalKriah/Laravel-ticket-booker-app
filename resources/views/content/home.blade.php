@extends('layout.main')

@section('content')
<div id="section-one">
    <h1><span class="header-underline">Book your ticket with us</span></h1>
    <p>We provide a ticket booking service at our partner cinemas.</p>
    @auth
    <a href="{{ route('movies.index') }}" class="btn btn-primary btn-main">Book a ticket</a>
    @endauth

    @guest
    <a href="{{ route('login') }}" class="btn btn-primary btn-main">Book a ticket</a>
    @endguest

</div>
<div class="line"></div>
<div id="section-two">
    <h1><span class="header-underline">What we offer</span></h1>
    <div class="row mt-3">
        <div class="col-md-4 col-12">
            <div class="box">
                <i class="fa fa-film fa-4x"></i>
                <div class="line"></div>
                <p>View what movies are coming out and where.</p>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="box">
                <i class="fas fa-ticket-alt fa-4x"></i>
                <div class="line"></div>
                <p>Book a ticket to a movie at your favourite cinema.</p>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="box">
                <i class="fas fa-clipboard-list fa-4x"></i>
                <div class="line"></div>
                <p>View and manage all your bookings at one place.</p>
            </div>
        </div>
    </div>
</div>
@endsection