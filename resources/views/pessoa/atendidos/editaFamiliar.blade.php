@extends('layouts.main')

@section('title')
    Editar Familiar
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
<h1>Editar Informações de {{$familiar->pessoa->nome}}</h1>

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
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="infoPessoais" role="tabpanel" aria-labelledby="home-tab">
    <form method="POST" action="{{route('familiares.editarPessoais')}}">
      @method('put')
      @csrf
        <input type="hidden" name="cpf" value="{{$familiar->pessoa->cpf}}">
        <input type="hidden" name="id" value="{{$familiar->id}}">
        <input type="hidden" name="contato_id" value="{{$familiar->pessoa->contato->id}}">


        <h4 class="mb-xlg">Informações Pessoais</h4>
        <h5 class="obrig">Campos Obrigatórios(*)</h5>
    
        <div class="form-group">
            <label class="col-md-3 control-label" for="nome">
                Nome<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control" 
                        id="nome" name="nome" value="{{$familiar->pessoa->nome}}" required>
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
                {{ ($familiar->pessoa->genero == 'm' || $familiar->pessoa->genero == 'M') ? 'checked' : '' }}
                required>
                <i class="fa fa-male" style="font-size: 20px;"></i>
            </label>

            <label>
                <input type="radio" 
                    id="genderF" 
                    name="genero"
                    value="f"
                    {{ ($familiar->pessoa->genero == 'f' || $familiar->pessoa->genero == 'F') ? 'checked' : '' }}>
                <i class="fa fa-female" style="font-size: 20px;"></i> 
            </label>

            <label>
                <input type="radio" 
                    id="genderO" 
                    name="genero"
                    value="o"
                    {{ ($familiar->pessoa->genero == 'o' || $familiar->pessoa->genero == 'O') ? 'checked' : '' }}>
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
                        value="{{$familiar->pessoa->contato->telefone}}" >
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
                        value="{{$familiar->pessoa->nascimento}}"
                        required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="tipo_sangue">
                Tipo Sanguíneo<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <select name="tipo_sangue" id="tipo_sangue">
                    <option value="A+" {{($familiar->pessoa->tipo_sangue == "A+")? 'selected' : ''}}>A+</option>
                    <option value="A-" {{($familiar->pessoa->tipo_sangue == "A-")? 'selected' : ''}}>A-</option>
                    <option value="B+" {{($familiar->pessoa->tipo_sangue == "B+")? 'selected' : ''}}>B+</option>
                    <option value="B-" {{($familiar->pessoa->tipo_sangue == "B-")? 'selected' : ''}}>B-</option>
                    <option value="AB+" {{($familiar->pessoa->tipo_sangue == "AB+")? 'selected' : ''}}>AB+</option>
                    <option value="AB-" {{($familiar->pessoa->tipo_sangue == "AB-")? 'selected' : ''}}>AB-</option>
                    <option value="O+" {{($familiar->pessoa->tipo_sangue == "O+")? 'selected' : ''}}>O+</option>
                    <option value="O-" {{($familiar->pessoa->tipo_sangue == "O-")? 'selected' : ''}}>O-</option>
                </select>
            </div>
        </div>

        <button>Editar</button>
    </form>
  </div>

  <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="profile-tab">
    <h3>Endereço</h3>
    <form action="{{route('familiares.editarEndereco')}}" method="POST">
        @method('put')
        @csrf
        <input type="hidden" name="cpf" value="{{$familiar->pessoa->cpf}}">
        <input type="hidden" name="id" value="{{$familiar->id}}">
        <input type="hidden" name="contato_id" value="{{$familiar->pessoa->contato->id}}">

        <input type="hidden" name="id" value="{{$familiar->id}}">
        <input type="hidden" name="contato_id" value="{{$familiar->pessoa->contato->id}}">

        <div class="form-group">
            <label class="col-md-3 control-label" for="cep">
                CEP<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control"
                        id="cep" name="cep"
                        maxlength="10" 
                        placeholder="Ex: 22222-22"
                        value="{{$familiar->pessoa->contato->cep}}"
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
                        value="{{$familiar->pessoa->contato->uf->sigla}}"
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
                        value="{{$familiar->pessoa->contato->cidade}}"
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
                        value="{{$familiar->pessoa->contato->bairro}}"
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
                        value="{{$familiar->pessoa->contato->logradouro}}"
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
                        value="{{$familiar->pessoa->contato->numero}}"
                        {{ ($familiar->pessoa->contato->numero == 'Não possui') ? 'disabled' : '' }}>
                <label for="sem_numero">Não possuo número</label>
                <input type="checkbox" name="sem_numero" id="sem_numero"
                {{ ($familiar->pessoa->contato->numero == 'sem_numero') ? 'checked' : '' }}>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="complemento">
                Complemento<sup class="obrig">*</sup>
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control"
                        id="complemento" name="complemento"
                        value="{{$familiar->pessoa->contato->complemento}}"
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
                        value="{{$familiar->pessoa->contato->codigo_ibge}}"
                        required>
            </div>
        </div>

        <button>Editar</button>
    </form>
  </div>

  <div class="tab-pane fade" id="documentacao" role="tabpanel" aria-labelledby="contact-tab">
    <h3>Documentos</h3>
    <form action="{{route('familiares.editarDocumentacao')}}" method="POST">
        @method('put')
        @csrf
        <input type="hidden" name="cpf" value="{{$familiar->pessoa->cpf}}">
        <input type="hidden" name="id" value="{{$familiar->id}}">
        <input type="hidden" name="contato_id" value="{{$familiar->pessoa->contato->id}}">

        <input type="hidden" name="id" value="{{$familiar->id}}">
        <input type="hidden" name="contato_id" value="{{$familiar->pessoa->contato->id}}">

        <div class="form-group">
                <label class="col-md-3 control-label" for="rg">
                    Número do RG<sup class="obrig">*</sup>
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control"
                            id="rg" name="rg"
                            value="{{$familiar->pessoa->rg}}"
                            required>
                </div>
        </div>

        <div class="form-group">
                <label class="col-md-3 control-label" for="rg_orgao">
                    Órgão Emissor<sup class="obrig">*</sup>
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control"
                            id="rg_orgao" name="rg_orgao"
                            value="{{$familiar->pessoa->rg_orgao}}"
                            required>
                </div>
        </div>

        <div class="form-group">
                <label class="col-md-3 control-label" for="rg_data_expedicao">
                    Data de expedição<sup class="obrig">*</sup>
                </label>
                <div class="col-md-8">
                    <input type="date" class="form-control"
                            id="rg_data_expedicao" name="rg_data_expedicao"
                            value="{{$familiar->pessoa->rg_data_expedicao}}"
                            required>
                </div>
        </div>

        <div class="form-group">
                <label class="col-md-3 control-label" for="rg_data_vencimento">
                    Data de vencimento<sup class="obrig">*</sup>
                </label>
                <div class="col-md-8">
                    <input type="date" class="form-control"
                            id="rg_data_vencimento" name="rg_data_vencimento"
                            value="{{$familiar->pessoa->rg_data_vencimento}}"
                            required>
                </div>
        </div>

        <div class="form-group">
                <label class="col-md-3 control-label" for="cpf">
                    Número do CPF
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control"
                            id="cpf" name="cpf"
                            value="{{$familiar->pessoa->cpf}}"
                            disabled>
                </div>
        </div>

        <button>Editar</button>
    </form>
  </div>
</div>  

@endsection