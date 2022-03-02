<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="msapplication-TileImage" content="{{ asset('images/icon.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,700&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">	
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-effie6.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.loadingModal.min.css') }}">
    <link rel="stylesheet" href="{{ asset('jBox-1.2.0/css/jBox.all.min2.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" sizes="32x32">
	<link rel="icon" href="{{ asset('images/icon.png') }}" sizes="192x192">
	<link rel="apple-touch-icon-precomposed" href="{{ asset('images/icon.png') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.loadingModal.min.js') }}"></script>
    <script src="{{ asset('jBox-1.2.0/js/jBox.all.min.js') }}"></script>
    <script src="{{ asset('js/utilitarios3.js') }}"></script>
    <script src="{{ asset('js/tooltips.js') }}"></script>
</head>
<body>
    <header class="header-propuesta">
        <div>
            <a href="{{ url('/') }}"><img src="{{ asset('images/effie-color.png') }}" class="header-logo__image" ></a>     
        </div>
        @if (Route::has('login'))
        <div>
            @auth
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    class="header-propuesta__button">{{ __('Cerrar sesión') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                    @csrf
                </form>
            @endauth
        </div>
        @endif
    </header>
    <main>
        <div class="container">
            <div class="fila">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>{{ __('¡Atención!') }}</strong>{{ __(' Revisa los campos obligatorios.') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Session::has('success'))
                <div class="alert alert-info">
                    <strong>{{ __('¡Excelente!') }}</strong>
                    {{ Session::get('success') }}
                </div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger">
                    <strong>{{ __('¡Atención!') }}</strong> 
                    {{ Session::get('error') }}
                </div>
                @endif
            </div>
        </div>
        @yield('content')
    </main>
    <div class="pre-footer">
        <div class="container">
            <div class="columna columna-1">
            <img src="{{ asset('images/effie1.png') }}" alt="{{ config('app.name', 'Laravel') }}" class="header-logo__image">
            </div>
        </div>
    </div>
    <footer>
        <p>{{ __('© 2021 ') }} {{ config('app.name', 'Laravel') }} {{ __(' todos los derechos reservados | Desarrollado por ') }}<a href="http://preciso.pe/">{{ __('Preciso Agencia de contenidos') }}</a></p>
    </footer>
    @yield('script')
</body>
</html>