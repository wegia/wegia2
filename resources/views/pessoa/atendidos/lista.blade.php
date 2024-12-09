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
        <a href="{{route('atendidos.listar')}}">
            <i class="far fa-address-book px-1"></i>Listar Atendidos
        </a>
    </li>
@endsection

@section('content')
<div class="card col-lg-10 col-md-8 mx-auto m-5 text-bg-dark">
        <h5 class="card-header">Atendidos</h5>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <form action="{{route('atendidos.filtrar')}}" class="d-flex">
                    @csrf
                    <div class="d-flex align-items-center">
                        <select class="form-select me-1" name="status">
                            <option selected disabled hidden>Status</option>
                            @foreach($status as $sta)
                                <option value="{{$sta->id}}">{{$sta->status}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">Filtrar</button>
                </div>
                </form>

                <form action="{{route('atendidos.pesquisar')}}" class="d-flex">
                    @csrf
                    <div class="d-flex align-items-center">
                        <input type="text" name="pesquisar" id="pesquisar">
                        <button class="btn btn-primary" type="submit">Pesquisar</button>
                </div>
                </form>
            </div>
            <table id="table" class="table table-dark listTable">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @foreach($atendidos as $atendido)
                    <tr>
                        <td>{{$atendido->pessoa->nome}}</td>
                        <td>{{$atendido->pessoa->cpf}}</td>
                        <td><a href="{{route('atendidos.telaEditar', ['id' => $atendido->id]) }}">Editar</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
