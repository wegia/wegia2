@extends('layouts.main')

@section('title')
Funcionários
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item" aria-current="page">
    <a href="/">
        <i class="fa fa-home"></i>Home
    </a>
</li>
<li class="breadcrumb-item" aria-current="page">
<<<<<<< HEAD:resources/views/rh/funcionarios/funcionario.blade.php
    <a href="/">
=======
    <a href="/rh/employees">
>>>>>>> 0b60b8609c6ed9dd39315c91f0fb1ae17cd9812d:resources/views/rh/employees/employees.blade.php
        <i class="far fa-address-book"></i>Pessoa
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    <i class="far fa-address-book"></i>Funcionários
</li>
@endsection


@section('content')
<div class="content-body">
    <div class="row" id="category-row" >
        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse">
            <a href="/rh/funcionarios/add">
                <i  class="far fa-address-book"></i>
                <span>Cadastrar</span>
            </a>
        </div>
        <div class="col-lg-2 col-md-8 i category-item" data-toggle="collapse"">
            <a href="/rh/funcionarios">
                <i  class="fa fa-cubes"></i>
                <span>Informações Funcionários</span>
            </a>
        </div>

    </div>
</div>

@endsection
