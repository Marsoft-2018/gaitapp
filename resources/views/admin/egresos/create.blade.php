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
                        <div class="form-group col-sm-12 col-md-6">
                            {!! Form::label('fecha', 'Fecha') !!}
                            {!! Form::date('fecha', \Carbon\Carbon::now(),['class' => 'form-control col-md-6']) !!}                            
                            @error('consecutivo')
                                <span class="text-danger">Ingresa el número o consecutivo del egreso, no puede quedar en blanco</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-6">
                            {!! Form::label('consecutivo', 'No. del Egreso(consecutivo)') !!}
                            {!! Form::text('consecutivo', null,['class' => 'form-control col-md-6']) !!}                            
                            @error('consecutivo')
                                <span class="text-danger">Ingresa el número o consecutivo del egreso, no puede quedar en blanco</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            
                            {!! Form::label('id_participante', 'Pagado a') !!}
                            {!! Form::select('id_participante', $participantes, null, ['placeholder' => 'Seleccione...','class'=>'form-control col-md-6']) !!}
                                                
                            @error('id_participante')
                                <span class="text-danger">El campo pagado a no puede quedar vacío por favor ingresa el dato</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            {!! Form::label('id_concepto', 'Concepto del pago') !!}
                            
                            {!! Form::select('id_concepto', $conceptos, null, ['placeholder' => 'Seleccione...','class'=>'form-control col-md-6']) !!}                     
                            @error('id_concepto')
                                <span class="text-danger">El campo con el concepto no puede quedar sin diligenciar</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            {!! Form::label('valor', 'Monto/Valor') !!}
                            {!! Form::number('valor', null,['class' => 'form-control col-md-6']) !!}                            
                            @error('valor')
                                <span class="text-danger">El valor del egreso no puede estar en cero(0) o vácio</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            {!! Form::label('forma_pago', 'Forma de pago') !!}
                            {!! Form::select('forma_pago', ['EF' => 'Efectivo', 'CH' => 'Cheque', 'TF' => 'Transferencia'], null, ['placeholder' => 'Seleccione...','class'=>'form-control col-md-6']) !!}
                            @error('forma_pago')
                                <span class="text-danger">Por favor selecciona la forma de pago para el egreso</span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <h3>Detalle del egreso</h3>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-3">
                            {!! Form::label('codigo', 'Código de la cuenta') !!}
                            {!! Form::text('codigo', null,['class' => 'form-control col-md-6']) !!}                            
                            @error('codigo')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            {!! Form::label('debito', 'Débito') !!}
                            {!! Form::text('debito', null,['class' => 'form-control col-md-6']) !!}                            
                            @error('debito')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            {!! Form::label('credito', 'Crédito') !!}
                            {!! Form::text('credito', null,['class' => 'form-control col-md-6']) !!}                            
                            @error('credito')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <button class="btn btn-success mt-4"><i class="fa fa-plus"> </i>Añadir</button>
                        </div>
                    </div>
                    <hr>
                    Más cuentas
                    <hr>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-4">
                            {!! Form::label('elaborado', 'Elaborado por') !!}
                            {!! Form::text('elaborado', null,['class' => 'form-control col-md-6']) !!}                            
                            
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            {!! Form::label('aprobado', 'Aprobado por') !!}
                            {!! Form::text('aprobado', null,['class' => 'form-control col-md-6']) !!}                            
                           
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            {!! Form::label('contabilizado', 'Contabilizado por') !!}
                            {!! Form::text('contabilizado', null,['class' => 'form-control col-md-6']) !!}                            
                           
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
