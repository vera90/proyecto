<?php

class TipoFactura extends Eloquent
{
    public $timestamps = false;
    
    public $table = 'tipos_factura';
    
    public function w($n){
        return $n * 10;
    }
}