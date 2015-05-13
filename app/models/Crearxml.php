<?php

class Crearxml
{
    private $xmlfile;
	private $root;
	
	function __construct()
	{
        $this->xmlfile=new DOMDocument('1.0','utf-8');
	}
    
    public function comprobante($datos){
        $this->root=$this->xmlfile->appendChild($this->xmlfile->createElementNS("http://www.sat.gob.mx/cfd/3","cfdi:Comprobante"));
		$this->root->setAttributeNS('http://www.w3.org/2001/XMLSchema-instance' ,'xsi:schemaLocation', 'http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv32.xsd');
		foreach ($datos as $key => $value) {
            $this->agregarAtributo($key,$value,$this->root);
		}
	}
 
	public function timbre($datos){
		$complemento=$this->root->appendChild($this->xmlfile->createElement('cfdi:Complemento'));
		$timbre=$complemento->appendChild($this->xmlfile->createElementNS("http://www.sat.gob.mx/TimbreFiscalDigital","tfd:TimbreFiscalDigital"));
		$this->agregarAtributo("xsi:schemaLocation","http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/TimbreFiscalDigital/TimbreFiscalDigital.xsd",$timbre);
		foreach ($datos as $key => $value) {
			$this->agregarAtributo($key,$value,$timbre);
		}
	}
 
	function emisor($datos){
		$emisor=$this->root->appendChild($this->xmlfile->createElement('cfdi:Emisor'));
		$this->agregarAtributo('rfc',$datos['rfc'],$emisor);
		$this->agregarAtributo('nombre',$datos['nombre'],$emisor);
		$regimen=$this->xmlfile->createElement('cfdi:RegimenFiscal');
		$this->agregarAtributo('Regimen',$datos['Regimen'],$regimen);
		$domicilio=$emisor->appendChild($this->xmlfile->createElement('cfdi:DomicilioFiscal'));
		foreach ($datos['domicilio'] as $key => $value) {
			$this->agregarAtributo($key,$value,$domicilio);
		}
		$emisor->appendChild($regimen);
	}
 
	function receptor($datos){
		$receptor=$this->root->appendChild($this->xmlfile->createElement('cfdi:Receptor'));
		$this->agregarAtributo('rfc',$datos['rfc'],$receptor);
		$this->agregarAtributo('nombre',$datos['nombre'],$receptor);
		$domicilio=$receptor->appendChild($this->xmlfile->createElement('cfdi:Domicilio'));
		foreach ($datos['domicilio'] as $key => $value) {
			$this->agregarAtributo($key,$value,$domicilio);
		}
	}
 		
	function conceptos($conceptos){
		$nodo_conceptos=$this->root->appendChild($this->xmlfile->createElement('cfdi:Conceptos'));
		foreach($conceptos as $concepto){
			$nodo_concepto=$nodo_conceptos->appendChild($this->xmlfile->createElement('cfdi:Concepto'));
			foreach ($concepto as $key => $value) {
				$this->agregarAtributo($key,$value,$nodo_concepto);
			}
		}
	}
 
	function impuestos($datos){
		$impuestos=$this->root->appendChild($this->xmlfile->createElement('cfdi:Impuestos'));
		if(isset($datos['retenciones'])){
			$retenciones=$impuestos->appendChild($this->xmlfile->createElement('cfdi:Retenciones'));
			$total_retenciones=0;
			foreach($datos['retenciones'] as $r){
				$retencion=$retenciones->appendChild($this->xmlfile->createElement('cfdi:Retencion'));
				$total_retenciones+=$r['importe'];
				foreach($r as $key=>$value){
					$this->agregarAtributo($key,$value,$retencion);
				}
			}
			$this->agregarAtributo('totalImpuestosRetenidos',$total_retenciones,$impuestos);
		}
		if(isset($datos['traslados'])){
			$retenciones=$impuestos->appendChild($this->xmlfile->createElement('cfdi:Traslados'));
			$total_traslados=0;
			foreach($datos['traslados'] as $r){
				$retencion=$retenciones->appendChild($this->xmlfile->createElement('cfdi:Traslado'));
				$total_traslados+=$r['importe'];
				foreach($r as $key=>$value){
					$this->agregarAtributo($key,$value,$retencion);
				}
			}
			$this->agregarAtributo('totalImpuestosTrasladados',$total_traslados,$impuestos);
		}
	}
 
	private function agregarAtributo($attr,$value,$nodo){
		$atributo=$this->xmlfile->createAttribute($attr);
		$atributo->value=$value;
		$nodo->appendChild($atributo);
	}
 
	function getxml(){
		$this->xmlfile->formatOutput=true;
		return $this->xmlfile->saveXML();
	}
 
	function saveXML($full_path){
		$this->xmlfile->formatOutput=true;
		return $this->xmlfile->save($full_path);
	}
 
	function agregarsello($sello){
        $this->agregarAtributo("sello",$sello,$this->root);
    }
 
 
} 
?>