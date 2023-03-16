@extends('layouts.main')

@section('title')
    Novo Funcionário
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
        <a class="text-secondary" href="{{route('rhFuncionariosPainel')}}">
            <i class="far fa-address-book px-1"></i>Funcionários
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <a href="{{route('listaFuncionarios')}}">
            <i class="far fa-address-book px-1"></i>Cadastrar
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
                <div class="card-body">
                    <form method="GET" action="{{route('cpfJaCadastrado')}}">
                        <div class="md-form">
                            <input type="text" id="inputCheckCPF" name="cpf"
                                   class="form-control" inputmode="numeric" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                                   maxlength="14" placeholder="Ex. 222.222.222-22">
                        </div>
                        <button class='btn btn-primary mt-3'>Enviar</button>
                    </form>
                </div>
            </div>
        @else
            <!--
            Two possibilities:
            - CPF is saved in the database, so it is not possible save a person with this data
        -->
            @if($cpfJaExiste)
                <div class="alert alert-danger" role="alert">
                    Erro. Funcionário já cadastrado no sistema.
                </div>

                <div class="card col-lg-10 col-md-8 mx-auto m-5 text-bg-dark">
                    <h5 class="card-header">Digite seu CPF</h5>
                    <div class="card-body">
                        <form method="GET" action="{{route('cpfJaCadastrado')}}">
                            <div class="md-form">
                                <input type="text" id="inputCheckCPF" name="cpf"
                                       class="form-control"
                                       maxlength="14">
                                <label for="inputCheckCPF" class="required">CPF</label>
                            </div>
                            <button class='btn btn-primary mt-3'>Enviar</button>
                        </form>
                    </div>
                </div>
            @else

                <div class="row m-5" id="formulario">
                    <div class="col-md-4 col-lg-3">
                        <section class="card text-white bg-dark">
                            <div class="card-body">
                                <div class="thumb-info mb-md">
                                    <div class="form-foto text-center form-control text-white bg-dark">
                                        <img id="fotoPreview" class="rounded foto" alt="Profile photo"
                                             style="display: none">
                                        <i id="fotoAvatar" class="fa-solid fa-user"></i>
                                    </div>
                                    <input type="file" name="pessoa.foto" id="inputArquivoImagem"
                                           class="form-control mt-3" capture="user">
                                    <label class="visually-hidden" for="inputArquivoImagem">Adicione uma foto: </label>
                                </div>
                            </div>
                        </section>

                    </div>
                    <div class="col-md-8 col-lg-8">

                        <ul class="nav nav-pills nav-fill pb-2">
                            <li class="nav-item">
                                <button class="nav-link bg-dark" id="cadFunc" data-bs-toggle="tab"
                                        data-bs-target="#cadastroFuncionario" type="button" role="tab"
                                        aria-controls="cadastroFuncionario" aria-selected="true">Cadastro de Funcionário
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content bg-dark text-white rounded p-3">
                            <div class="tab-pane fade show active" id="cadastroFuncionario" role="tabpanel"
                                 aria-labelledby="cadFunc" tabindex="0">
                                <form method="POST" action="/rh/funcionarios">
                                    @csrf
                                    <input type="hidden" name="colabDoc.cpf" value="{{$cpf}}">
                                    <h4 class="">Informações Pessoais</h4>
                                    <h5 class="required fs-6 mb-4">Campos Obrigatórios</h5>

                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label required" for="name">
                                            Nome
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                                   id="name" name="pessoa.nome" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label required" for="genero">
                                            Gênero
                                        </label>
                                        <div class="col-md-8">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                       id="generoM" name="pessoa.genero"
                                                       value="m" required>
                                                <label class="form-check-label" for="generoM">
                                                    <i class="fa fa-male" style="font-size: 20px;"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                       id="generoF" name="pessoa.genero"
                                                       value="f" required>
                                                <label class="form-check-label" for="generoF">
                                                    <i class="fa fa-female" style="font-size: 20px;"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                       id="generoN" name="pessoa.genero"
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
                                            <input type="text" class="form-control"
                                                   id="telefone" name="contato.telefone"
                                                   maxlength="11" minlength="10" 
                                                   inputmode="numeric" 
                                                   pattern="^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$"
                                                   placeholder="Ex: (22)99999-9999" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 control-label required" for="nascimento">
                                            Nascimento
                                        </label>
                                        <div class="col-md-8">
                                            <input type="date" class="form-control"
                                                   id="nascimento" name="pessoa.nascimento"
                                                   maxlength="10"
                                                   placeholder="dd/mm/aaaa" required>
                                        </div>
                                    </div>

                                    <hr>
                                    <h4 class="mb-4">Documentação</h4>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label required" for="rg">
                                            Número do RG
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                                   id="rg" name="colabDoc.rg"
                                                   placeholder="Ex: 22.222.222-2" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label required" for="rg_agency">
                                            Órgão Emissor
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                                   id="rg_agency" name="colabDoc.rg_orgao"
                                                   onkeypress="return Onlychars(event)" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label required" for="rg_date">
                                            Data de expedição
                                        </label>
                                        <div class="col-md-8">
                                            <input type="date" class="form-control"
                                                   id="rg_date" name="colabDoc.rg_expedicao"
                                                   placeholder="dd/mm/aaaa" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label required" for="cpf">
                                            Número do CPF
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                                   id="cpf"
                                                   value="{{$cpf}}"
                                                   maxlength="14" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label required" for="admissao">
                                            Data de Admissão
                                        </label>
                                        <div class="col-md-8">
                                            <input type="date" class="form-control"
                                                   id="admissao" name="colab.admissao"
                                                   placeholder="dd/mm/aaaa" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label required" for="situacao">
                                            Situação
                                        </label>
                                        <div class="col-md-8">
                                            <select class="form-select"
                                                    id="situacao" name="colab.situacao" required>
                                                <option value="a">Ativo</option>
                                                <option value="i">Inativo</option>
                                            </select>
{{--                                            <a data-bs-toggle="modal" data-bs-target="#novaSituacaoModal">--}}
{{--                                                <i class="fas fa-plus mt-2 d-inline-block"></i>--}}
{{--                                                <p class="text-secondary d-inline-block m-0">Adicione uma situação</p>--}}
{{--                                            </a>--}}
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label required" for="cargo">
                                            Cargo
                                        </label>
                                        <div class="col-md-8">
                                            <select class="form-select"
                                                    name="cargo.id" id="cargo" required>
                                                <option selected disabled>Selecionar</option>
                                                @foreach ($cargoList as $cargo)
                                                    <option value="{{$cargo->id}}">{{$cargo->nome}}</option>
                                                @endforeach
                                            </select>
                                            <a data-bs-toggle="modal" data-bs-target="#novoCargoModal">
                                                <i class="fas fa-plus mt-2 d-inline-block"></i>
                                                <p class="text-secondary d-inline-block m-0">Adicione um cargo</p>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label required" for="escala">
                                            Escala
                                        </label>
                                        <div class="col-md-8">
                                            <select class="form-select" id="escala" name="escala.id" required>
                                                <option selected disabled>Selecionar</option>
                                                @foreach($escalaList as $escala)
                                                    <option value="{{$escala->id}}">{{$escala->nome}}</option>
                                                @endforeach
                                            </select>
                                            <a data-bs-toggle="modal" data-bs-target="#novaEscalaModal">
                                                <i class="fas fa-plus mt-2 d-inline-block"></i>
                                                <p class="text-secondary d-inline-block m-0">Adicione uma escala</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label required" for="tipoEscala">
                                            Tipo de Escala
                                        </label>
                                        <div class="col-md-8">
                                            <select class="form-select"
                                                    id="tipoEscala" name="tipoEscala.id" required>
                                                <option selected disabled value="">Selecionar</option>
                                                @foreach($tipoEscalaList as $tipoEscala)
                                                    <option value="{{$tipoEscala->id}}">{{$tipoEscala->nome}}</option>
                                                @endforeach
                                            </select>
                                            <a data-bs-toggle="modal" data-bs-target="#novoTipoEscalaModal">
                                                <i class="fas fa-plus mt-2 d-inline-block"></i>
                                                <p class="text-secondary d-inline-block m-0">Adicione um tipo de
                                                    escala</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mb-3" id="fieldReservista">
                                        <label class="col-md-3 col-form-label" for="reserv_numero">
                                            Número do certificado reservista
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" name="funcDoc.reserv_numero"
                                                   class="form-control num_reservista"
                                                   maxlength="10">
                                        </div>
                                        <label class="col-md-3 col-form-label" for="reserv_serie">
                                            Série do certificado reservista
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" 
                                                    class="form-control serie_reservista"
                                                   id="army_doc_serie" name="funcDoc.reserv_serie"
                                                   maxlength="5">
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
    </div>

    <!--
        Modal
    -->
    <!--
    ---------------------------------
        Situação
    ---------------------------------
    -->

    <div class="modal fade" id="novaSituacaoModal" tabindex="-1"
         aria-labelledby="novaSituacaoModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="situacaoModalLabel">Cadastrar Situação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="d-block mb-2" for="novaSituacao">Situação: </label>
                    <input class="form-control" type="text" maxlength="45" id="iptNovaSituacao" name="situacao.nome">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button id="addSituacao" type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>

    <!--
    ---------------------------------
        Cargo
    ---------------------------------
    -->

    <div class="modal fade" id="novoCargoModal" tabindex="-1"
         aria-labelledby="novoCargoModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Cargo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="d-block mb-2" for="novoCargo">Cargo: </label>
                    <input class="form-control" type="text" maxlength="45" id="iptNovoCargo" name="cargo.nome">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button id="addCargo" type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>

    <!--
    ---------------------------------
        Escala
    ---------------------------------
    -->

    <div class="modal fade" id="novaEscalaModal" tabindex="-1"
         aria-labelledby="novaEscalaModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="escalaModalLabel">Cadastrar Escala</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="d-block mb-2" for="iptNovaEscala">Escala: </label>
                    <input class="form-control" type="text" maxlength="45" id="iptNovaEscala" name="escala.nome">
                    <br>
                    <label class="d-block mb-2" for="iptNovaEscalaDescricao">Descrição: </label>
                    <textarea class="form-control" id="iptNovaEscalaDescricao" name="escala.descricao"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button id="addEscala" type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>

    <!--
    ---------------------------------
        Tipo de Escala
    ---------------------------------
    -->

    <div class="modal fade" id="novoTipoEscalaModal" tabindex="-1"
         aria-labelledby="novoTipoEscalaModal" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="escalaModalLabel">Cadastrar Tipo de Escala</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="d-block mb-2" for="novoCargo">Tipo de Escala: </label>
                    <input class="form-control" type="text" maxlength="45" id="iptNovoTipoEscala" name="tipoEscala.nome">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button id="addTipoEscala" type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>


    @endif
    @endif
    </section>
    </div>

@endsection

@section('scripts-vendors')

    <script src="/js/rh/funcionarios.js"></script>

@endsection
