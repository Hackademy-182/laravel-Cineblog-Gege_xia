<nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container"><a class="navbar-brand fw-bold" href="{{ route('home') }}">CineHouse</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('library.index') }}">Libreria</a></li>
                @auth <li class="nav-item"><a class="nav-link" href="{{ route('library.create') }}">Contribuisci</a>
                </li> @endauth



            </ul>
            <div class="d-flex gap-2">
                @guest
                    <a class="btn btn-outline-dark btn-sm" href="{{ route('login') }}">Login</a>
                    <a class="btn btn-dark btn-sm" href="{{ route('register') }}">Register</a>
                @endguest

                @auth
                    <div class="dropdown">
                        <button class="btn btn-dark btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                            Ciao, {{ auth()->user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profilo</a></li>
                            <li><a class="dropdown-item" href="#">Preferiti</a></li>
                            <li><a class="dropdown-item" href="#">Abbonamento</a></li>
                            <li><a class="dropdown-item" href="#">Libreria</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">@csrf
                                    <button class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth

            </div>
        </div>
    </div>
</nav>
