@extends('layouts.main')

@section('title')
{{ env('APP_NAME') }} - Cadastro de Voluntário
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
    <a href="/rh">
        <i class="far fa-address-book"></i>Recursos Humanos
    </a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="/rh/voluntary/adm">
        <i class="far fa-address-book"></i>Voluntário
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    <i class="far fa-address-book"></i>Cadastrar
</li>
@endsection




@endsection

@section('scripts-vendors')

@endsection