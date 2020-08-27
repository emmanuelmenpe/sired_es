<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIRED') }}</title>
    {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}

    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('js/partido.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    
</head> 
<body>
    <div class="navbaractive">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">SIRED</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="{{ Request::is('/') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                </li>
 
                <li class="{{ Request::is('equipos') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ url('/equipos') }}">Equipos</a>
                </li>

                <li class="{{ Request::is('partidos') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/partidos') }}">Partidos</a>
                </li>

                <li class="{{ Request::is('resultados') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/resultados') }}">Resultados</a>
                </li>
                <li class="{{ Request::is('anotaciones/futbol') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/anotaciones/futbol') }}">Anotaciones</a>
                </li>
                @can('administrador')
                    <li class="{{ Request::is('canchas') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/canchas') }}">Canchas</a>
                    </li>

                    <li class="{{ Request::is('arbitros') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/arbitros') }}">Árbitros</a>
                    </li>
                @endcan
              </ul>
            </div>

            <div class="list-group" style="background-color: cornflowerblue">
                <a href="#" class="d-block">
                    @guest
                    <a class="nav-link" href="{{ route('login') }}">
                        {{ __('Iniciar Sesión') }} 
                    </a>
                    @else
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Cerrar Sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>

                    @endguest
                </a>
            </div>

        </nav>
        <main class="py-4">
            @yield('content')
            
        </main>
    </div>
</body>
</html>
