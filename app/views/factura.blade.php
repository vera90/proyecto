@extends('Shared._Layout')

@section('body')
<div class="main_content">
    <div class="control-group" style="margin-top:20px;">
        <div class="controls">
            <a href="#datosProd" id="modal-producto" class="btn btn-inverse pull-right" data-toggle="modal" data-backdrop="static">
                <i class="icon-plus icon-white"></i>Productos
            </a>
            <a href="#listaProducto" class="btn btn-inverse pull-right" data-toggle="modal" data-backdrop="static">
                <i class="icon-plus icon-white"></i>Todos Productos
            </a>
            <a href="#datosCli" id="modal-cliente" class="btn btn-inverse pull-right" data-toggle="modal" data-backdrop="static">
                <i class="icon-plus icon-white"></i>Clientes
            </a>
            <a href="#listaCliente" class="btn btn-inverse pull-right" data-toggle="modal" data-backdrop="static">
                <i class="icon-plus icon-white"></i>Todos Clientes
            </a>
            <a href="#datosFis" class="btn btn-inverse pull-right" data-toggle="modal" data-backdrop="static">
                <i class="icon-plus icon-white"></i>Tus Datos Fiscales
            </a>
        </div>
    </div>
    <div class="control-group" style="margin-top:20px;">
        <div class="controls">
            <label class="control-label" for="clien_num">
                Numero Cliente:
            </label>
            <input class="input-medium" id="idusuario" name="idusuario" type="text" maxlength="50" value="">
        </div>
    </div>
</div>

<meta name="_token" content="{{ csrf_token() }}"/>

{{-- <input type="hidden" id="idusuario"/> --}}

<div class="modal hide fade" id="datosFis" style="display:none">
    {{ View::make('partial_views.usuario') }}
</div>

<div class="modal hide fade" id="datosCli" style="display:none">
    {{ View::make('partial_views.cliente') }}
</div>

<div class="modal hide fade" id="listaCliente" style="display:none">
    {{ View::make('partial_views.listaCliente') }}
</div>

<div class="modal hide fade" id="datosProd" style="display:none">
    {{ View::make('partial_views.producto') }}
</div>

<div class="modal hide fade" id="listaProducto" style="display:none">
    {{ View::make('partial_views.listaProducto') }}
</div>

@stop

@section('scriptByPage')
    <script src="assets/script/config.js"></script>
<script src="assets/script/factura.js"></script>
{{--<script src="assets/script/limpiar.js"></script>--}}
@stop