@extends('adminlte::page')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="mb-0">Formulario para registro de pagos</h3>
                    @if(session('info'))
                        <div class="alert alert-success">
                            <strong>{{session('info')}}</strong>
                        </div>
                        <hr>
                    @endif
                </div>
                <div class="card-body">
                    
                    {!! Form::open(['route' => 'admin.egresos.store']) !!}
                    <div class="row">
                        <div class="form-group col-md-12">
                            {!! Form::label('codigo', 'Código de la cuenta') !!}
                            {!! Form::text('codigo', null,['class' => 'form-control col-md-6']) !!}                            
                            @error('codigo')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            {!! Form::label('id_participante', 'Pagado a') !!}
                            {!! Form::text('id_participante', null,['class' => 'form-control col-md-6']) !!}                            
                            @error('id_participante')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            {!! Form::label('id_concepto', 'Concepto del pago') !!}
                            {!! Form::text('id_concepto', null,['class' => 'form-control col-md-6']) !!}                            
                            @error('id_concepto')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::submit('Pagar', ['class' => 'btn btn-success btn-lg']) !!}
                        </div>                        
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
