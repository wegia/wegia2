@extends('layouts.main')

@section('title')
    Lista de Empregados
@endsection

@section('content')

<div class="card col-lg-10 col-md-8 mx-auto m-5 text-bg-dark">
        <h5 class="card-header">Voluntarios</h5>
        <div class="card-body">
          
            <table id="table" class="table table-dark listTable">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Colaborador</th>
                        <th scope="col">Disponibilidade horas</th>
                        <th scope="col">Disponibilidade semanas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($voluntarios as $voluntario)
                    <tr>
                        <th scope="row">{{$voluntario->id}}</th>
                        <td>{{$voluntario->descricao}}</td>
                        <td>{{$voluntario->colaborador->pessoa->nome}} </td>
                        <td>{{$voluntario->disponib_semana}}</td>
                        <td>{{$voluntario->disponib_horas}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</div>
</div>

@endsection

