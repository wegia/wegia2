@extends('layouts.main')

@section('title')
    Lista de Empregados
@endsection

@section('content')

<h1>Funcionários</h1>

Situação
<select>
    <option value="a">Ativo</option>
    <option value="i">Inativo</option>
</select>

<button>Filtrar</button>

<table>
    <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>Cargo</th>
        <th>Ação</th>
    </tr>
@foreach($lista as $func)
    <tr>
        <td>{{$func->nome}}</td>
        <td>{{$func->cpf}}</td>
        <td>{{$func->cargo}}</td>
        <td><a href="{{route('editFuncionarios',$func->func_id) }}">Editar</a></td>   

    </tr>
@endforeach
</table>
@endsection

