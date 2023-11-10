@extends('layouts.main')

@section('title')
    Novo Funcionário
@endsection

@section('operation-title')
    Cadastro
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item" aria-current="page">
        <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="/">
            <i class="fa fa-home px-1"></i>Início
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
           href="{{route('pessoaMain')}}">
            <i class="far fa-address-book px-1"></i>Pessoas
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{route('atendidos.painel')}}">
            <i class="fa-solid fa-building-user px-1"></i>Atendidos
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <a class="link-light text-decoration-none pointer-event" href="#">
            <i class="fa-solid fa-user-plus px-1"></i>Cadastrar
        </a>
    </li>
@endsection

@section('content')
<div class="content-body">

<div class="row m-5" id="formulario">
        <ul class="nav nav-pills nav-fill pb-2">
            <li class="nav-item">
                <button class="nav-link bg-dark" id="cadastroOcorrencia" data-bs-toggle="tab"
                data-bs-target="#cadastroOcorrencia" type="button" role="tab"
                aria-controls="cadastroOcorrencia" aria-selected="true">Cadastro de Ocorrencias
                </button>
            </li>
        </ul>
        <div class="tab-content bg-dark text-white rounded p-3">
            <div class="tab-pane fade show active" id="cadastroOcorrencia" role="tabpanel"
                aria-labelledby="cadastroOcorrencia" tabindex="0">
                <form method="POST" action="{{route('ocorrencias.salvar')}}">
                    @csrf
                    <h4 class="">Informações</h4>
                    <h5 class="required fs-6 mb-4">Campos Obrigatórios</h5>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label required" for="name">Atendido
                        </label>
                            <div class="col-md-8">
                               <select name="atendido" id="atendidos">
                                    @foreach($atendidos as $atendido)
                                        <option value="{{$atendido->id}}">{{$atendido->pessoa->nome}}</option>
                                    @endforeach
                               </select>
                            </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label required" for="name">Tipo de Ocorrência
                        </label>
                            <div class="col-md-8">
                               <select name="tipoOcorrencia" id="tipoOcorrencias">
                                    @foreach($tipoOcorrencias as $tipoOcorrencia)
                                        <option value="{{$tipoOcorrencia->id}}">{{$tipoOcorrencia->nome}}</option>
                                    @endforeach
                               </select>
                            </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label required" for="data">Data
                        </label>
                            <div class="col-md-8">
                                <input type="date" class="form-control"
                                    id="data" name="data" required>
                            </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label " for="arquivo">Arquivo:
                        </label>
                            <div class="col-md-8">
                                <input type="file" name="arquivo">
                            </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label required" for="descricao">Descrição:
                        </label>
                            <div class="col-md-8">
                                <input type="text" name="descricao">
                            </div>
                    </div>

                    <button type="submit">Salvar</button>                    

                </form>
            </div>
        </div>
</div>



</div>
@endsection