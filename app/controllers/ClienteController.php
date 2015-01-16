<?php

class ClienteController extends BaseController{
    
    public function guardarCliente()
    {
        $clienteConf = new ImpuestoConfiguracion;
        $clienteConf->apl_retencion_iva = Input::get('apl_retencion_iva');
        $clienteConf->apl_retencion_isr = Input::get('apl_retencion_isr');
        $clienteConf->porc_isr          = Input::get('porc_isr');
        $clienteConf->apl_impuesto      = Input::get('apl_impuesto');
        $clienteConf->porc_impuesto     = Input::get('porc_impuesto');
        $clienteConf->tipos_impuesto_id = Input::get('tipos_impuesto_id');
        $clienteConf->save();
         
        $cliente = new Cliente;
        $cliente->numero            = Input::get('numero');
        $cliente->rfc               = Input::get('rfc');
        $cliente->nombre            = Input::get('nombre');
        $cliente->calle             = Input::get('calle');
        $cliente->num_ext           = Input::get('num_ext');
        $cliente->num_int           = Input::get('num_int');
        $cliente->colonia           = Input::get('colonia');
        $cliente->cp                = Input::get('cp');
        $cliente->ciudad            = Input::get('ciudad');
        $cliente->municipio         = Input::get('municipio');
        $cliente->estado            = Input::get('estado');
        $cliente->pais              = Input::get('pais');
        $cliente->email             = Input::get('email');
        $cliente->telefono          = Input::get('telefono');
        $cliente->metodo_pago_id    = Input::get('metodo_pago_id');
        $cliente->ult_cuatro_dig    = Input::get('ult_cuatro_dig');
        $cliente->impuesto_conf_id  = $clienteConf->id;
        $cliente->usuarios_id       = Input::get('usuarios_id');
        $cliente->save();
    }
    
    public function actualizarProducto()
    {
        $clienteConf = ImpuestoConfiguracion::find(Input::get('impuesto_conf_id'));
        $clienteConf->apl_retencion_iva = Input::get('apl_retencion_iva');
        $clienteConf->apl_retencion_isr = Input::get('apl_retencion_isr');
        $clienteConf->porc_isr          = Input::get('porc_isr');
        $clienteConf->apl_impuesto      = Input::get('apl_impuesto');
        $clienteConf->porc_impuesto     = Input::get('porc_impuesto');
        $clienteConf->tipos_impuesto_id = Input::get('tipos_impuesto_id');
        $clienteConf->save();
         
        $cliente = Cliente::find(Input::get('id'));
        $cliente->numero            = Input::get('numero');
        $cliente->rfc               = Input::get('rfc');
        $cliente->nombre            = Input::get('nombre');
        $cliente->calle             = Input::get('calle');
        $cliente->num_ext           = Input::get('num_ext');
        $cliente->num_int           = Input::get('num_int');
        $cliente->colonia           = Input::get('colonia');
        $cliente->cp                = Input::get('cp');
        $cliente->ciudad            = Input::get('ciudad');
        $cliente->municipio         = Input::get('municipio');
        $cliente->estado            = Input::get('estado');
        $cliente->pais              = Input::get('pais');
        $cliente->email             = Input::get('email');
        $cliente->telefono          = Input::get('telefono');
        $cliente->metodo_pago_id    = Input::get('metodo_pago_id');
        $cliente->ult_cuatro_dig    = Input::get('ult_cuatro_dig');
        $cliente->impuesto_conf_id  = $clienteConf->id;
        $cliente->usuarios_id       = Input::get('usuarios_id');
        $cliente->save();
    }

    public function listarClientes()
    {
        $listaClientes = Cliente::all();

        return Response::json(array('clientes' => $listaClientes));
    }

    public function metodosPago()
    {
        $listaMetodosPago = MetodoPago::all();

        return Response::json(array('metodosPago' => $listaMetodosPago));
    }

    public function tiposImpuesto()
    {
        $listaTiposImpuesto = TipoImpuesto::all();

        return Response::json(array('tiposImpuesto' => $listaTiposImpuesto));
    }
}