@extends('layouts.main')

@section('title')
    Lista de Empregados
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item" aria-current="page">
        <a class="text-secondary" href="/">
            <i class="fa fa-home px-1"></i>Início
        </a>
    </li>
    <li class="breadcrumb-item" aria-current="page">
        <a class="text-secondary" href="{{route('pessoaMain')}}">
            <i class="far fa-address-book px-1"></i>Pessoas
        </a>
    </li>
    <li class="breadcrumb-item" aria-current="page">
        <a class="text-secondary" href="{{route('atendidos.painel')}}">
            <i class="far fa-address-book px-1"></i>Atendidos
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <a href="{{route('atendidos.index')}}">
            <i class="far fa-address-book px-1"></i>Listar Atendidos
        </a>
    </li>
@endsection

@section('content')
<div class="card col-lg-10 col-md-8 mx-auto m-5 text-bg-dark">
        <h5 class="card-header">Atendidos</h5>
        <div class="card-body">
            <div class="col-2 d-flex justify-content-end">
                    <select class="form-select me-1">
                        <option selected disabled hidden>Status</option>
                        @foreach($status as $sta)
                            <option>{{$sta->status}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary">Filtrar</button>
                </div>
            <table id="table" class="table table-dark listTable">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>

                @foreach($atendidos as $atendido)
                    <tr>
                        <td>{{$atendido->pessoa->nome}}</td>
                        <td>{{$atendido->pessoa->cpf}}</td>
                        <td><a href="{{route('atendidos.editar',$atendido->id) }}">Editar</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
