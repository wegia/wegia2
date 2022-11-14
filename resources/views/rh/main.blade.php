@extends('layouts.main')

@section('title')
Recursos Humanos
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item" aria-current="page">
        <a class="text-secondary" href="/">
            <i class="fa fa-home px-1"></i>Início
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <a href="{{route('rhMain')}}">
            <i class="far fa-address-book px-1"></i>Recursos Humanos
        </a>
    </li>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row" id="category-row" >
        <div class="col-lg-2 col-md-8 m-2 mt-0 border-2 rounded-3 text-center bg-dark cardHeight d-flex align-items-center justify-content-center">
            <a class="text-decoration-none link-light" href="{{route('rhFuncionariosPainel')}}">
                <i class="fa-solid fa-address-book d-block fs-1"></i>
                <p class="m-0">Funcionários</p>
            </a>
        </div>
        <div class="col-lg-2 col-md-8 m-2 mt-0 border-2 rounded-3 text-center bg-dark cardHeight d-flex align-items-center justify-content-center">
            <a class="text-decoration-none link-light" href="{{route('rhVoluntariosPainel')}}">
                <i class="fa-solid fa-cubes d-block fs-1"></i>
                <p class="m-0">Voluntários</p>
            </a>
        </div>
    </div>
</div>
@endsection
