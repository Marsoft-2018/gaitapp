@extends('adminlte::page')

@section('content_header')
<div style="display: flex; justify-content:space-between;">
    <h1 class="m-0 text-dark">Detalle de la cuenta</h1>
    <a href="{{route('admin.egresos.index')}}" class="btn btn-info"><i class="fas fa-arrow-left"> Volver</i></a>
</div>
@stop

@section('content')   
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div style="display:flex; justify-content: flex-end; width:100%; margin-bottom: 20px;">
                            <div style="min-width:450px; max-width: 650px; margin:5px;">
                                <img src="{{asset('/img/logoGaita.png')}}" alt="" style="width: 100%;">
                            </div>
                        </div>
                        <hr>
                        <h3 style="text-align: center;">FORMATO DE CUENTA</h3>
                        <div style="display:flex; justify-content: flex-end; width:100%; ">No. _____________</div>
                        <div  style="text-align: center;">
                            <p>La junta organizadora del Festival Nacional de Gaitas "Francisco Llirene"</p>
                            <h3>Debe</h3>
                        </div>
                        <div  style="text-align: left; margin-bottom: 15px;">
                            A: <i><strong style="text-transform:uppercase;">{{ $egreso->participante->nombre_completo }}</strong></i> CC/NIT {{$egreso->participante->documento}}
                        </div>
                        <table width='100%' class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>Concepto</th>
                                    <th colspan="2">Valor</th>
                                </tr>
                                
                            </thead>    
                            <tbody>
                                <tr>
                                    <td width='70%'>
                                    @foreach($egreso->conceptos as $concepto)
                                        <p>
                                        {{ $concepto->descripcion }} 
                                        </p>
                                    @endforeach
                                    </td>
                                    <td  colspan="2">
                                    <div style="display: flex; justify-content: flex-end; align-items: center; font-size:1.1em;font-weight:bold;margin: 5px;">
                                    $ {{ number_format($egreso->valor,0,',','.') }}
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="2">
                                        <p>SON: 
                                           {{ $valorEnLetras }}
                                        </p>
                                    </td>
                                    <td colspan="2">
                                    @foreach($egreso->deduccions as $deduccion)
                                        <div style="display: flex; justify-content: space-between; align-items: center; font-size:0.8em;font-weight:bold;margin: 0px;">
                                            <div>{{ $deduccion->descripcion }} </div>
                                            <div>
                                                @if($deduccion->tipo == 'Porcentaje')
                                                   $ {{ $valor = number_format((($egreso->valor * $deduccion->valor) /100),0,',','.')  }} 
                                                @elseif ($deduccion->tipo == 'Monto')
                                                   $ {{ $valor = number_format($deduccion->valor,0,',','.') }}
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Total:
                                    </td>
                                    <td>
                                    <div style="display: flex; justify-content: flex-end; align-items: center; font-size:1.2em;font-weight:bold;margin: 5px;">
                                    $ {{ number_format($egresoValorNeto,0,',','.') }}
                                    </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width='100%'>
                            <tr>
                                <td>
                                    Fecha:  {{ date('d',strtotime($egreso->fecha))}}/
                                            {{ date('m',strtotime($egreso->fecha))}}/
                                            {{ date('Y',strtotime($egreso->fecha))}}
                                </td>
                                <td colspan="2">
                                    <div style="display:flex; justify-content: space-between; width:100%;"><div><strong>EFECTIVO:</strong></div>
                                        <div style="display: flex; justify-content: center; align-items: center; font-size:1.2em;font-weight:bold;width: 20px; height:20px; border: 1px solid black; border-radius:4px;">
                                            @if($egreso->forma_pago == 'EF')
                                                X
                                            @endIf
                                        </div>
                                    </div>
                                    <div style="display:flex; justify-content: space-between; width:100%;"><div><strong>CHEQUE:</strong></div>
                                        <div style="display: flex; justify-content: center; align-items: center; font-size:1.2em;font-weight:bold;width: 20px; height:20px; border: 1px solid black; border-radius:4px;">
                                            @if($egreso->forma_pago == 'CH')
                                                X
                                            @endIf
                                        </div>
                                    </div>
                                    <div style="display:flex; justify-content: space-between; width:100%;"><div><strong>Transferencia:</strong></div>
                                        <div style="display: flex; justify-content: center; align-items: center; font-size:1.2em;font-weight:bold;width: 20px; height:20px; border: 1px solid black; border-radius:4px;">
                                            @if($egreso->forma_pago == 'TF')
                                                X
                                            @endIf
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><hr></td>
                            </tr>
                            <tr>
                                <td>
                                    CHEQUE No. 
                                    @if($egreso->forma_pago == 'CH')
                                        {{ $egreso->cheque_numero }}
                                    @endIf
                                    <hr>
                                </td>
                                <td></td>
                                <td>
                                    BANCO: 
                                    @if($egreso->forma_pago == 'CH' || $egreso->forma_pago == 'TF')
                                        {{ $egreso->banco->nombre }}
                                    @endIf
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <br><br>
                                    <hr>
                                    Firma del beneficiario<br>
                                    CC.
                                </td>
                                <td></td>
                                <td width="50%">
                                <br><br>
                                <hr>
                                    Firma presidente<br>
                                    CC.
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <br><br>
                                    <hr>
                                    Firma tesorero<br>
                                    CC.</td>
                                <td></td>
                                <td width="50%">
                                    <br><br>
                                    <hr>
                                    Firma del fiscal<br>
                                    CC.</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop