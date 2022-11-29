<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Quotation' }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=roboto" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body style="font-family: Roboto;">
    <div id="app" style="background-color: lightgray;">
        <nav class="navbar navbar-expand-md" style="background-color: #b7f165;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('storage/logonew.png')}}" style="width: 7%;">{{ 'Quotation' }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('change'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color: Black;" href="{{ route('change') }}">{{ __('Conversor') }}</a>
                                </li>
                            @endif
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color: Black;" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color: Black;" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <li class="nav-item">
                                    <a class="nav-link" style="color: Black;" href="{{ route('home') }}">{{ __('Productos') }}</a>
                                </li>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: Black;" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                </div>
            </div>
        </nav>

        <main class="card" style="margin-top: 67px; background-color: lightgrey; border: 0;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header" style="background-color: #b7f165;border: 0;">
                                <img src="{{asset('storage/cotizacion.png')}}" style="width: 3%; margin-right: 5px;">
                                    {{ __('Cotizaciones del dia ').date("d/m/Y") }}
                            </div>

                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Dólar</th>
                                            <th scope="col">Compra</th>
                                            <th scope="col">Venta</th>
                                            <th scope="col">Variación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Oficial</th>
                                            <td>{{$cotizacion['0']['casa']['compra']}}</td>
                                            <td>{{$cotizacion['0']['casa']['venta']}}</td>
                                            <td style="padding-left: 24px;">{{$cotizacion['0']['casa']['variacion']}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Blue</th>
                                            <td>{{$cotizacion['1']['casa']['compra']}}</td>
                                            <td>{{$cotizacion['1']['casa']['venta']}}</td>
                                            <td style="padding-left: 24px;">{{$cotizacion['1']['casa']['variacion']}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Contado con liqui</th>
                                            <td>{{$cotizacion['3']['casa']['compra']}}</td>
                                            <td>{{$cotizacion['3']['casa']['venta']}}</td>
                                            <td style="padding-left: 18px;">{{$cotizacion['3']['casa']['variacion']}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Bolsa</th>
                                            <td>{{$cotizacion['4']['casa']['compra']}}</td>
                                            <td>{{$cotizacion['4']['casa']['venta']}}</td>
                                            <td style="padding-left: 15px;">{{$cotizacion['4']['casa']['variacion']}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Turista</th>
                                            <td>{{$cotizacion['6']['casa']['compra']}}</td>
                                            <td>{{$cotizacion['6']['casa']['venta']}}</td>
                                            <td style="padding-left: 24px;">{{$cotizacion['6']['casa']['variacion']}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="bg-light text-center" style="margin-top: 116px;">
            <div class="text-center p-3" style="background-color: #b7f165; color: black;">
                Desarrollado por Emiliano Pérez Méndez &copy; <?= date('Y') ?>
            </div>
        </footer>
    </div>
</body>
</html>
