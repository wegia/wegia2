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
        <a class="text-secondary" href="{{route('pessoaVoluntariosPainel')}}">
            <i class="fa-solid fa-address-book px-1"></i>Voluntários
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <a href="{{route('listaVoluntarios')}}">
            <i class="fa-solid fa-address-book px-1"></i>Informações Voluntários
        </a>
    </li>
@endsection

@section('content')

<div class="card col-lg-10 col-md-8 mx-auto m-5 text-bg-dark">
        <h5 class="card-header">Voluntarios</h5>
        <div class="card-body">
          
            <table id="table" class="table table-dark listTable">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Colaborador</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Disponibilidade semanas</th>
                        <th scope="col">Disponibilidade horas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($voluntarios as $voluntario)
                    <tr>
                        <th scope="row">{{$voluntario->id}}</th>
                        <td>{{$voluntario->colaborador->pessoa->nome}} </td>
                        <td>{{$voluntario->descricao}}</td>
                        <td>{{$voluntario->disponibilidade_semanal}}</td>
                        <td>{{$voluntario->disponibilidade_horas}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</div>
</div>

@endsection

