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
    <div class="row p-2" id="category-row" >
        <div class="col-lg-2 col-md-8 m-4 p-5 border border-2 rounded-3 text-center">
            <a class="text-decoration-none" href="{{route('rhMain')}}">
                <i class="fa-solid fa-address-book d-block fs-1"></i>
                <p class="m-0">Pessoas</p>
            </a>
        </div>
        <div class="col-lg-2 col-md-8 m-4 p-5 border border-2 rounded-3 text-center">
             <a class="text-decoration-none" href="{{route('rhMain')}}">
                <i class="fa-solid fa-briefcase d-block fs-1"></i>
                <p class="m-0">Recursos Humanos</p>
            </a>
        </div>
    </div>
</div>
@endsection
