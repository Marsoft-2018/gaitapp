@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Listado de participantes</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($participantes as $participante)
                            <tr>
                                <td>{{$participante->id}}</td>
                                <td>{{$participante->nombre_completo}}</td>
                                <td>{{$participante->telefono}}</td>
                                <td>{{$participante->direccion}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop