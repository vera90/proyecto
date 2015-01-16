<?php

class XmlController extends BaseController{
    
    public function crearXml()
    {
        $datos=array(
    "version"=>"3.2",
    "fecha"=>date("Y-m-d\TH:i:s"),
    "formaDePago"=>'Pago en una sola exhibición',
    "subTotal"=>'550.00',
    "Moneda"=>'MXN',
    "total"=>'638.00',
    "metodoDePago"=>'Efectivo',
    "tipoDeComprobante"=>'ingreso',
    "LugarExpedicion"=>'Ensenada, Baja California',
    "condicionesDePago"=>'Contado',
    "certificado"=>'MIIEYTCCA0mgAwIBAgIUMjAwMDEwMDAwMDAyMDAwMDE0MjgwDQYJKoZIhvcNAQEFBQAwggFcMRowGAYDVQQDDBFBLkMuIDIgZGUgcHJ1ZWJhczEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSkwJwYJKoZIhvcNAQkBFhphc2lzbmV0QHBydWViYXMuc2F0LmdvYi5teDEmMCQGA1UECQwdQXYuIEhpZGFsZ28gNzcsIENvbC4gR3VlcnJlcm8xDjAMBgNVBBEMBTA2MzAwMQswCQYDVQQGEwJNWDEZMBcGA1UECAwQRGlzdHJpdG8gRmVkZXJhbDESMBAGA1UEBwwJQ295b2Fjw6FuMTQwMgYJKoZIhvcNAQkCDCVSZXNwb25zYWJsZTogQXJhY2VsaSBHYW5kYXJhIEJhdXRpc3RhMB4XDTEzMDUwNzE2MDEyOVoXDTE3MDUwNzE2MDEyOVowgdsxKTAnBgNVBAMTIEFDQ0VNIFNFUlZJQ0lPUyBFTVBSRVNBUklBTEVTIFNDMSkwJwYDVQQpEyBBQ0NFTSBTRVJWSUNJT1MgRU1QUkVTQVJJQUxFUyBTQzEpMCcGA1UEChMgQUNDRU0gU0VSVklDSU9TIEVNUFJFU0FSSUFMRVMgU0MxJTAjBgNVBC0THEFBQTAxMDEwMUFBQSAvIEhFR1Q3NjEwMDM0UzIxHjAcBgNVBAUTFSAvIEhFR1Q3NjEwMDNNREZOU1IwODERMA8GA1UECxMIcHJvZHVjdG8wgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAKS/beUVy6E3aODaNuLd2S3PXaQre0tGxmYTeUxa55x2t/7919ttgOpKF6hPF5KvlYh4ztqQqP4yEV+HjH7yy/2d/+e7t+J61jTrbdLqT3WD0+s5fCL6JOrF4hqy//EGdfvYftdGRNrZH+dAjWWml2S/hrN9aUxraS5qqO1b7btlAgMBAAGjHTAbMAwGA1UdEwEB/wQCMAAwCwYDVR0PBAQDAgbAMA0GCSqGSIb3DQEBBQUAA4IBAQACPXAWZX2DuKiZVv35RS1WFKgT2ubUO9C+byfZapV6ZzYNOiA4KmpkqHU/bkZHqKjR+R59hoYhVdn+ClUIliZf2ChHh8s0a0vBRNJ3IHfA1akWdzocYZLXjz3m0Er31BY+uS3qWUtPsONGVDyZL6IUBBUlFoecQhP9AO39er8zIbeU2b0MMBJxCt4vbDKFvT9i3V0Puoo+kmmkf15D2rBGR+drd8H8Yg8TDGFKf2zKmRsgT7nIeou6WpfYp570WIvLJQY+fsMp334D05Up5ykYSAxUGa30RdUzA4rxN5hT+W9whWVGD88TD33Nw55uNRUcRO3ZUVHmdWRG+GjhlfsD',
    "noCertificado"=>'20001000000200001428'
);
$emisor=array(
	"rfc"=>'AAA000111234',
	"nombre"=>'Empresa Ficticia',
	"domicilio"=>array(
	    "calle"=>'Gastelum',
	    "colonia"=>'Centro',
	    "municipio"=>'Ensenada',
	    "estado"=>'Baja California',
	    "pais"=>'México',
	    "codigoPostal"=>'22800',
	    "noExterior"=>'444'
    ),
    "Regimen"=>'General'
);
$receptor=array(
	"rfc"=>'BBB111CCC12',
	"nombre"=>'Receptor de prueba',
	"domicilio"=>array(
	    "calle"=>'Benito Juarez',
	    "colonia"=>'Centro',
	    "municipio"=>'Ensenada',
	    "estado"=>'Baja California',
	    "pais"=>'México',
	    "codigoPostal"=>'22800',
	    "noExterior"=>'445'
    )
);
$conceptos=array(
	array(
		"cantidad" => 1,
		"unidad"=>'Pieza',
		"descripcion"=>'Prueba de concepto',
		"valorUnitario"=>'250.00',
		"importe"=>'250.00'
	),
	array(
		"cantidad" => 3,
		"unidad"=>'Pieza',
		"descripcion"=>'Prueba de concepto 2',
		"valorUnitario"=>'100.00',
		"importe"=>'300.00'
	)
);
$impuestos=array(
	'traslados'=>array(
		array(
			"impuesto"=>"IVA",
			"tasa"=>"16",
			"importe"=>"88"
		)
	)//,
	/*"retenciones"=>array(
		array(
			"impuesto"=>"ISR",
			"importe"=>'10.00'
		),
		array(
			"impuesto"=>"IVA",
			"importe"=>"20.00"
		)
	)*/
);
         
$f=new Crearxml();
$f->comprobante($datos);
$f->emisor($emisor);
$f->receptor($receptor);
$f->conceptos($conceptos);
$f->impuestos($impuestos);
echo $f->getxml();
$f->saveXML("prueba.xml");
    }
    
}