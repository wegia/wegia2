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
        <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
           href="{{route('atendidos.painel')}}">
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
        <!--
                accessing the form for the first time, there is no verification variable. Then, show cpf form.
            -->
        @if(!isset($cpfJaExiste))
            <div class="card col-lg-10 col-md-8 mx-auto m-5 text-bg-dark">
                <h5 class="card-header">Digite seu CPF</h5>
                <div class="card-body bg-dark">
                    <form method="GET" action="{{route('atendidos.validarCpf')}}">
                        <div class="form-outline form-white">
                            <input type="text" id="inputCheckCPF" name="cpf" class="form-control" inputmode="numeric"
                                   pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" maxlength="14" placeholder="Ex. 222.222.222-22">
                        </div>
                        <button class='btn btn-primary mt-3'>Enviar</button>
                    </form>
                </div>
            </div>
        @else
            @if($cpfJaExiste || !$cpfEvalido)
                <div class="col-lg-10 col-md-8 mx-auto m-5">
                    <div class="alert alert-danger alert-dismissable fade show rounded-end"
                         style="border-left:#721C24 10px solid; border-radius: 0px">
                        <div class="container">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <strong>Erro!</strong> Funcionário já cadastrado no sistema ou cpf inválido.
                                </div>
                                <div class="">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-10 col-md-8 mx-auto m-5 text-bg-dark">
                    <h5 class="card-header">Digite seu CPF</h5>
                    <div class="card-body">
                        <form method="GET" action="{{route('atendidos.validarCpf')}}">
                            <div class="md-form">
                                <input type="text" id="inputCheckCPF" name="cpf" class="form-control" maxlength="14">
                                <label for="inputCheckCPF" class="required">CPF</label>
                            </div>
                            <button class='btn btn-primary mt-3'>Enviar</button>
                        </form>
                    </div>
                </div>

            @else
                <div class="row m-5" id="formulario">
                    <ul class="nav nav-pills nav-fill pb-2">
                        <li class="nav-item">
                            <button class="nav-link bg-dark" id="cadastroAtendido" data-bs-toggle="tab"
                                    data-bs-target="#cadastroAtendido" type="button" role="tab"
                                    aria-controls="cadastroAtendido" aria-selected="true">Cadastro de Atendidos
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content bg-dark text-white rounded p-3">
                        <div class="tab-pane fade show active" id="cadastroAtendido" role="tabpanel"
                             aria-labelledby="cadastroAtendido" tabindex="0">
                            <form method="POST" action="/pessoa/atendidos">
                                @csrf
                                <input type="hidden" name="cpf" value="{{$cpf}}">
                                <h4 class="">Informações Pessoais</h4>
                                <h5 class="required fs-6 mb-4">Campos Obrigatórios</h5>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label required" for="name">Nome
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="name" name="nome" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label required" for="genero">
                                        Gênero
                                    </label>
                                    <div class="col-md-8">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="generoM" name="genero"
                                                   value="m" required>
                                            <label class="form-check-label" for="generoM">
                                                <i class="fa fa-male" style="font-size: 20px;"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="generoF" name="genero"
                                                   value="f" required>
                                            <label class="form-check-label" for="generoF">
                                                <i class="fa fa-female" style="font-size: 20px;"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="generoN" name="genero"
                                                   value="" required>
                                            <label class="form-check-label" for="generoN">
                                                Não declarado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label required" for="phone">
                                        Telefone
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="telefone" name="telefone"
                                               maxlength="11" minlength="10" inputmode="numeric"
                                               pattern="^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$" placeholder="Ex: (22)99999-9999"
                                               required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 control-label required" for="nascimento">
                                        Nascimento
                                    </label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" id="nascimento" name="nascimento"
                                               maxlength="10" placeholder="dd/mm/aaaa" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label required" for="status">
                                        Status
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-select" name="status.id" id="status" required>
                                            <option selected disabled>Selecionar</option>
                                            @foreach ($status as $stat)
                                                <option value="{{$stat->id}}">{{$stat->status}}</option>
                                            @endforeach
                                        </select>
                                        <a data-bs-toggle="modal" data-bs-target="#novoStatusModal">
                                            <i class="fas fa-plus mt-2 d-inline-block"></i>
                                            <p class="text-secondary d-inline-block m-0">Adicione um status</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label required" for="status">
                                        Tipo
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-select" name="tipo.id" id="tipo" required>
                                            <option selected disabled>Selecionar</option>
                                            @foreach ($tipos as $tipo)
                                                <option value="{{$tipo->id}}">{{$tipo->descricao}}</option>
                                            @endforeach
                                        </select>
                                        <a data-bs-toggle="modal" data-bs-target="#novoTipoModal">
                                            <i class="fas fa-plus mt-2 d-inline-block"></i>
                                            <p class="text-secondary d-inline-block m-0">Adicione um Tipo</p>
                                        </a>
                                    </div>
                                </div>

                                <hr>
                                <h4 class="mb-4">Documentação</h4>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label required" for="cpf">
                                        Número do CPF
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="cpf" value="{{$cpf}}" maxlength="14"
                                               disabled>
                                    </div>
                                </div>
                                <div class="panel-footer text-center">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class='btn btn-primary'>Salvar</button>
                                            <button type="reset" class="btn btn-danger">Redefinir</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </div>

    <!--
---------------------------------
    Status
---------------------------------
-->

    <div class="modal fade" id="novoStatusModal" tabindex="-1" aria-labelledby="novoStatusModal"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="situacaoModalLabel">Cadastrar Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="d-block mb-2" for="status">Status: </label>
                    <input class="form-control" type="text" maxlength="45" id="iptNovoStatus"
                           name="status.nome">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar
                    </button>
                    <button id="addStatus" type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>

    <!--
---------------------------------
    Tipo
---------------------------------
-->

    <div class="modal fade" id="novoTipoModal" tabindex="-1" aria-labelledby="novoTipoModal"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="situacaoModalLabel">Cadastrar Tipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="d-block mb-2" for="tipo">Tipo: </label>
                    <input class="form-control" type="text" maxlength="45" id="iptNovoTipo"
                           name="tipo.nome">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar
                    </button>
                    <button id="addTipo" type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif

@endsection
@section('scripts-vendors')
@endsection
<script src="/js/pessoa/atendido.js"></script>
