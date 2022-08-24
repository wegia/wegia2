@extends('layouts.main')

@section('title')
Recursos Humanos
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item" aria-current="page">
    <a href="/">
        <i class="fa fa-home"></i>Início
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    <i class="far fa-address-book"></i>Recursos Humanos
</li>
@endsection


@section('content')
<div class="content-body">
    <div class="row" id="category-row" >

        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse">
            <a href="{{route('rhFuncionariosPainel')}}">
                <i  class="far fa-address-book"></i>
                <span>Funcionários</span>
            </a>
        </div>

        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse"">
            <a href="{{route('rhVoluntariosPainel')}}">
                <i  class="fa fa-cubes"></i>
                <span>Voluntários</span>
            </a>
        </div>
    </div>
</div>

@endsection
