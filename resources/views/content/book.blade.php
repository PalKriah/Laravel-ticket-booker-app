@extends('layout.main')

@section('content')
<h3><span class="header-underline">Movie:</span></h3>
<p>{{ $program->movie->name }}</p>
<h3><span class="header-underline">Cinema:</span></h3>
<h6>{{ $program->cinema->name }}</h6>
<p>{{ $program->cinema->city }}, {{ $program->cinema->location }}</p>
<h3><span class="header-underline">Date:</h3>
<p>{{ $program->date }}</p>
<div class="line"></div>
<h4>Room: {{ $program->room->number }}</span></h4>
<div class="card bg-light col-md-8 m-auto overflow-auto">
    <div class="screen mb-2"></div>
    @foreach ($program->room->rows as $row)
    <div class="d-flex justify-content-center mb-2">
        <span class="text-dark my-auto mr-1">{{ $row->row_number }}.</span>
        @for ($i = 1; $i <= $row->seat_count; $i++)
            <?php $found = false;?>
            @foreach ($program->bookings as $item)
            @if ($item->row == $row->row_number && $item->seat == $i)
            <button class="btn btn-danger btn-sm mr-1" disabled>{{ $i }}</button>
            <?php $found = true; ?>
            @endif
            @endforeach
            @if (!$found)
            <button class="btn btn-outline-secondary btn-sm mr-1"
                onclick="toggle(this, '{{ $row->row_number }}', '{{ $i }}')" value="OFF" data-toggle="button"
                aria-pressed="false">{{ $i }}</button>
            @endif
            @endfor
    </div>
    @endforeach
</div>
@if ($errors->any())
<div class="alert alert-danger alert-dismissible col-8 mx-auto mt-2">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
@endif
<form id="book-form" action="{{ route('booking.post') }}" method="POST">
    @csrf
    <input type="hidden" name="selected" id="toggled">
    <input type="hidden" name="program" value="{{ $program->id }}">
    <button type="submit" class="btn btn-block btn-primary my-2 col-md-8 mx-auto">Book seats</button>
</form>

<script>
    toggled = [];
    function toggle(button, row, seat) {
        if (button.value == "OFF") {
            button.value = "ON";
            toggled.push({row: row, seat: seat});
            document.getElementById('toggled').value = JSON.stringify(toggled);
        } else {
            button.value = "OFF";
            for (let i = 0; i < toggled.length; i++) {
                if(toggled[i].row == row && toggled[i].seat == seat) {
                    toggled.splice(i, 1);
                }
            }
            document.getElementById('toggled').value = JSON.stringify(toggled);
        }
    }
</script>
@endsection