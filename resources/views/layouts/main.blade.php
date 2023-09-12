<!doctype html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.2/css/all.css">
    <link rel="icon" href="/img/icone.png" sizes="192x192"/>
    <title>
        {{ env('APP_NAME') }} - @yield('title')
    </title>
</head>

<body class="background">
<!-- Menu superior -->
<header class="bg-dark p-3 px-4 m-2 border-2 rounded-2">
    <div class="">
        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
                aria-controls="sidebar">
            <i class="fa-solid fa-bars text-bg-dark fs-5"></i>
        </button>
        <a href="/" class="logo">
            <img src="/img/logowegia.png" height="35" alt="WeGIA - Web Gerenciador de Instituições Assistenciais"/>
        </a>
    </div>
    <div class="avatar">
        <div class="vr bg-light me-4"></div>
        <div class="dropdown">
            <a href="#" class="link-light text-decoration-none dropdown-toggle"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="https://github.com/mdo.png"
                     alt="foto do usuario" width="32" height="32"
                     class="rounded-circle">
                <span class="d-sm-inline mx-1">Nome da pessoa</span>
            </a>
            <div class="dropdown-menu dropdown-menu-dark dropdown-menu-right">
                <a class="dropdown-item user-profile-item">Cargo da pessoa</a>
                <hr class="dropdown-divider">
                <a class="dropdown-item" href="#">Configurações</a>
                <a class="dropdown-item" href="#">Perfil</a>
                <hr class="dropdown-divider">
                <a class="dropdown-item" href="#">Sair</a>
            </div>
        </div>
    </div><!-- end: search & user box -->
</header>

