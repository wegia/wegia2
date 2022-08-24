@extends('layouts.main')

@section('title')
Voluntários
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item" aria-current="page">
    <a href="/">
        <i class="fa fa-home"></i>Início
    </a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="/rh/voluntario">
        <i class="far fa-address-book"></i>rh
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    <i class="far fa-address-book"></i>Voluntários
</li>
@endsection


@section('content')
<div class="content-body">
    <div class="row" id="category-row" >
        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse">
            <a href="/rh/voluntarios/add">
                <i  class="far fa-address-book"></i>
                <span>Cadastrar</span>
            </a>
        </div>
        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse"">
            <a href="/rh/voluntarios">
                <i  class="fa fa-cubes"></i>
                <span>Informações Voluntários</span>
            </a>
        </div>

    </div>
</div>

@endsection
