<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0 p-3 border-bottom fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand navbar-md-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0" >
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('azienda') }}">Azienda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Prodotti
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="{{ route('passepartout') }}">Passepartout</a></li>
                        <li><a class="dropdown-item" href="{{ route('cornici') }}">Cornici</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('noleggio') }}">Noleggio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contatti') }}">Contatti</a>
                </li>
                @auth

                @if(Auth::user()->is_revisor)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.revisorDashboard') }}">Revisore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('richieste.richiesteP') }}"><i class="far fa-bell"></i></a>
                </li>
                @endif
                @endauth

                @guest
                 
                @if (Route::has('login'))
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif
                
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
      
            @endguest
        </ul>
        <form class="d-flex">
            <input class="form-control me-2 bg-dark txt-chiaro border-white" type="search" placeholder="cerca nel sito" aria-label="Search">
            <button class="btn-pppSearch shadow-dark shadow-h-none" type="submit">cerca</button>
        </form>
    </div>
</div>
</nav>