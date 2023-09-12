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
    <a href="/pessoa">
        <i class="far fa-address-book"></i>Pessoa
    </a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="/pessoa/funcionarios/adm">
        <i class="far fa-address-book"></i>Funcionários
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    <i class="far fa-address-book"></i>Editar
</li>
@endsection


@section('content')
<h1>Editar Perfil de Funcionário</h1>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" 
          data-bs-toggle="tab" data-bs-target="#infoPessoais" 
          type="button" role="tab" aria-controls="home" aria-selected="true">Informações Pessoais</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" 
          data-bs-toggle="tab" data-bs-target="#endereco" 
          type="button" role="tab" aria-controls="profile" aria-selected="false">Endereço</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" 
          data-bs-toggle="tab" data-bs-target="#documentacao" 
          type="button" role="tab" aria-controls="contact" aria-selected="false">Documentação</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" 
          data-bs-toggle="tab" data-bs-target="#arquivos" 
          type="button" role="tab" aria-controls="contact" aria-selected="false">Arquivos</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" 
          data-bs-toggle="tab" data-bs-target="#outros" 
          type="button" role="tab" aria-controls="contact" aria-selected="false">Outros</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" 
          data-bs-toggle="tab" data-bs-target="#remuneracao" 
          type="button" role="tab" aria-controls="contact" aria-selected="false">Remuneração</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" 
          data-bs-toggle="tab" data-bs-target="#carga" 
          type="button" role="tab" aria-controls="contact" aria-selected="false">Carga Horária</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" 
          data-bs-toggle="tab" data-bs-target="#dependentes" 
          type="button" role="tab" aria-controls="contact" aria-selected="false">Dependentes</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="infoPessoais" role="tabpanel" aria-labelledby="home-tab">
    <h3>Informações Pessoais</h3>
    <form method="POST" action="/pessoa/funcionarios">
      @method('put')
      @csrf

      <label for="pessoaNome">Nome</label>
      <input type="text" id="pessoaNome" name="pessoa.nome" value="{{$pessoa->nome}}">


        <input type="hidden" name="colaborador.cpf" value="{{$colaborador->cpf}}">
    
        <h4 class="mb-xlg">Informações Pessoais</h4>
        <h5 class="obrig">Campos Obrigatórios(*)</h5>
    
        <div class="form-group">
            <label class="col-md-3 control-label" for="nome">
                Nome<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control" 
                        id="nome" name="pessoa.nome" value="{{$pessoa->nome}}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="genero">
                Gênero<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
            <label>
                <input type="radio" 
                        id="genero" name="pessoa.genero"
                        value="m" 
                        required>
                <i class="fa fa-male" style="font-size: 20px;"></i>
            </label>
            <label>
                <input type="radio" 
                        id="genderF" name="pessoa.genero"
                        value="f" >
                <i class="fa fa-female" style="font-size: 20px;"></i> 
            </label>
        </div>
    
        <div class="form-group">
            <label class="col-md-3 control-label" for="telefone">
                Telefone<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control" 
                        id="telefone" name="contato.telefone"
                        maxlength="14" minlength="14" 
                        placeholder="Ex: (22)99999-9999"
                        value="{{$contato->telefone}}" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="nascimento">
                Nascimento<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="date" class="form-control"
                        id="nascimento" name="pessoa.nascimento"
                        maxlength="10" 
                        placeholder="dd/mm/aaaa"
                        value="{{$pessoa->nascimento}}"
                        required>
            </div>
        </div>
        <button>Editar</button>
    </form>
  </div>
  <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="profile-tab">
    <h3>Endereço</h3>
  </div>
  <div class="tab-pane fade" id="documentacao" role="tabpanel" aria-labelledby="contact-tab">
    <h3>Documentos</h3>
  </div>
  <div class="tab-pane fade" id="arquivos" role="tabpanel" aria-labelledby="contact-tab">
    <h3>Arquivos</h3>
  </div>
  <div class="tab-pane fade" id="outros" role="tabpanel" aria-labelledby="contact-tab">
    <h3>Outros</h3>
  </div>
  <div class="tab-pane fade" id="remuneracao" role="tabpanel" aria-labelledby="contact-tab">
    <h3>Remuneração</h3>
  </div>
  <div class="tab-pane fade" id="carga" role="tabpanel" aria-labelledby="contact-tab">
    <h3>Carga Horária</h3>
  </div>
  <div class="tab-pane fade" id="dependentes" role="tabpanel" aria-labelledby="contact-tab">
    <h3>Dependentes</h3>
  </div>
</div>

@endsection

@section('scripts-vendors')

@endsection