@extends('layouts.main')

@section('title')
Recursos Humanos
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item" aria-current="page">
        <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="/">
            <i class="fa-solid fa-home px-1"></i>Início
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <a class="link-light text-decoration-none pointer-event" href="#">
            <i class="fa-solid fa-briefcase px-1"></i>Recursos Humanos
        </a>
    </li>
@endsection


@section('content')
        <div class="container-fluid p-0 p-2 pt-0">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-6 g-2">
                <div class="col">
                    <div class="card text-center text-bg-dark">
                        <a href="{{route('rhFuncionariosPainel')}}" class="justify-content-center align-content-center text-decoration-none link-light">
                            <div class="card-body p-4">
                                <i class="fa-solid fa-building-user fs-1 pb-5"></i>
                                <p class="card-text">Funcionários</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center text-bg-dark">
                        <a href="{{route('rhVoluntariosPainel')}}" class="justify-content-center align-content-center text-decoration-none link-light">
                            <div class="card-body p-4">
                                <i class="fa-solid fa-user-clock fs-1 pb-5"></i>
                                <p class="card-text">Voluntários</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection
