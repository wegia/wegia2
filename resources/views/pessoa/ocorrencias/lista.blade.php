@extends('layouts.main')

@section('title')
    Lista de ocorrências
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
        <h5 class="card-header">Ocorrencias</h5>
        <div class="card-body">
           
            <table id="table" class="table table-dark listTable">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>

                @foreach($ocorrencias as $ocorrencia)
                    <tr>
                        <td>{{$ocorrencia->atendido->pessoa->nome}}</td>
                        <td>{{$ocorrencia->data}}</td>
                        <td>
                            <button><a href="{{route('ocorrencias.remover', ['id'=> $ocorrencia->id])}}">Remover</a></button>
                            <button><a href="{{route('ocorrencias.TelaEditar', ['id'=> $ocorrencia->id])}}">Editar</a></button>
                        </td>
                        <!-- <td><a href="\{\{route('atendidos.telaEditar', ['id' => $atendido->id]) \}\}">Editar</a></td> -->
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
