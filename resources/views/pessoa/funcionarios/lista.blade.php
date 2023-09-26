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
        <i class="far fa-address-book px-1"></i>Recursos Humanos
    </a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a class="text-secondary" href="{{route('pessoaFuncionariosPainel')}}">
        <i class="far fa-address-book px-1"></i>Funcionários
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    <a href="{{route('listaFuncionarios')}}">
        <i class="far fa-address-book px-1"></i>Listar funcionários
    </a>
</li>
@endsection

@section('content')



<div class="card col-lg-10 col-md-8 mx-auto m-5 text-bg-dark">
    <h5 class="card-header">Funcionários</h5>
    <div class="card-body">
        <div class="col-2 d-flex justify-content-end">
            <select class="form-select me-1">
                <option selected disabled hidden>Situação</option>
                <option value="a">Ativo</option>
                <option value="i">Inativo</option>
            </select>
            <button class="btn btn-primary">Filtrar</button>
        </div>
        <table id="table" class="table table-dark listTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>

            @foreach($lista as $funcionario)
            <tr>
                <th scope="row">{{$funcionario->id}}</th>
                <td>{{$funcionario->colaborador->pessoa->nome ?? 'NOME NULO?'}}</td>
                <td>{{$funcionario->colaborador->cpf ?? 'CPF NULO?'}}</td>
                <td>
                    @foreach($funcionario->colaborador->cargoColaboradores as $cargoColaborador)
                        {{ $cargoColaborador->cargo->nome }}
                    @endforeach
                </td>
                <td><a href="{{route('atendidos.telaEditar',$funcionario->id) }}">Editar</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection