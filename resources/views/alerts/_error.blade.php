@if (Session::has('error'))
    <p class="alert alert-danger alert-dismissible mt-2">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ Session::get('error') }}
    </p>
@endif