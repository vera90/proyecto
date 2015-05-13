<?php

class Validar extends BaseController
{
    public function validar()
    {
        $x_validate = new DOMDocument();
        $x_validate->load('C:\xampp\htdocs\facturacion\public\AAA010101AAA_FAC_62e8_20120108.xml');
        
        // return bool
        return $x_validate->schemaValidate('C:\Users\Dream-T530-1\Pictures\cfdv32.xsd');
    }
}