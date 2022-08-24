@extends('layouts.main')

@section('title')
Início
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">
    <i class="fa fa-home"></i>Início
</li>
@endsection


@section('content')
<div class="content-body">
    <div class="row" id="category-row" >

        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse">
             <a href="{{route('rhMain')}}"> 
                <i  class="far fa-address-book"></i>
                <span>Recursos Humanos</span>
            </a>
        </div>

        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse">
             <a href="{{route('rhMain')}}"> 
                <i  class="far fa-address-book"></i>
                <span>Pessoas</span>
            </a>
        </div>

    </div>
</div>
@endsection