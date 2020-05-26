@if (Session::has('success'))
    <p class="alert alert-success alert-dismissible mt-2">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ Session::get('success') }}
    </p>
@endif