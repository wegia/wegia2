<!doctype html>
<html>
<head>
	<!-- Basic -->
	<meta charset="UTF-8">
	<title> 
        @yield('title')
    </title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/custom.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
</head>
<body>
	<header class="p-3 mb-3 border-bottom">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <span class="navbar-brand"><img src="{{ env('APP_LOGO')}}"></span>
                
            <div class="dropdown">
                
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Configurações</a>
                    <a class="dropdown-item" href="#">Perfil</a>
                    <hr>
                    <a class="dropdown-item" href="#">Sair</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div id="sidebar" class="col-md-2 bg-dark">
                <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                    <span class="fs-5 fw-semibold">Menu</span>
                </a>
                <ul>
                    <li><a href="/"><i class="fa fa-home"></i><span>Início</span></a></li>
                    <li><a href="{{action('PeopleController@index')}}"><i class="far fa-address-book"></i>Pessoas</a>
                            <!-- funcionarios, atendidos, ocorrências -->
                    </li>
                    <li><a href="#"><i class="fa fa-cubes"></i>Material e Patrimônio</a></li>
                    <li><a href="#"><i class="fa fa-book"></i>Memorando</a></li>
                    <li><a href="#"><i class="fa fa-users"></i>Sócios</a></li>
                    <li><a href="#"><i class="fas fa-hospital"></i>Saúde</a></li>
                    <li><a href="#"><i class="fa fa-cogs"></i>Configurações</a></li>
                    <li><a href="#"><i class="fa fa-cogs"></i>Manual</a></li>
                </ul>
            </div>
            <main class="col-md-10">
                <header class="container bg-dark">
                    <div class="row">
                        <div class="col-md-1">
                            <a href="#">
                                <span>
                                @yield('operation-title')
                                </span>
                            </a>
                        </div>
                        <nav class="col-md-11" aria-label="breadcrumb">
                            <ol class="breadcrumb position-right bg-dark">
                                @yield('breadcrumbs')
                                
                            </ol>
                        </nav>
                    </div>
                </header>
                <div class="container">
                    @yield('content')
                </div>
                
                <footer>
                    <ul>
                        <li><a href="#"><img src="{{env('APP_LOGO_CEFET')}}"></a></li>
                        <li><a href="#"><img src="{{env('APP_LOGO')}}"></a></li>
                        <li><a href="#"><img src="{{env('APP_LOGO_LICENSE')}}"></a></li>
                    </ul>
                </footer>
            </main>
        </div>
    </div>

    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    @yield('scripts-vendors')
</body>
</html>