<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mb-1 border border-bottom shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="/image/LOGOP (1).png" height="60px" width=60px" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mx-3">
                    <a class="nav-link active hoverborder" aria-current="page" href="{{route('ads.index')}}">Tutti gli
                        annunci</a>
                </li>
                <li class="nav-item mx-3">
                    @auth
                    <a class="nav-link active hoverborder" aria-current="page" href="{{route('ads.create')}}">Crea
                        annuncio</a>
                    @else
                    <a class="nav-link active hoverborder" aria-current="page" href="{{ route('register') }}">Crea
                        annuncio</a>
                    @endauth
                </li>
                <div class="dropdown mx-3">
                    <button class="btn btn-lr dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="flase">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                            <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                        </svg>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li class="dropdown-item"><x-_locale lang="it" nation="it" /></li>
                      <li class="dropdown-item"><x-_locale lang="en" nation="gb" /></li>
                      <li class="dropdown-item"><x-_locale lang="es" nation="es" /></li>
                    </ul>
                </div>
            </ul>
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <div class="d-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle categorieclass" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorie
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item" href="{{route('public.ads.category',[
                                    $category->name,
                                    $category->id
                                ])}}">{{$category->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <form action="{{route('search')}}" method="GET" class="d-flex">
                        <input class="form-control me-2 nav-i" type="search" name="q" placeholder="Cerca su Presto..."
                            aria-label="Search">
                        <button class="shadow btnsearch " type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </form>
                </div>
                @auth
                <li class="nav-item mx-3">
                    <a class="nav-link active hoverborder" aria-current="page" href="{{route('contact_us')}}">Diventa
                        Revisore</a>
                </li>
                @endauth
                <li class="nav-item mx-3">
                        <a class="nav-link active hoverborder" aria-current="page" href="{{route('guest_contact')}}">Contattaci</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <button class="btn-lr fw-bold mx-2 border-0 shadow">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </button>
                </li>

                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <button class="btn-lr fw-bold mx-2 border-0 shadow">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </button>
                </li>
                @endif
                @else

                @if (Auth::user()->is_revisor)
                <li class="nav-item mx-3">
                    <a class="nav-link text-dark" href="{{ route('revisor.home')}}">
                        Revisiona
                        <span class="badge rounded-pill bg-warning text-dark">
                            {{\App\Models\Ad::ToBeRevisionedCount()}}
                        </span>
                    </a>
                </li>
                @endif
                {{-- @if (Auth::user()->is_admin)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.home')}}">
                        Admin Home
                        <span class="badge rounded-pill bg-success text-dark">
                            {{\App\Models\User::ToBeRevisionedCount()}}
                        </span>
                    </a>
                </li>
                @endif --}}

                <div class="dropdown">
                    <a class="btn btn-lr mx-2 border-0 shadow dropdown-toggle" href="#" role="button"
                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('ads.index_user') }}">Profilo</a>
                        </li>
                    </ul>
                </div>
                @endguest
            </ul>
        </div>
    </div>
</nav>
