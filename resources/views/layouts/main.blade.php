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
    <header class="bg-dark p-3 px-4">
        <div>
            <a href="/" class="logo">
                <img src="/img/logowegia.png" height="35" alt="WeGIA - Web Gerenciador de Instituições Assistenciais" />
            </a>
        </div>
        <div class="avatar">
            <span class="separator bg-white bg-opacity-25 rounded-4"></span>
            <div class="dropdown">
                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle"
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
            <!-- Menu/Sidebar -->
            <!-- Menu -->
            <aside class="content col-md-3 bg-dark text-bg-dark border-end vh-100">
                <div class="d-flex justify-content-between p-2 px-4 border-bottom">
                    <div>
                        <p class="m-0 navbar-brand">Menu</p>
                    </div>
                    <div>
                        <p class="m-0"><i class="fa-solid fa-bars"></i></p>
                    </div>
                </div>
                <!-- Pessoas -->
                <div class="p-2 px-4">
                    <a class="d-flex justify-content-between link-light text-decoration-none" data-bs-toggle="collapse" href="#collapsePessoas" role="button" aria-expanded="false" aria-controls="collapsePessoas">
                        <div>
                            <p class="m-0"><i class="fa-solid fa-address-book fontAwesomeWidth"></i> Pessoas</p>
                        </div>
                        <div>
                            <p class="m-0"><i class="fa-solid fa-chevron-down"></i></p>
                        </div>
                    </a>
                </div>
                <!-- Pessoas/Assistidos -->
                <div class="collapse bg-secondary bg-opacity-25" id="collapsePessoas">
                    <div class="p-2 ps-5 pe-4">
                        <a class="d-flex justify-content-between link-light text-decoration-none" data-bs-toggle="collapse" href="#collapsePessoasAssistidas" role="button" aria-expanded="false" aria-controls="collapsePessoasAssistidas">
                            <div>
                                <p class="m-0"><i class="fa-solid fa-user fontAwesomeWidth"></i> Assistidos</p>
                            </div>
                            <div>
                                <p class="m-0"><i class="fa-solid fa-chevron-down"></i></p>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Pessoas/Assistidas/Cadastrar -->
                <div class="collapse bg-secondary bg-opacity-25" id="collapsePessoasAssistidas">
                    <div class="p-2 ps-5 pe-4">
                        <a class="link-light text-decoration-none" role="button"
                           href="/">
                            <div class="ps-4 pe-4">
                                <p class="m-0"><i class="fa-solid fa-pen-to-square fontAwesomeWidth"></i> Cadastrar</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Pessoas/Assistidas/Informações -->
                <div class="collapse bg-secondary bg-opacity-25" id="collapsePessoasAssistidas">
                    <div class="p-2 ps-5 pe-4">
                        <a class="link-light text-decoration-none" role="button"
                           href="/">
                            <div class="ps-4 pe-4">
                                <p class="m-0"><i class="fa-solid fa-list-ul fontAwesomeWidth"></i> Lista de cadastro</p>
                            </div>
                        </a>
                    </div>
                </div>
{{--                <!-- Pessoas/Beneficiários -->--}}
{{--                <div class="collapse bg-secondary bg-opacity-25" id="collapsePessoas">--}}
{{--                    <div class="p-2 ps-5 pe-4">--}}
{{--                        <a class="d-flex justify-content-between link-light text-decoration-none" data-bs-toggle="collapse" href="#collapsePessoasBeneficiarios" role="button" aria-expanded="false" aria-controls="collapsePessoasBeneficiarios">--}}
{{--                            <div>--}}
{{--                                <p class="m-0"><i class="fa-solid fa-clipboard-user fontAwesomeWidth"></i> Beneficiários</p>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <p class="m-0"><i class="fa-solid fa-chevron-down"></i></p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Pessoas/Beneficiários/Cadastrar -->--}}
{{--                <div class="collapse bg-secondary bg-opacity-25" id="collapsePessoasBeneficiarios">--}}
{{--                    <div class="p-2 ps-5 pe-4">--}}
{{--                        <a class="link-light text-decoration-none" href="/" role="button"">--}}
{{--                        <div class="ps-4 pe-4">--}}
{{--                            <p class="m-0"><i class="fa-solid fa-pen-to-square fontAwesomeWidth"></i> Cadastrar</p>--}}
{{--                        </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Pessoas/Beneficiários/Informações -->--}}
{{--                <div class="collapse bg-secondary bg-opacity-25" id="collapsePessoasBeneficiarios">--}}
{{--                    <div class="p-2 ps-5 pe-4">--}}
{{--                        <a class="link-light text-decoration-none" href="/" role="button"">--}}
{{--                        <div class="ps-4 pe-4">--}}
{{--                            <p class="m-0"><i class="fa-solid fa-list-ul fontAwesomeWidth"></i> Lista de cadastro</p>--}}
{{--                        </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <!-- RH -->
                <div class="p-2 px-4">
                    <a class="d-flex justify-content-between link-light text-decoration-none" data-bs-toggle="collapse" href="#collapseRH" role="button" aria-expanded="false" aria-controls="collapseRH">
                        <div>
                            <p class="m-0"><i class="fa-solid fa-briefcase fontAwesomeWidth"></i> Recursos Humanos</p>
                        </div>
                        <div>
                            <p class="m-0"><i class="fa-solid fa-chevron-down"></i></p>
                        </div>
                    </a>
                </div>
                <!-- RH/Funcionários -->
                <div class="collapse bg-secondary bg-opacity-25" id="collapseRH">
                    <div class="p-2 ps-5 pe-4">
                        <a class="d-flex justify-content-between link-light text-decoration-none"
                                data-bs-toggle="collapse"
                                href="#collapseRHFuncionarios" role="button" aria-expanded="false" aria-controls="collapseRHFuncionarios">
                            <div>
                                <p class="m-0"><i class="fa-solid fa-user fontAwesomeWidth"></i> Funcionários</p>
                            </div>
                            <div>
                                <p class="m-0"><i class="fa-solid fa-chevron-down"></i></p>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- RH/Funcionários/Cadastrar -->
                <div class="collapse bg-secondary bg-opacity-25" id="collapseRHFuncionarios">
                    <div class="p-2 ps-5 pe-4">
                        <a class="link-light text-decoration-none" role="button"
                            href="{{route('addFuncionarios')}}">
                        <div class="ps-4 pe-4">
                            <p class="m-0"><i class="fa-solid fa-pen-to-square fontAwesomeWidth"></i> Cadastrar</p>
                        </div>
                        </a>
                    </div>
                </div>
                <!-- RH/Funcionários/Informações -->
                <div class="collapse bg-secondary bg-opacity-25" id="collapseRHFuncionarios">
                    <div class="p-2 ps-5 pe-4">
                        <a class="link-light text-decoration-none" role="button"
                           href="{{route('listaFuncionarios')}}" >
                        <div class="ps-4 pe-4">
                            <p class="m-0"><i class="fa-solid fa-list-ul fontAwesomeWidth"></i> Lista de cadastro</p>
                        </div>
                        </a>
                    </div>
                </div>
                <!-- RH/Voluntários -->
                <div class="collapse bg-secondary bg-opacity-25" id="collapseRH">
                    <div class="p-2 ps-5 pe-4">
                        <a class="d-flex justify-content-between link-light text-decoration-none" data-bs-toggle="collapse" href="#collapseRHVoluntarios" role="button" aria-expanded="false" aria-controls="collapseRHVoluntarios">
                            <div>
                                <p class="m-0"><i class="fa-solid fa-user fontAwesomeWidth"></i> Voluntários</p>
                            </div>
                            <div>
                                <p class="m-0"><i class="fa-solid fa-chevron-down"></i></p>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- RH/Voluntários/Cadastrar -->
                <div class="collapse bg-secondary bg-opacity-25" id="collapseRHVoluntarios">
                    <div class="p-2 ps-5 pe-4">
                        <a class="link-light text-decoration-none" role="button"
                        href="{{route('addVoluntarios')}}">
                        <div class="ps-4 pe-4">
                            <p class="m-0"><i class="fa-solid fa-pen-to-square fontAwesomeWidth"></i> Cadastrar</p>
                        </div>
                        </a>
                    </div>
                </div>
                <!-- RH/Voluntários/Informações -->
                <div class="collapse bg-secondary bg-opacity-25" id="collapseRHVoluntarios">
                    <div class="p-2 ps-5 pe-4">
                        <a class="link-light text-decoration-none" role="button"
                           href="{{route('listaVoluntarios')}}">
                        <div class="ps-4 pe-4">
                            <p class="m-0"><i class="fa-solid fa-list-ul fontAwesomeWidth"></i> Lista de cadastro</p>
                        </div>
                        </a>
                    </div>
                </div>
            </aside>
            <!-- Breadcrumb -->
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
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>

    @yield('scripts-vendors')

</body>

</html>
