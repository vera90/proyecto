<?php

class UsuarioController extends BaseController {
    
    public function tiposFactura()
    {
        $data = TipoFactura::all();
        
        return Response::json(array('tiposFactura' => $data));
    }
    
    public function obtenerUsuario()
    {
        $dataUsuario = Usuario::where('id','=','2')->get();
        
        $dataSucursal = Sucursal::where('usuario_id','=','2')->get();
        
        return Response::json(array('usuario' => $dataUsuario, 'sucursal' => $dataSucursal));
    }
    
    public function doSaleWithoutPayment() 
    {
        return Response::json(array('html' => Input::get('parametro1') ));
    }


    public function updateUsuario()
    {
        Sucursal::where('usuario_id', '=', Input::get('id'))->update(array('nombre' => Input::get('nombre_sucursal'),
                                                                'calle' => Input::get('calle'),
                                                                'num_ext' => Input::get('num_ext'),
                                                                'num_int' => Input::get('num_int'),
                                                                'colonia' => Input::get('colonia'),
                                                                'cp' => Input::get('cp'),
                                                                'ciudad' => Input::get('ciudad'),
                                                                'municipio' => Input::get('municipio'),
                                                                'estado' => Input::get('estado')));
        Usuario::where('id', '=', Input::get('id'))->update(array('rfc'             => Input::get('rfc'), 
                                                                'nombre'            => Input::get('nombre_usuario'), 
                                                                'calle'             => Input::get('calle'), 
                                                                'num_ext'           => Input::get('num_ext'), 
                                                                'num_int'           => Input::get('num_int'), 
                                                                'colonia'           => Input::get('colonia'), 
                                                                'cp'                => Input::get('cp'), 
                                                                'ciudad'            => Input::get('ciudad'), 
                                                                'municipio'         => Input::get('municipio'), 
                                                                'estado'            => Input::get('estado'), 
                                                                'pais'              => Input::get('pais'), 
                                                                'regimen_fiscal'    => Input::get('regimen_fiscal'), 
                                                                'lugar_expedicion'  => Input::get('lugar_expedicion'), 
                                                                'telefono'          => Input::get('telefono')));
$usuario = Usuario::where('id', '=', Input::get('id'))->get();
$sucursal = Sucursal::where('usuario_id', '=', Input::get('id'))->get();
return Response::json(array('usuario' => $usuario , 'sucursal' => $sucursal));
    }
}
