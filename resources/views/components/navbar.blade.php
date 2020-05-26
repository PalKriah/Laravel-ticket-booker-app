<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="/" class="navbar-brand font-weight-bold"><span class="text-primary"><i
                class="fas fa-ticket-alt rotate-45"></i> Ticket</span> Booker</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMain">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
            <a href="{{ route('movies.index') }}" class="nav-link">Movies</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cinemas.index') }}" class="nav-link">Cinemas</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            @guest
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Login</a>
            </li>
            @else
            @if (Auth::user()->isAdmin)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Admin
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('movies.create') }}">Add movie</a>
                    <a class="dropdown-item" href="{{ route('cinemas.create') }}">Add cinema</a>
                    <a class="dropdown-item" href="{{ route('users.ownership') }}">Manage Ownership</a>
                </div>
            </li>
            @endif
            @if (Auth::user()->cinemas->count() > 0)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Owned cinemas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach (Auth::user()->cinemas as $cinema)
                        <a class="dropdown-item" href="{{ route('programs.list', ['cinema'=>$cinema]) }}">{{ $cinema->name }}</a>
                    @endforeach
                </div>
            </li>
            @endif
            
            <li class="nav-item">
                <a href="{{ route('user') }}" class="nav-link">{{ Auth::user()->fullname }}</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endguest
        </ul>
    </div>
</nav>