<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/pnotify.custom.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/app.css') }}">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Mudar Navegação</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Registrar</a></li>
                            @else                            
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->usuario }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                               <i class="fa fa-sign-out" aria-hidden="true"></i> Sair
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>                        
                            @endif
                        </ul>
                        @if(!Auth::guest())
                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuários <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ url("usuarios") }}">Lista</a>
                                            <a href="{{ url("/usuarios/create") }}">Cadastro</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produtos <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ url("produtos") }}">Lista</a>
                                            <a href="{{ url("produtos/create") }}">Cadastro</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transações <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="">Empréstimos</a>
                                            <a href="">Devoluções</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Relatórios <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="">Saque</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </nav>
            <div class="container">
                @yield('content')
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ url('assets/js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ url('assets/css/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('assets/js/pnotify.custom.min.js') }}"></script>
        <script src="{{ url('assets/js/custom.js') }}"></script>
        {{-- PNotify --}}
        @if( session()->has('success') )
        <script>
            $(document).ready(function() {
                new PNotify({
                    title: "Sucesso",
                    type: "success",
                    text: '{{ session('success') }}',
                    addclass: 'success',
                    styling: 'bootstrap3',
                    hide: true,
                });
            });
        </script>
        @endif
        
        @if( session()->has('error') )
        <script>
            $(document).ready(function() {
                new PNotify({
                    title: "Erro!",
                    type: "error",
                    text: '{{ session('error') }}',
                    addclass: 'error',
                    styling: 'bootstrap3',
                    hide: true,
                });
            });
        </script>
        @endif
    </body>
</html>
