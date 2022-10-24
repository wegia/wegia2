@extends('layouts.main')

@section('title')
Funcionários
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item" aria-current="page">
        <a class="text-secondary" href="/">
            <i class="fa fa-home px-1"></i>Início
        </a>
    </li>
    <li class="breadcrumb-item" aria-current="page">
        <a class="text-secondary" href="{{route('rhMain')}}">
            <i class="far fa-address-book px-1"></i>Recursos Humanos
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <a href="{{route('rhFuncionariosPainel')}}">
            <i class="far fa-address-book px-1"></i>Funcionários
        </a>
    </li>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row p-2" id="category-row" >
        <div class="col-lg-2 col-md-8 m-4 p-5 border border-2 rounded-3 text-center">
            <a class="text-decoration-none" href="{{route('addFuncionarios')}}">
                <i class="fa-solid fa-address-book d-block fs-1"></i>
                <p class="m-0">Cadastrar</p>
            </a>
        </div>
        <div class="col-lg-2 col-md-8 m-4 p-5 border border-2 rounded-3 text-center">
            <a class="text-decoration-none" href="{{route('listaFuncionarios')}}">
                <i class="fa-solid fa-cubes d-block fs-1"></i>
                <p class="m-0">Informações Funcionários</p>
            </a>
        </div>
    </div>
</div>
@endsection
