@extends('layouts.main')

@section('title')
{{ env('APP_NAME') }} - Pessoas
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item" aria-current="page">
    <a href="/">
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
        
        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse"">
            <a href="/people/beneficiaries/beneficiaries/adm">
                <i  class="fa fa-cubes"></i>
                <span>Atendidos</span>
            </a>
        </div>

        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse" href="#memorando">
            <a href="/people/assisted/assisted/adm">
                <i  class="fa fa-book"></i>
                <span>Assistidos</span>
            </a>
        </div>
    </div>
</div>

@endsection