<!-- Menu lateral -->
<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Pessoas -->
        <div class="p-2 px-2 m-1">
            <a class="d-flex justify-content-between link-light text-decoration-none" data-bs-toggle="collapse"
               href="#collapsePessoas" role="button" aria-expanded="false" aria-controls="collapsePessoas">
                <div>
                    <p class="m-0"><i class="fa-solid fa-address-book fontAwesomeWidth"></i> Pessoas</p>
                </div>
                <div>
                    <p class="m-0"><i class="fa-solid fa-chevron-down"></i></p>
                </div>
            </a>
        </div>
        <!-- Pessoas/Assistidos -->
        <div class="collapse" id="collapsePessoas">
            <div class="p-2 ps-5 pe-4 m-1 bg-secondary bg-opacity-50 rounded-3">
                <a class="d-flex justify-content-between link-light text-decoration-none"
                   data-bs-toggle="collapse" href="#collapsePessoasAssistidas" role="button"
                   aria-expanded="false" aria-controls="collapsePessoasAssistidas">
                    <div>
                        <p class="m-0"><i class="fa-solid fa-user fontAwesomeWidth"></i> Assistidos</p>
                    </div>
                    <div>
                        <p class="m-0"><i class="fa-solid fa-chevron-down"></i></p>
                    </div>
                </a>
            </div>
            <!-- Pessoas/Assistidas/Cadastrar -->
            <div class="collapse " id="collapsePessoasAssistidas">
                <div class="p-2 ps-5 pe-4 m-1 bg-secondary bg-opacity-25 rounded-3">
                    <a class="link-light text-decoration-none" role="button"
                       href="/">
                        <p class="m-0"><i class="fa-solid fa-pen-to-square fontAwesomeWidth"></i> Cadastrar</p>
                    </a>
                </div>
            </div>

            <!-- Pessoas/Assistidas/Informações -->
            <div class="collapse" id="collapsePessoasAssistidas">
                <div class="p-2 ps-5 pe-4 m-1 bg-secondary bg-opacity-25 rounded-3">
                    <a class="link-light text-decoration-none" role="button"
                       href="/">
                        <p class="m-0"><i class="fa-solid fa-list-ul fontAwesomeWidth"></i> Lista de cadastro</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- pessoa -->
        <div class="p-2 px-2 m-1">
            <a class="d-flex justify-content-between link-light text-decoration-none" data-bs-toggle="collapse"
               href="#collapsepessoa" role="button" aria-expanded="false" aria-controls="collapsepessoa"
               id="aba_pessoa"
               onClick="document.querySelector('#aba_pessoa').toggle()">
                <div>
                    <p class="m-0"><i class="fa-solid fa-briefcase fontAwesomeWidth"></i> Recursos Humanos</p>
                </div>
                <div>
                    <p class="m-0"><i class="fa-solid fa-chevron-down"></i></p>
                </div>
            </a>
        </div>
        <!-- pessoa/Funcionários -->

        <div class="collapse" id="collapsepessoa">
            <div class="p-2 ps-5 pe-4 m-1 bg-secondary bg-opacity-50 rounded-3">
                <a class="d-flex justify-content-between link-light text-decoration-none"
                   data-bs-toggle="collapse"
                   href="#collapsepessoaFuncionarios" role="button" aria-expanded="false"
                   aria-controls="collapsepessoaFuncionarios">
                    <div>
                        <p class="m-0"><i class="fa-solid fa-user fontAwesomeWidth"></i> Funcionários</p>
                    </div>
                    <div>
                        <p class="m-0"><i class="fa-solid fa-chevron-down"></i></p>
                    </div>
                </a>
            </div>
            <!-- pessoa/Funcionários/Cadastrar -->
            <div class="collapse" id="collapsepessoaFuncionarios">
                <div class="p-2 ps-5 pe-4 m-1 bg-secondary bg-opacity-25 rounded-3">
                    <a class="link-light text-decoration-none" role="button"
                       href="{{route('addFuncionarios')}}">
                        <p class="m-0"><i class="fa-solid fa-pen-to-square fontAwesomeWidth"></i> Cadastrar</p>
                    </a>
                </div>
            </div>
            <!-- pessoa/Funcionários/Informações -->
            <div class="collapse" id="collapsepessoaFuncionarios">
                <div class="p-2 ps-5 pe-4 m-1 bg-secondary bg-opacity-25 rounded-3">
                    <a class="link-light text-decoration-none" role="button"
                       href="{{route('listaFuncionarios')}}">
                        <p class="m-0"><i class="fa-solid fa-list-ul fontAwesomeWidth"></i> Lista de cadastro</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- pessoa/Voluntários -->
        <div class="collapse" id="collapsepessoa">
            <div class="p-2 ps-5 pe-4 m-1 bg-secondary bg-opacity-50 rounded-3">
                <a class="d-flex justify-content-between link-light text-decoration-none"
                   data-bs-toggle="collapse" href="#collapsepessoaVoluntarios" role="button" aria-expanded="false"
                   aria-controls="collapsepessoaVoluntarios">
                    <div>
                        <p class="m-0"><i class="fa-solid fa-user fontAwesomeWidth"></i> Voluntários</p>
                    </div>
                    <div>
                        <p class="m-0"><i class="fa-solid fa-chevron-down"></i></p>
                    </div>
                </a>
            </div>

            <!-- pessoa/Voluntários/Cadastrar -->
            <div class="collapse" id="collapsepessoaVoluntarios">
                <div class="p-2 ps-5 pe-4 m-1 bg-secondary bg-opacity-25 rounded-3">
                    <a class="link-light text-decoration-none" role="button"
                       href="{{route('addVoluntarios')}}">
                        <p class="m-0"><i class="fa-solid fa-pen-to-square fontAwesomeWidth"></i> Cadastrar</p>
                    </a>
                </div>
            </div>

            <!-- pessoa/Voluntários/Informações -->
            <div class="collapse" id="collapsepessoaVoluntarios">
                <div class="p-2 ps-5 pe-4 m-1 bg-secondary bg-opacity-25 rounded-3">
                    <a class="link-light text-decoration-none" role="button"
                       href="{{route('listaVoluntarios')}}">
                        <p class="m-0"><i class="fa-solid fa-list-ul fontAwesomeWidth"></i> Lista de cadastro</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Breadcrumb -->
<div class="bg-dark breadcrumb-nav px-3 p-2 m-2 border-2 rounded-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-auto mb-auto">
            @yield('breadcrumbs')
        </ol>
    </nav>
</div>

@yield('content')

<script src="/js/app.js"></script>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>

@yield('scripts-vendors')

</body>

</html>
