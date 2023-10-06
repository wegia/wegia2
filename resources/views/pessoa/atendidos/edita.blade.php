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
    <a href="{{route('atendidos.painel')}}">
        <i class="far fa-address-book"></i>Atendidos
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
          data-bs-toggle="tab" data-bs-target="#familiares" 
          type="button" role="tab" aria-controls="contact" aria-selected="false">Familiares</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="infoPessoais" role="tabpanel" aria-labelledby="home-tab">
    <form method="POST" action="/pessoa/atendidos/painel/edita">
      @method('put')
      @csrf
        <input type="hidden" name="cpf" value="{{$atendido->pessoa->cpf}}">
        <input type="hidden" name="id" value="{{$atendido->id}}">
        <input type="hidden" name="contato_id" value="{{$atendido->pessoa->contato->id}}">


        <h4 class="mb-xlg">Informações Pessoais</h4>
        <h5 class="obrig">Campos Obrigatórios(*)</h5>
    
        <div class="form-group">
            <label class="col-md-3 control-label" for="nome">
                Nome<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control" 
                        id="nome" name="nome" value="{{$atendido->pessoa->nome}}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="genero">
                Gênero<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
            <label>
                <input type="radio" 
                id="genero" 
                name="genero"
                value="m"
                {{ ($atendido->pessoa->genero == 'm' || $atendido->pessoa->genero == 'M') ? 'checked' : '' }}
                required>
                <i class="fa fa-male" style="font-size: 20px;"></i>
            </label>

            <label>
                <input type="radio" 
                    id="genderF" 
                    name="genero"
                    value="f"
                    {{ ($atendido->pessoa->genero == 'f' || $atendido->pessoa->genero == 'F') ? 'checked' : '' }}>
                <i class="fa fa-female" style="font-size: 20px;"></i> 
            </label>

            <label>
                <input type="radio" 
                    id="genderO" 
                    name="genero"
                    value="o"
                    {{ ($atendido->pessoa->genero == 'o' || $atendido->pessoa->genero == 'O') ? 'checked' : '' }}>
                    <label class="form-check-label" for="generoO">Não declarado</label>
            </label>
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-md-3 control-label" for="telefone">
                Telefone<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control" 
                        id="telefone" name="telefone"
                        maxlength="14" minlength="14" 
                        placeholder="Ex: (22)99999-9999"
                        value="{{$atendido->pessoa->contato->telefone}}" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="nascimento">
                Nascimento<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="date" class="form-control"
                        id="nascimento" name="nascimento"
                        maxlength="10" 
                        placeholder="dd/mm/aaaa"
                        value="{{$atendido->pessoa->nascimento}}"
                        required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="tipo_sangue">
                Tipo Sanguíneo<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <select name="tipo_sangue" id="tipo_sangue">
                    <option value="A+" {{($atendido->pessoa->tipo_sangue == "A+")? 'selected' : ''}}>A+</option>
                    <option value="A-" {{($atendido->pessoa->tipo_sangue == "A-")? 'selected' : ''}}>A-</option>
                    <option value="B+" {{($atendido->pessoa->tipo_sangue == "B+")? 'selected' : ''}}>B+</option>
                    <option value="B-" {{($atendido->pessoa->tipo_sangue == "B-")? 'selected' : ''}}>B-</option>
                    <option value="AB+" {{($atendido->pessoa->tipo_sangue == "AB+")? 'selected' : ''}}>AB+</option>
                    <option value="AB-" {{($atendido->pessoa->tipo_sangue == "AB-")? 'selected' : ''}}>AB-</option>
                    <option value="O+" {{($atendido->pessoa->tipo_sangue == "O+")? 'selected' : ''}}>O+</option>
                    <option value="O-" {{($atendido->pessoa->tipo_sangue == "O-")? 'selected' : ''}}>O-</option>
                </select>
            </div>
        </div>

        <button>Editar</button>
    </form>
  </div>

  <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="profile-tab">
    <h3>Endereço</h3>
    <form action="/pessoa/atendidos/painel/edita" method="POST">
        @method('put')
        @csrf
        <input type="hidden" name="id" value="{{$atendido->id}}">
        <input type="hidden" name="contato_id" value="{{$atendido->pessoa->contato->id}}">

        <div class="form-group">
            <label class="col-md-3 control-label" for="cep">
                CEP<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="number" class="form-control"
                        id="cep" name="cep"
                        maxlength="10" 
                        placeholder="Ex: 22222-22"
                        value="{{$atendido->pessoa->contato->cep}}"
                        required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="estado">
                Estado<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control"
                        id="estado" name="estado"
                        maxlength="2" 
                        placeholder="Ex: RJ"
                        value="{{$atendido->pessoa->contato->estado}}"
                        required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="cidade">
                Cidade<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control"
                        id="cidade" name="cidade" 
                        value="{{$atendido->pessoa->contato->cidade}}"
                        required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="bairro">
                Bairro<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control"
                        id="bairro" name="bairro"
                        value="{{$atendido->pessoa->contato->bairro}}"
                        required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="logradouro">
                Logradouro<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control"
                        id="logradouro" name="logradouro"
                        value="{{$atendido->pessoa->contato->logradouro}}"
                        required>
            </div>
        </div>
<!--Revisar-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="numero">
                Numero<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="number" class="form-control"
                        id="numero" name="numero"
                        value="{{$atendido->pessoa->contato->numero}}"
                        required
                        {{ ($atendido->pessoa->contato->numero == 'Não possui') ? 'disabled' : '' }}>
                <label for="sem_numero">Não possuo número</label>
                <input type="checkbox" name="sem_numero" id="sem_numero"
                {{ ($atendido->pessoa->contato->numero == 'sem_numero') ? 'checked' : '' }}>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="complemento">
                Complemento<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control"
                        id="complemento" name="complemento"
                        value="{{$atendido->pessoa->contato->complemento}}"
                        required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="codigo_ibge">
                IBGE<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control"
                        id="codigo_ibge" name="codigo_ibge"
                        value="{{$atendido->pessoa->contato->codigo_ibge}}"
                        required>
            </div>
        </div>

        <button>Editar</button>
    </form>
  </div>
  
  <div class="tab-pane fade" id="documentacao" role="tabpanel" aria-labelledby="contact-tab">
    <h3>Documentos</h3>
  </div>
  <div class="tab-pane fade" id="arquivos" role="tabpanel" aria-labelledby="contact-tab">
    <h3>Arquivos</h3>
  </div>
  <div class="tab-pane fade" id="familiares" role="tabpanel" aria-labelledby="contact-tab">
    <h3>Familiares</h3>
  </div>
</div>

@endsection

@section('scripts-vendors')

@endsection