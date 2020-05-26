@extends('layout.main')

@section('content')
<div class="row justify-content-center">
    <h1 class="col-md-10"><span class="header-underline">{{ $cinema->name }}</span></h1>

    <h3 class="col-md-8">{{ __('Programs:') }}</h3>
    <div class="col-md-8 mb-2 text-right">
        <a href="{{ route('programs.create', ['cinema'=>$cinema]) }}" class="btn btn-success"><i class="fas fa-plus"></i> {{ __('Add') }}</a>
    </div>
    <table class="table table-responsive col-md-8 d-block d-md-table table-dark table-striped p-0 mx-auto">
        <tr>
            <th>{{ __('Movie') }}</th>
            <th>{{ __('Room') }}</th>
            <th>{{ __('Date') }}</th>
            <th></th>
        </tr>
        @foreach ($cinema->programs()->where('date', '>', date("Y-m-d h:i:sa"))->orderBy('date')->get() as $program)
        <tr>
            <td class="align-middle">
                {{ $program->movie->name  }}
            </td>
            <td class="align-middle">
                {{ $program->room->number }}
            </td>
            <td class="align-middle">
                {{ $program->date }}
            </td>
            <td class="align-middle">
                <form action="{{ route('programs.delete', ['cinema'=>$cinema, 'program'=>$program]) }}"
                    method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <h3 class="col-md-8">{{ __('Rooms:') }}</h3>
    <div class="col-md-8 mb-2 text-right">
        <a href="{{ route('rooms.create', ['cinema'=>$cinema]) }}" class="btn btn-success"><i class="fas fa-plus"></i> {{ __('Add') }}</a>
    </div>
    <table class="table table-responsive col-md-8 d-block d-md-table table-dark table-striped p-0 mx-auto">
        <tr>
            <th>{{ __('Number') }}</th>
            <th>{{ __('Rows') }}</th>
            <th>{{ __('Seats') }}</th>
            <th></th>
        </tr>
        @foreach ($cinema->rooms()->orderBy('number')->get() as $room)
        <tr>
            <td class="align-middle">
                {{ $room->number  }}
            </td>
            <td class="align-middle">
                {{ $room->rows->count() }}
            </td>
            <td class="align-middle">
                {{ $room->seatCount }}
            </td>
            <td class="align-middle">
                <form action="{{ route('rooms.delete', ['cinema'=>$cinema, 'room'=>$room]) }}"
                    method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection