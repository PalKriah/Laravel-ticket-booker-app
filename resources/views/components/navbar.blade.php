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
                <a href="#" class="nav-link">Movies</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Cinemas</a>
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