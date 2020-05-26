@extends('layout.main')

@section('content')
<h1 class="text-center mb-4"><span class="header-underline">{{ $cinema->name }}</span></h1>
<h4 class="text-center">{{ $cinema->country }}, {{ $cinema->city }}, {{ $cinema->location }}</h4>
<div class="line"></div>
@foreach ($dates as $date)
<h2><a class="text-primary">{{ $date['year'] }} {{ $date['month_name'] }}</a></h2>
@foreach ($date['date'] as $days)
<span><a href="#" class="{{ $days['active'] == 1 ? '' : 'disabled' }}"
        onclick="fetch_day_schedule('{{ $date['year'] }}', '{{ $date['month'] }}', {{ $days['number'] }}, {{ $cinema->id }})">{{ $days['number'] }}</a></span>
@endforeach
@endforeach
<div id="list">

</div>


<script>
    function fetch_day_schedule(year, month, day, cinema)
    {
        $.ajax({
            url: "{{ route('cinemas.schedule') }}",
            method: 'GET',
            data:{
                year: year,
                month: month,
                day: day,
                cinema: cinema
            },
            dataType: 'json',
            success: function(data)
            {
                $('#list').html(data);
            }
        });
    }
</script>
@endsection