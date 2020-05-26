@extends('layout.main')

@section('content')
<div class="row justify-content-center">
    <h1 class="col-md-8"><span class="header-underline">{{ __('Add Ownership') }}</span></h1>
    <form action="{{ route('users.ownership.insert') }}" method="POST" class="col-md-8 row mt-3">
        @csrf
        <div class="col-md-6 form-group">
            <select class="form-control" name="cinema">
                <option value>{{ __('Select cinema') }}</option>
                @foreach ($cinemas as $cinema)
                <option value="{{ $cinema->id }}">{{ $cinema->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 form-group">
            <select class="form-control" name="user">
                <option value>{{ __('Select user') }}</option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->email }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary col-md-4 col-6 mx-auto">
    </form>
    <h3 class="col-md-8 mt-4 mb-3">{{ __('Ownerships') }}</h3>
</div>

<div class="table-responsive row m-0">
    <table class="table table-responsive col-md-8 d-block d-md-table table-dark table-striped p-0 mx-auto">
        <tr>
            <th>{{ __('Cinema') }}</th>
            <th>{{ __('Owner email') }}</th>
            <th></th>
        </tr>
        @foreach ($ownerUsers as $ownerUser)
        @foreach ($ownerUser->cinemas as $cinema)
        <tr>
            <td>
                {{ $cinema->name  }}
            </td>
            <td>
                {{ $ownerUser->email }}
            </td>
            <td>
                <form action="{{ route('users.ownership.delete', ['user'=>$ownerUser, 'cinema'=>$cinema]) }}"
                    method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        @endforeach
    </table>
</div>
@endsection