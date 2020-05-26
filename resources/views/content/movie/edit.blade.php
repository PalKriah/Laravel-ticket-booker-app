@extends('layout.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1><span class="header-underline">{{ __('Update Movie') }}</span></h1>
        <form action="{{ route('movies.update', ['movie' => $movie]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="movie[name]">{{ __('Name') }}</label>
                <input class="form-control @error('movie.name') is-invalid @enderror" type="text" name="movie[name]"
                    value="{{ old('movie.name', $movie->name) }}">
                @error('movie.name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <label>{{ __('Genres') }}</label>
            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td id="selectGenre">
                            <select class="form-control" name="genres[]">
                                <option selected value>{{ __('Select genre') }}</option>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}" @if($genre->id == $movie->genres[0]->id) selected @endif>{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                    @if ($movie->genres->count() > 1)
                    @for ($i = 1; $i < $movie->genres->count(); $i++)
                    <tr id="row{{ $i }}">
                        <td id="selectGenre">
                            <select class="form-control" name="genres[]">
                                <option selected value>{{ __('Select genre') }}</option>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}" @if($genre->id == $movie->genres[$i]->id) selected @endif>{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><button type="button" name="remove" id="{{ $i }}" class="btn btn-danger btn_remove">X</button></td>
                    </tr>
                    @endfor
                    @endif
                </table>
            </div>

            <div class="form-group">
                <label for="movie[description]">{{ __('Description') }}</label>
                <textarea class="form-control @error('movie.description') is-invalid @enderror" type="text"
                    name="movie[description]">{{ old('movie.description', $movie->description) }}</textarea>
                @error('movie.description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="custom-file form-group">
                <input type="file" class="custom-file-input" name="file">
                <label class="custom-file-label" for="file">{{ __('Choose file') }}</label>
            </div>
            
            <input type="submit" name="submit" class="btn btn-info mt-2" value="Submit"/>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){  
             var i = 1;
             $('#add').click(function(){
                let clone = document.querySelector('#selectGenre').cloneNode( true );

                clone.setAttribute( 'id', 'selectGenre' + i );
                i++;
                row = '<tr id="row'+i+'"><td>'+ clone.innerHTML + '</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'
                $('#dynamic_field').append(row);  
             });  
             $(document).on('click', '.btn_remove', function(){  
                  var button_id = $(this).attr("id");   
                  $('#row'+button_id+'').remove();  
             });  
        });  
</script>
@endsection