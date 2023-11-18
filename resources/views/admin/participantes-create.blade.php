@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Administrar participantes</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-0">Formulario de registro para participantes</h3>
                    <div class="row">
                        <x-adminlte-input name="name" label="Primer Nombre" fgroup-class="col-md-6"/>
                    </div>
                    <div class="row">
                        <x-adminlte-input name="name" label="Segundo Nombre" fgroup-class="col-md-6"/>
                    </div>
                    <div class="row">
                        <x-adminlte-input name="name" label="Primer Apellido" fgroup-class="col-md-6"/>
                    </div>
                    <div class="row">
                        <x-adminlte-input name="name" label="Segundo Apellido" fgroup-class="col-md-6"/>
                    </div>
                    <div class="row">
                        <x-adminlte-input name="name" label="Documento" placeholder="Ingrese el número del documento"
                              fgroup-class="col-md-6"/>
                    </div>
                    <div class="row">
                        <x-adminlte-input name="name" label="Documento" placeholder="Documento del evento"
                              fgroup-class="col-md-6"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop