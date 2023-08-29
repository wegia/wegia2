@extends('layouts.main')

@section('title')
{{ env('APP_NAME') }} - Cadastro de Voluntário
@endsection

@section('operation-title')
Cadastro
@endsection


@section('breadcrumbs')
<li class="breadcrumb-item" aria-current="page">
        <a class="text-secondary" href="/">
            <i class="fa fa-home px-1"></i>Início
        </a>
    </li>
    <li class="breadcrumb-item" aria-current="page">
        <a class="text-secondary" href="{{route('rhMain')}}">
            <i class="far fa-address-book px-1"></i>Recursos Humanos
        </a>
    </li>
    <li class="breadcrumb-item" aria-current="page">
        <a class="text-secondary" href="{{route('rhVoluntariosPainel')}}">
            <i class="fa-solid fa-address-book px-1"></i>Voluntários
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <a href="{{route('listaVoluntarios')}}">
            <i class="fa-solid fa-address-book px-1"></i>Cadastrar Voluntários
        </a>
    </li>
@endsection

@section('content')
<div class="content-body">
    <div class="tab-content bg-dark text-white rounded p-3">
        <div class="tab-pane fade show active" id="cadastroFuncionario" role="tabpanel" aria-labelledby="cadFunc" tabindex="0">
            <form action="rh/voluntarios" method="POST"></form>
                @csrf
                <!--Descrição-->
                <div class="row mb-3">
                    <label class="col-md-3 col-form-label required" for="descricao">
                        Descrição</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control"
                                id="descricao" name="voluntario.descricao" required>
                        </div>
                </div>

                <!--Colaborador-->
                <div class="row mb-3">
                    <label class="col-md-3 col-form-label required" for="colaborador">
                        Colaborador</label>
                        <div class="col-md-8">
                            <select name="colaborador.id" id="colaborador">
                                <option selected disabled>Selecionar</option>
                                @foreach ($colaboradores as $colaborador)
                                    <option value="{{$colaborador->id}}">{{$colaborador->pessoa->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <!--Disponibilidade Semanal-->

                <!--Disponibilidade Horas-->

        </div>
    </div>
</div>



@endsection
