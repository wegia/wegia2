@extends('layouts.main')

@section('title')
    Ocorrências
@endsection


@section('breadcrumbs')
    <li class="breadcrumb-item" aria-current="page">
        <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="/">
            <i class="fa fa-home px-1"></i>Início
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
           href="{{route('pessoas.index')}}">
            <i class="far fa-address-book px-1"></i>Pessoas
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <a class="link-light text-decoration-none pointer-event" href="#">
            <i class="fa-solid fa-building-user px-1"></i>Ocorrencia
        </a>
    </li>
@endsection

@section('content')
    <div class="container-fluid p-0 p-2 pt-0">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-6 g-2">
            <div class="col">
                <div class="card text-center text-bg-dark">
                    <a href="{{route('ocorrencias.cadastrar')}}"
                       class="justify-content-center align-content-center text-decoration-none link-light">
                        <div class="card-body p-4">
                            <i class="fa-solid fa-user-plus fs-1 pb-5"></i>
                            <p class="card-text">Cadastrar Ocorrência</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card text-center text-bg-dark">
                    <a href="{{route('ocorrencias.listar')}}"
                       class="justify-content-center align-content-center text-decoration-none link-light">
                        <div class="card-body p-4">
                            <i class="fa-solid fa-list-ul fs-1 pb-5"></i>
                            <p class="card-text">Ocorrências Ativas</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection