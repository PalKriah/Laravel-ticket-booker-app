<?php
    $movie = $programs[0]->name;
?>
<div class="line"></div>
<h3>{{ $date }}:</h3>
<div class="d-flex">
<h5 class="my-auto">{{ $programs[0]->name }}:</h5>
@foreach ($programs as $program)
@if ($movie != $program->name)
    </div>
    <div class="d-flex">
    <h5 class="my-auto">{{ $program->name }}:</h5>
@endif
<a href="{{ route('booking.index', ['program' => $program->id]) }}" class="btn btn-primary btn-time">{{ $program->date }}</a>
@endforeach
</div>