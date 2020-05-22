@foreach ($cinemas as $cinema)
<div class="row mt-4 justify-content-center text-center">
    <h6 class="col-md-3 col-10 border border-white p-2">{{ $cinema->name }}</h6>
    <h6 class="col-md-3 col-10 border border-white p-2">{{ $cinema->country }}</h6>
    <h6 class="col-md-3 col-10 border border-white p-2">{{ $cinema->city }}, {{ $cinema->location }}</h6>
</div>
<div class="row justify-content-center">
<a href="{{ route('cinema.schedule', ['cinema' => $cinema->id]) }}" class="btn btn-primary col-md-2 col-6">View
        schedule</a>
</div>
@endforeach