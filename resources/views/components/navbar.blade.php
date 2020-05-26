<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="/" class="navbar-brand font-weight-bold"><span class="text-primary"><i
                class="fas fa-ticket-alt rotate-45"></i> Ticket</span> Booker</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMain">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a href="/" class="nav-link">{{ __('Home') }}</a>
            </li>
            <li class="nav-item">
            <a href="{{ route('movies.index') }}" class="nav-link">{{ __('Movies') }}</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cinemas.index') }}" class="nav-link">{{ __('Cinemas') }}</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            @guest
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a>
            </li>
            @else
            @if (Auth::user()->isAdmin)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ __('Admin') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('movies.create') }}">{{ __('Add movie') }}</a>
                    <a class="dropdown-item" href="{{ route('cinemas.create') }}">{{ __('Add cinema') }}</a>
                    <a class="dropdown-item" href="{{ route('users.ownership') }}">{{ __('Manage Ownership') }}</a>
                </div>
            </li>
            @endif
            @if (Auth::user()->cinemas->count() > 0)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ __('Owned cinemas') }}
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
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endguest
        </ul>
    </div>
</nav>