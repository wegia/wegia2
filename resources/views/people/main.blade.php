@extends('layouts.main')

@section('title')
{{ env('APP_TITLE') }} - Pessoas
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item" aria-current="page">
    <a href="{{action('HomeController@index')}}">
        <i class="fa fa-home"></i>Home
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    <i class="far fa-address-book"></i>Pessoa
</li>
@endsection


@section('content')
<div class="content-body">
    <div class="row" id="category-row" >
        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse">
            <a href="{{action('PeopleController@employees')}}">
                <i  class="far fa-address-book"></i>
                <span>Funcionários</span>
            </a>
        </div>
        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse"">
            <a href="{{action('PeopleController@beneficiaries')}}">
                <i  class="fa fa-cubes"></i>
                <span>Atendidos</span>
            </a>
        </div>

        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse" href="#memorando">
            <a href="{{action('PeopleController@events')}}">
                <i  class="fa fa-book"></i>
                <span>Ocorrências</span>
            </a>
        </div>
    </div>
</div>

@endsection
