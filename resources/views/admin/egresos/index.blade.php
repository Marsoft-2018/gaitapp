@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Lista de pagos realizados</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.egresos.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"> Nuevo</i></a>
                    @if(session('info'))
                        <div class="alert alert-success mt-2">
                            <strong>{{session('info')}}</strong>
                        </div>
                        <hr>
                    @endif
                </div>
                <div class="card-body">
                    
                    <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>
                        @foreach($egresos as $egreso)
                        <tr>
                            <td>{{$egreso->id}}</td>
                            <td>{{$egreso->consecutivo}}</td>
                            <td>{{$egreso->fecha}}</td>
                            <td>{{$egreso->participante->nombre_completo}}</td>
                            <td>{{$egreso->valor}}</td>
                            <td>
                                @foreach($egreso->conceptos as $concepto)
                                <p>
                                    {{ $concepto->descripcion }} 
                                </p>
                                @endforeach
                            </td>
                            <td width="10px">
                                <a href="{{route('admin.egresos.show',$egreso)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.egresos.destroy',$egreso)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>
@stop