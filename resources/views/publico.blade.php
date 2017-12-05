<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tarefas') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
     <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light container">
            <!-- Branding Image -->
            <a class="navbar-brand mr-auto" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            @guest
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="dropdown-item" href="{{ route('login') }}">Acessar</a></li>
                    <li><a class="dropdown-item" href="{{ route('register') }}">Registrar</a></li>
                </ul>
            @else
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-auto" href="#" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Sair
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            @endguest
        </nav>       
        @yield('content')
    </div>
    <div class="container">
        <div class="row">
            @foreach($tarefas as $tarefa)
                <div class='col-sm-3'>
                    <div class='card'>
                        <div class='card-header'>{{$tarefa->titulo}}</div>
                        <div class='card-body'>{{$tarefa->conteudo}}</div>
                    </div>
                </div>
                </br>
            @endforeach
        </div>           
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
