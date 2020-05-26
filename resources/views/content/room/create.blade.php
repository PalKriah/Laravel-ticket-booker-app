@extends('layout.main')

@section('content')
<div class="row justify-content-center">
    <h2 class="col-md-8"><span class="header-underline">{{ $cinema->name }} add room:</span></h2>
    <form action="{{ route('rooms.insert', ['cinema'=>$cinema]) }}" method="POST" class="col-md-8">
        @csrf
        <div class="form-group">
            <label for="room[number]">{{ __('Number') }}</label>
            <input type="number" class="form-control @error('room.number') is-invalid @enderror" name="room[number]" value="{{ old('room.number') }}"/>
            @error('room.number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <input type="hidden" name="room[cinema_id]" value="{{ $cinema->id }}">

        <div class="table-responsive">
            <table class="table table-bordered" id="dynamic_field">
                <tr>
                    <td id="row">
                        <div class="form-group d-flex">
                            <label for="rows[]" class="text-white mr-2 my-auto">1.</label>
                            <input type="text" name="rows[]" class="form-control" placeholder="Row seat count">
                        </div>
                    </td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">{{ __('Add More') }}</button></td>
                </tr>
            </table>
        </div>

        <input type="submit" value="Submit" class="btn btn-info">
    </form>
</div>

<script>
    $(document).ready(function(){  
             var i = 1;
             $('#add').click(function(){
                i++;
                row = '<tr><td><div class="form-group d-flex"><label for="rows[]" class="text-white mr-2 my-auto">'+i+'.</label><input type="text" name="rows[]" class="form-control" placeholder="Row seat count"></div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'
                $('#dynamic_field').append(row);  
             });  
             $(document).on('click', '.btn_remove', function(){  
                  var button_id = $(this).attr("id");   
                  $('#row'+button_id+'').remove();  
             });  
        });  
</script>
@endsection