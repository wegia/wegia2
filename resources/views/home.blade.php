@extends('layouts.main')

@section('title')
{{ env('APP_NAME') }} - Home
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">
    <i class="fa fa-home"></i>Home
</li>
@endsection


@section('content')
<div class="content-body">
    <div class="row" id="category-row" >
        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse">
             <a href="/people"> 
                <i  class="far fa-address-book"></i>
                <span>Pessoas</span>
            </a>
        </div>
        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse"">
            <a href="#">
                <i  class="fa fa-cubes"></i>
                <span>Material e Patrimônio</span>
            </a>
        </div>

        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse" href="#memorando">
            <a href="#">
                <i  class="fa fa-book"></i>
                <span>Memorando</span>
            </a>
        </div>

        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse" href="#socios">
            <a href="#">
                <i  class="fa fa-users"></i>
                <span>Sócios</span>
            </a>
        </div>

        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse" href="#saude">
            <a href="#">
                <i class="fas fa-hospital"></i>
                <span>Saúde</span>
            </a>
        </div>

        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse" href="#configuracao">
            <a href="#">
                <i  class="fa fa-cogs"></i>
                <span>Configurações</span>
            </a>
        </div>
    </div>
</div>
@endsection