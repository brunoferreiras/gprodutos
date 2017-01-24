<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title>{{ $titulo or 'Sistema de Gerenciamento de Produtos' }}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/pnotify.custom.min.css') }}">

        <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
        <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <div class="container">

            <!-- Static navbar -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Mudar Navegação</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url("") }}">Sistema de Gerenciamento de Produtos</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
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
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>
            <!-- Content Dinâmico-->
            @yield('content')
        </div> <!-- /container -->
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