<!doctype html>
<html>

<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <title>
    {{ env('APP_NAME') }} - @yield('title')
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    
    <link rel="stylesheet" href="/css/bootstrap.min.css"> 

    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.2/css/all.css">

    <link rel="icon" href="/img/icone.png" sizes="192x192" />

</head>

<body>
    <header>
        <div>
            <a href="#" class="logo">
                <img src="/img/logowegia.png" 
                        height="35" 
                        alt="WeGIA - Web Gerenciador de Instituições Assistenciais" />
            </a>
        </div>
        
        <div class="avatar">
            <span class="separator"></span>
            
            <div class="dropdown">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://github.com/mdo.png" 
                            alt="foto do usuario" width="32" height="32" 
                            class="rounded-circle">
                    <span class="d-none d-sm-inline mx-1">Nome da pessoa</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" >
                    <a class="dropdown-item user-profile-item">cargo da pessoa</a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item" href="#">Configurações</a>
                    <a class="dropdown-item" href="#">Perfil</a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item" href="#">Sair</a>
                </div>
            </div>
        </div>
        
        <!-- end: search & user box -->
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-dark">
                <div>
                    <a href="/" class="">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <nav class="sidebar py-2 bg-dark">
                        <ul class="nav flex-column " id="nav_accordion">
	                        <li class="nav-item">
		                        <a class="nav-link" href="/">Início</a>
                            </li>
                            <li class="nav-item">
                                <details>
		                            <summary>Recursos Humanos</summary>
                                    <p>
                                       <a class="nav-link" href="{{route('listaFuncionarios')}}">Funcionários</a>
                                    </p>
                                    <p>
                                        <a class="nav-link" href="{{route('listaVoluntarios')}}">Voluntários</a>
                                    </p>
                                </details>
                            </li>
                            <li class="nav-item">
                            <details>
		                            <summary>Pessoas</summary>
                                    <p>
                                       <a class="nav-link" href="#">Atendidos</a>
                                    </p>
                                    <p>
                                        <a class="nav-link" href="#">Assistidos</a>
                                    </p>
                                </details>
                            </li>
                        </ul>

                    </nav>
                </div>
            </div>
            <div class="content col-md-9">
                <div class="bg-dark breadcrumb-nav">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" 
                                    aria-current="page">
                                <i class="fa-solid fa-home"></i>
                                Início
                            </li>
                        </ol>
                    </nav>
                    <a class="sidebar-right-toggle">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                </div>
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>



    <script src="/js/app.js"></script>
    <script src="/js/jquery.min.js"><script>
    <!-- JavaScript Bundle with Popper 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
-->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>

    @yield('scripts-vendors')
    
</body>

</html>