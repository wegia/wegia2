@extends('layouts.main')

@section('title')
    Editar
@endsection


@section('breadcrumbs')
<li class="breadcrumb-item" aria-current="page">
    <a href="/">
        <i class="fa fa-home"></i>Home
    </a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="{{route('pessoaMain')}}">
        <i class="far fa-address-book"></i>Pessoa
    </a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="{{route('ocorrencias.painel')}}">
        <i class="far fa-address-book"></i>Ocorrencias
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    <i class="far fa-address-book"></i>Editar
</li>
@endsection

@section('content')
<h1>Editar Ocorrência de {{$ocorrencia->atendido->pessoa->nome}}</h1>
<form method="GET" action="{{ route('ocorrencias.editar', $ocorrencia->id) }}">
    @csrf
    <div class="row mb-3">
        <label class="col-md-3 col-form-label required" for="data">Data:</label>
        <div class="col-md-8">
            <input type="date" name="data" value="{{ $ocorrencia->data }}">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-md-3 col-form-label required" for="name">Tipo de Ocorrência:
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
        <label class="col-md-3 col-form-label required" for="descricao">Descrição:</label>
        <div class="col-md-8">
            <input type="text" name="descricao" value="{{ $ocorrencia->descricao }}">
        </div>
    </div>
    
    
    
    <!-- REFAZER A LISTAGEM E O UPDATE/DELETE DO ARQUIVO -->
    <div class="row mb-3">
        <label class="col-md-3 col-form-label required" for="arquivo">Arquivos:
        </label>
            <div class="col-md-8">
                <select name="ocorrenciaArquivo" id="ocorrenciaArquivos">
                    @foreach($ocorrenciaArquivos as $ocorrenciaArquivo)
                        <option value="{{$ocorrenciaArquivo->ocorrencia_id}}">{{$ocorrenciaArquivo->arquivo}}</option>
                    @endforeach
                </select>
            </div>
        {{-- <label class="col-md-3 col-form-label" for="arquivo"></label>
            <div class="col-md-8">
                <input type="file" name="ocorrenciaArquivo" value="{{ $ocorrenciaArquivo->arquivo }}">
            </div>
        --}}    
    </div>

    

    <button type="submit">Atualizar</button>
</form>


@endsection
