@extends('layouts.main')

@section('title')
Novo Funcionário
@endsection

@section('operation-title')
Cadastro
@endsection


@section('breadcrumbs')
<li class="breadcrumb-item" aria-current="page">
    <a href="/">
        <i class="fa fa-home"></i>Home
    </a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="{{route('rhMain')}}">
        <i class="far fa-address-book"></i>Pessoa
    </a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="{{route('rhFuncionariosPainel')}}">
        <i class="far fa-address-book"></i></i>Funcionários
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    <i class="far fa-address-book"></i>Cadastrar
</li>
@endsection

@section('content')
<div class="content-body">
    <section class="panel" >
    <!-- 
        accessing the form for the first time, there is no verification variable. Then, show cpf form.
    -->
    @if(!isset($cpfJaExiste))

        <header class="panel-heading">
            <h2 class="panel-title">Digite seu CPF</h2>
        </header>

        <div class="panel-body">
            <form method="GET" action="{{route('cpfJaCadastrado')}}">
                <div class="md-form">
                    <input type="text" id="inputCheckCPF" name="cpf" 
                        class="form-control input-pequeno"
                        maxlength="14" >
                    <label for="inputCheckCPF" class="required">CPF</label>
                </div>
                
                <button class='botao'>Enviar</button>
            </form>
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

        <header class="panel-heading">
            <h2 class="panel-title">Digite seu CPF</h2>
        </header>
        <div class="panel-body">
            
            <form method="GET" action="{{route('cpfJaCadastrado')}}">
                <div class="md-form">
                    <input type="text" id="inputCheckCPF" name="cpf" 
                            class="form-control input-pequeno" 
                            maxlength="14" required>
                    <label for="inputCheckCPF" class="required">CPF</label>
                </div>
                <button class='botao'>Enviar</button>
            </form>
        </div>
        @else

        <div class="row" id="formulario">
            <div class="col-md-4 col-lg-3">
                <section class="panel">
                    <div class="panel-body">
                        <div class="thumb-info mb-md">
                            <label for="inputArquivoImagem">Adicione uma foto</label>
                            <input type="file" name="pessoa.foto" id="inputArquivoImagem"
                                    class="image_input form-control" capture="user">
                            <div class="form-foto">
                                <img id="fotoPreview" class="rounded img-responsive" alt="Profile photo" style="display: none">
                                <i id="fotoAvatar" class="fa-solid fa-user"></i>
                            </div>
                        </div>
                    </div>
                </section>
               
            </div>
            <div class="col-md-8 col-lg-8">
                <div class="tabs">
                    <ul class="nav nav-tabs tabs-primary">
                        <li class="active">
                            <a href="#overview" data-toggle="tab">Cadastro de Funcionário</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="overview" class="tab-pane active">
                            <form method="POST" action="/rh/funcionarios" class="form-horizontal" >
                                @csrf

                                <input type="hidden" name="colabDoc.cpf" value="{{$cpf}}">
                            
                                <h4 class="mb-xlg">Informações Pessoais</h4>
                                <h5 class="obrig required">Campos Obrigatórios</h5>
                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label required" for="name">
                                        Nome
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" 
                                                id="name" name="pessoa.nome" required>
                                    </div>
                                </div>
                  
                                <div class="form-group">
                                    <label class="col-md-3 control-label required" for="genero">
                                        Gênero
                                    </label>
                                    <div class="col-md-8">
                                    <label>
                                        <input type="radio" 
                                                id="generoM" name="pessoa.genero"
                                                value="m" 
                                                style="margin-top: 10px; margin-left: 15px;" 
                                                required>
                                        <i class="fa fa-male" style="font-size: 20px;"></i>
                                    </label>
                                    <label>
                                        <input type="radio" 
                                                id="generoF" name="pessoa.genero"
                                                value="f" 
                                                style="margin-top: 10px; margin-left: 15px;" >
                                        <i class="fa fa-female" style="font-size: 20px;"></i> 
                                    </label>
                                    <label>
                                        <input type="radio" 
                                                id="generoN" name="pessoa.genero"
                                                value="" 
                                                style="margin-top: 10px; margin-left: 15px;" >
                                        Não declarado
                                    </label>
                                </div>
                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label required" for="phone">
                                        Telefone
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" 
                                                id="telefone" name="contato.telefone"
                                                maxlength="14" minlength="14" 
                                                placeholder="Ex: (22)99999-9999" >
                                    </div>
                                </div>
                                <div class="form-group">
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
                
                                <h4 class="mb-xlg doch4">Documentação</h4>
                                <div class="form-group">
                                    <label class="col-md-3 control-label required" for="rg">
                                        Número do RG
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" 
                                                id="rg" name="colabDoc.rg" 
                                                placeholder="Ex: 22.222.222-2" required>
                                    </div>
                                </div>
                  
                                <div class="form-group">
                                    <label class="col-md-3 control-label required" for="rg_agency">
                                        Órgão Emissor
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" 
                                                id="rg_agency" name="colabDoc.rg_orgao" 
                                                onkeypress="return Onlychars(event)" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label required" for="rg_date">
                                        Data de expedição
                                    </label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control"
                                                id="rg_date" name="colabDoc.rg_expedicao" 
                                                placeholder="dd/mm/aaaa" required>
                                    </div>
                                </div>
                  
                                <div class="form-group">
                                    <label class="col-md-3 control-label required" for="cpf">
                                        Número do CPF
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" 
                                                id="cpf" 
                                                value="{{$cpf}}"
                                                maxlength="14" disabled>
                                    </div>
                                </div>
                  
                                <div class="form-group">
                                    <label class="col-md-3 control-label required" for="admissao">
                                        Data de Admissão
                                    </label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control"   
                                                id="admissao" name="colab.admissao" 
                                                placeholder="dd/mm/aaaa" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label required" for="situacao">
                                        Situação
                                    </label>
                                    <a data-bs-toggle="modal" data-bs-target="#novaSituacaoModal">
                                        <i class="fas fa-plus w3-xlarge" style="margin-top: 0.75vw"></i>
                                    </a>
                                    
                                    <div class="col-md-6">
                                        
                                        <select class="form-control input-lg mb-md" 
                                                id="situacao" name="colab.situacao" required>
                                            <option selected disabled>Selecionar</option>

                                                <option value="a">Ativo</option>
                                                <option value="i">Inativo</option>
                                            
                                        </select>
                                    </div>
                                </div>
                  
                                <div class="form-group">
                                    <label class="col-md-3 control-label required" for="role">
                                        Cargo
                                    </label>
                                    
                                    <a data-bs-toggle="modal" data-bs-target="#novoCargoModal">
                                        <i class="fas fa-plus w3-xlarge" style="margin-top: 0.75vw"></i>
                                    </a>
                                    <div class="col-md-6">
                                        <select class="form-control input-lg mb-md" 
                                                name="cargo.id" id="cargo" required>
                                            <option selected disabled>Selecionar</option>

                                            @foreach ($cargoList as $cargo)
                                                <option value="{{$cargo->id}}">{{$cargo->nome}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label required" for="escala">
                                        Escala
                                    </label>
                                    <a data-bs-toggle="modal" data-bs-target="#novaEscalaModal"><i class="fas fa-plus w3-xlarge"></i></a>
                                    <div class="col-md-6">
                                        <select class="form-control input-lg mb-md" 
                                                id="escala" name="escala.id" required>
                                            <option selected disabled value="">Selecionar</option>
                                            
                                            @foreach($escalaList as $escala)
                                                <option value="{{$escala->id}}">{{$escala->nome}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label required" for="tipoEscala">
                                        Tipo de Escala
                                    </label>
                                    <a data-bs-toggle="modal" data-bs-target="#novoTipoEscalaModal"><i class="fas fa-plus w3-xlarge"></i></a>
                                    <div class="col-md-6">
                                        <select class="form-control input-lg mb-md" 
                                                id="tipoEscala" name="tipoEscala.id"  required>
                                            <option selected disabled value="">Selecionar</option>  

                                            @foreach($tipoEscalaList as $tipoEscala)
                                                <option value="{{$tipoEscala->id}}">{{$tipoEscala->nome}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="fieldReservista" >
                                    <label class="col-md-3 control-label" for="reserv_numero">
                                        Número do certificado reservista
                                    </label>
                                    
                                    <div class="col-md-6">
                                        <input type="text" name="funcDoc.reserv_numero" class="form-control num_reservista">
                                    </div>

                                    <label class="col-md-3 control-label" for="reserv_serie">
                                        Série do certificado reservista
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control serie_reservista"
                                                id="army_doc_serie" name="funcDoc.reserv_serie" >
                                    </div>
                                </div>

                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-9 col-md-offset-3">
                                            <button type="submit" class='botao'>Salvar</button>
                                            <button type="reset" class="botao-default">Redefinir</button>
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
    modais de cadastro auxiliares
    Cargo:
-->

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
                <label for="novaSituacao">Situação</label>
                <input type="text" maxlength="45" id="iptNovaSituacao" name="situacao.nome">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button id="addSituacao" type="submit" class="btn btn-primary">Adicionar</button>
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
                <label for="novoCargo">Cargo</label>
                <input type="text" maxlength="45" id="iptNovoCargo" name="cargo.nome">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button id="addCargo" type="submit" class="btn btn-primary">Adicionar</button>
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
                <label for="iptNovaEscala">Escala</label>
                <input type="text" maxlength="45" id="iptNovaEscala" name="escala.nome"> 
                <br>
                <label for="iptNovaEscalaDescricao">Descrição</label>
                <textarea id="iptNovaEscalaDescricao" name="escala.descricao"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button id="addEscala" type="submit" class="btn btn-primary">Adicionar</button>
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
                <label for="novoCargo">Tipo de Escala</label>
                <input type="text" maxlength="45" id="iptNovoTipoEscala" name="tipoEscala.nome">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button id="addTipoEscala" type="submit" class="btn btn-primary">Adicionar</button>
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