<?php

class ProductoController extends BaseController{
    
    public function listarProductos()
    {
        $lista = Producto::all();
        
        return Response::json(array('productos' => $lista));
    }
    
    public function guardarProducto()
    {
        $producto = new Producto;
        $producto->precio = Input::get('precio');
        $producto->unidad_medida = Input::get('unidad_medida');
        $producto->tasa_iva = Input::get('tasa_iva');
        $producto->descripcion = Input::get('descripcion');
        $producto->usuario_id = Input::get('usuario_id');
        
        $producto->save();
    }
    
    public function actualizarProducto()
    {
        $producto = Producto::find(Input::get('id'));
        
        $producto->precio = Input::get('precio');
        $producto->unidad_medida = Input::get('unidad_medida');
        $producto->tasa_iva = Input::get('tasa_iva');
        $producto->descripcion = Input::get('descripcion');
        $producto->usuario_id = Input::get('usuario_id');
        
        $producto->save();
        
    }
    
    public function eliminarProducto()
    {
        $producto = Producto::find(Input::get('id'));
        $producto->delete();
    }
}