@extends('layouts.main')

@section('title')
Início
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">
    <i class="fa fa-home px-1"></i>Início
</li>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row" id="category-row" >
        <div class="col-lg-2 col-md-8 m-2 mt-0 border-2 rounded-3 text-center bg-dark cardHeight d-flex align-items-center justify-content-center">
            <a class="text-decoration-none link-light" href="{{route('rhMain')}}">
                <i class="fa-solid fa-address-book d-block fs-1"></i>
                <p class="m-0">Pessoas</p>
            </a>
        </div>
        <div class="col-lg-2 col-md-8 m-2 mt-0 border-2 rounded-3 text-center bg-dark cardHeight d-flex align-items-center justify-content-center">
             <a class="text-decoration-none link-light" href="{{route('rhMain')}}">
                <i class="fa-solid fa-briefcase d-block fs-1"></i>
                <p class="m-0">Recursos Humanos</p>
            </a>
        </div>
    </div>
</div>
@endsection
