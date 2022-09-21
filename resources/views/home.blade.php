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
<div class="container-fluid p-2">
    <div class="row" id="category-row" >

        <div class="col-lg-2 col-md-8 m-2 p-2 border text-center align-items-center">
             <a href="{{route('rhMain')}}">
                <i class="far fa-address-book d-block"></i>
                <span>Recursos Humanos</span>
            </a>
        </div>

        <div class="col-lg-2 col-md-8 m-2 p-2 border text-center align-items-center">
             <a href="{{route('rhMain')}}">
                <i class="far fa-address-book d-block"></i>
                <span>Pessoas</span>
            </a>
        </div>

    </div>
</div>
@endsection
