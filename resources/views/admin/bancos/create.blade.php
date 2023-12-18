@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Administrar bancos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if(session('info'))
                    <div class="alert alert-success">
                        <strong>{{session('info')}}</strong>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <h3 class="mb-0">Formulario para registro de bancos</h3>
                    <hr>
                    {!! Form::open(['route' => 'admin.bancos.store']) !!}
                    <div class="row">
                        <div class="form-group col-md-12">
                            {!! Form::label('nombre', 'Nombre del banco') !!}
                            {!! Form::text('nombre', null,['class' => 'form-control col-md-6','rows' =>"4"]) !!}                            
                            @error('nombre')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-lg']) !!}
                        </div>                        
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
