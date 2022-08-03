@extends('layouts.main')

@section('title')
{{ env('APP_TITLE') }} - Funcionários
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item" aria-current="page">
    <a href="{{action('HomeController@index')}}">
        <i class="fa fa-home"></i>Home
    </a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="{{action('PeopleController@index')}}">
        <i class="far fa-address-book"></i>Pessoa
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    <i class="far fa-address-book"></i>Funcionários
</li>
@endsection


@section('content')
<div class="content-body">
    <div class="row" id="category-row" >
        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse">
            <a href="{{action('EmployeeController@add')}}">
                <i  class="far fa-address-book"></i>
                <span>Cadastrar</span>
            </a>
        </div>
        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse"">
            <a href="{{action('EmployeeController@list')}}">
                <i  class="fa fa-cubes"></i>
                <span>Informações Funcionários</span>
            </a>
        </div>

    </div>
</div>

@endsection
