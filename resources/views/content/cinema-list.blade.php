@extends('layout.main')

@section('content')
<h4>Search</h4>
<div class="row">
    <div class="col-md-6 form-group">
        <select class="form-control" name="select" id="searchCountry" onchange="search_change()">
            <option selected value>Select county</option>
            @foreach ($countries as $country)
            <option value="{{ $country->country }}">{{ $country->country }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 form-group">
        <select class="form-control" name="select" id="searchCity" onchange="search_change()">
            <option selected value>Select city</option>
            @foreach ($cities as $city)
            <option value="{{ $city->city }}">{{ $city->city }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6 form-group">
        <select class="form-control" name="select" id="searchMovie" onchange="search_change()">
            <option value>Select movie</option>
            @foreach ($movies as $movieItem)
            <option {{ $movie && $movie->id == $movieItem->id ? 'selected': '' }} value="{{ $movieItem->id }}">{{ $movieItem->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<h1><span class="header-underline">Cinemas:</span></h1>
<div id="list">

</div>
<script>
    $(document).ready(function(){
        search_change();
    });

    function fetch_cinema_data(country, city, movie)
    {
        $.ajax({
            url: "{{ route('cinemas.search') }}",
            method: 'GET',
            data:{
                country: country,
                city: city,
                movie: movie
            },
            dataType: 'json',
            success: function(data)
            {
                $('#list').html(data.data);
            }
        });
    }
     
    function search_change() {
        var country = document.getElementById("searchCountry").value;
        var city = document.getElementById("searchCity").value;
        var movie = document.getElementById("searchMovie").value;
        fetch_cinema_data(country, city, movie);
     }
</script>
@endsection