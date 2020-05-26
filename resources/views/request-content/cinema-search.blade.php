@foreach ($cinemas as $cinema)
<div class="row justify-content-center text-dark my-4 cinema-search">
    <div class="card col-md-10 p-0 transparant">
        <div class="card-header d-flex">
            <h4>{{ $cinema->name }}</h4>
            @auth
            @if (Auth::user()->isAdmin)
            <div class="d-flex ml-auto">
                <a href="{{ route('cinemas.edit', ['cinema'=>$cinema->id]) }}" class="btn btn-info mr-2"><i
                        class="fas fa-pencil-alt"></i></a>
                <form action="{{ route('cinemas.delete', ['cinema'=>$cinema->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                </form>
            </div>
            @endif
            @endauth
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">Country: {{ $cinema->country }}</li>
                <li class="list-group-item">Location: {{ $cinema->city }}, {{ $cinema->location }}</li>
            </ul>
            <div class="row justify-content-end m-0 mt-2">
                <a href="{{ route('cinemas.show', ['cinema' => $cinema->id]) }}"
                    class="btn btn-primary col-md-2 col-6">View
                    schedule</a>
            </div>
        </div>
    </div>
</div>
@endforeach