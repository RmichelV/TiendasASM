<!doctype html>
<html lang="en">
    <head>
        <title>TiendaASM</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        
        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <link rel="stylesheet" href="{{ asset('css/template.css') }}">
        

        <!-- fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jacquard+12&family=Jaro:opsz@6..72&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    </head>

    <body style="background-color: rgba(50, 127, 152, 0.602);">
        @php
            $user = Auth::user();
        @endphp
        <header>
            <nav class="navbar navbar-expand-lg bg-black border-bottom border-body" data-bs-theme="dark" >
                <div class="container-fluid" style="background-color: #0A526B">
                    <a class="navbar-brand" href="dashboard" style="font-family: 'Sherif FB', sans-serif;">Bienvenida</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: #0A526B">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/" style="font-family: ">Catalogo</a>
                            </li>
                            @auth
                                @if($user->id_rol==1)
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Registros
                                        </a>
                                        <ul class="dropdown-menu">
                                            {{-- <li><a class="dropdown-item" href="{{url('estados')}}">Estados de Venta</a></li> --}}
                                            <li><a class="dropdown-item" href="{{url('generos')}}">Géneros</a></li>
                                            {{-- <li><a class="dropdown-item" href="{{url('metodos')}}">Métodos de pago</a></li> --}}
                                            <li><a class="dropdown-item" href="{{url('plataformas')}}">Plataformas</a></li>
                                            {{-- <li><a class="dropdown-item" href="{{url('rols')}}">Rols</a></li> --}}
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="{{url('users')}}">Lista de usuarios</a></li>
                                            <li><a class="dropdown-item" href="{{url('tiendas')}}">Lista de Tiendas</a></li>
                                        </ul>
                                    </li>
                                    
                            @endif
                            @if ($user->id_rol==2)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Ventas
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{url('detalle_ventas')}}">Registrar Venta fisica</a></li>
                                        <li><a class="dropdown-item" href="{{url('ventas')}}">Ver registro de Ventas</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('juegos')}}">Mis Juegos</a>
                                </li>
                            @endif
                            @endauth
                            <!--             samuel ---->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Filtrar por Género
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 1]) }}">Acción</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 2]) }}">Aventura</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 3]) }}">Carreras</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 4]) }}">Deportes</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 5]) }}">Educacionales</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 6]) }}">Indie</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 7]) }}">Lucha</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 8]) }}">MMO (Multijugador Masivo Online)</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 9]) }}">Mundo abierto</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 10]) }}">Musicales</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 11]) }}">Novela visual</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 12]) }}">Puzzle</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 13]) }}">Plataforma</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 14]) }}">Rol (RPG)</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 15]) }}">Sandbox</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 16]) }}">Simulación</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 17]) }}">Shooter</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 18]) }}">Supervivencia</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorGenero', ['id_genero' => 19]) }}">Terror</a></li>
                                </ul>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Plataformas
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorPlataforma', 1) }}">PC</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorPlataforma', 2) }}">PlayStation 5</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorPlataforma', 3) }}">PlayStation 4</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorPlataforma', 4) }}">Xbox One</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorPlataforma', 5) }}">Xbox Series XS</a></li>
                                    <li><a class="dropdown-item" href="{{ route('juegos.filtrarPorPlataforma', 6) }}">Nintendo Switch</a></li>
                                </ul>
                            </li>
                            
                            </li>
                            <!--             samuel ---->

                        </ul>

                        @auth
                           
                        @endauth
                        <form class="d-flex" role="search" action="{{ route('buscador.index') }}" method="GET">
                            <input class="form-control me-2" name="query" type="search" placeholder="Buscar" aria-label="Search" value="{{ request()->input('query') }}">
                            <button class="btn btn-outline-light" type="submit">Buscar</button>
                        </form>
                        
                        @if (Route::has('login'))
                        
                                @auth
                                @if ($user->id_rol==3)
                                    <li class="nav-item">
                                        <a class="nav-link img-carrito" href="{{url('carritos')}}">
                                            {{-- Mi Carrito --}}
                                            <img src="{{ asset('img/carrito.png') }}" alt="" class="carrito">
                                        </a>
                                    </li>
                                @endif
                                    {{-- <a
                                        href="{{ url('Profile.edit') }}"
                                        class="rounded-md px-3 py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        style="color: aqua"
                                    >
                                        Dashboard
                                    </a> --}}
                                        <a href="{{ route('profile.edit') }}"  class="rounded-md px-3 py-2  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        style="color: #1098A4">{{ __('Perfil') }}</a>
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}" class="rounded-md px-3 py-2  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        style="color: #1098A4 ">
                                            @csrf
                                            <button type="submit">{{ __('Cerrar Sesión') }}</button>
                                        </form>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        style="color: rgba(52, 174, 208, 0.694)"
                                    >
                                        Iniciar Sesión
                                    </a>
                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                            style="color: rgba(52, 174, 208, 0.694)"
                                        >
                                            Registrarse
                                        </a>
                                    @endif
                                @endauth
                        @endif
                    </div>
                </div>
            </nav>
        </header>
        <div id="carouselExampleAutoplaying" class="carousel slide ch" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{asset('img/cs1.jpeg')}}" class="d-block w-100 cim" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{asset('img/cs2.webp')}}" class="d-block w-100 cim" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{asset('img/cs3.webp')}}" class="d-block w-100 cim" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/cs4.jpeg')}}" class="d-block w-100 cim" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <main>
            @yield('content')
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
