<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{
    return View::make('hello');
});

Route::get('/factura', function()
{
    return View::make('factura');
});

Route::post('/tipoFacturas', 'UsuarioController@tipoFactura');

Route::post('/metodosPago', 'ClienteController@metodosPago');

Route::post('/tiposImpuesto', 'ClienteController@tiposImpuesto');

Route::post('/getUsuario', 'UsuarioController@obtenerUsuario');

Route::post('/updateUsuario', 'UsuarioController@updateUsuario');

Route::post('/getClientes', 'ClienteController@listarClientes');

Route::post('/createCliente', 'ClienteController@guardarCliente');

Route::post('/updateCliente','ClienteController@actualizarProducto');

Route::post('/getProductos', 'ProductoController@listarProductos');

Route::post('/createProducto', 'ProductoController@guardarProducto');

Route::post('/updateProducto', 'ProductoController@actualizarProducto');

Route::post('/deleteProducto', 'ProductoController@eliminarProducto');

Route::get('/xmls', 'XmlController@crearXml');

Route::get('/validar','Validar@validar');