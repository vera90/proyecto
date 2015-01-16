<?php
 
/*
	crearxml
	Crear un archivo XML Cfdi 3.2
	14/08/2014
*/
 
class Crearxml
{
 
	private $xmlfile;
	private $root;
	
	function __construct()
	{
		$this->xmlfile=new DOMDocument('1.0','utf-8');
	}
 
	/**
	* comprobante
	* Crea el nodo <cfdi:Comprobante> y agrega sus atributos (version=>3.2,Moneda:'MXN',total=>000.00)
	* @param  array $datos (datos del comprobante atributo=>valor)
	* array(
	*      "version"				=>	'3.2',								//(REQUERIDO)Valor prefijado a 3.2 que indica la versión del estándar bajo el que se encuentra expresado el comprobante.
	*      "fecha"					=>	date("Y-m-d\TH:i:s"),				//(REQUERIDO)Expresión de la fecha y hora de expedición del comprobante fiscal. Se expresa en la forma aaaa-mm-ddThh:mm:ss, de acuerdo con la especificación ISO 8601.
	*      "formaDePago"			=>	'Pago en una sola exhibición',		//(REQUERIDO)Precisar la forma de pago que aplica para este comprobnante fiscal digital a través de Internet. Se utiliza para expresar Pago en una sola exhibición o número de parcialidad pagada contra el total de parcialidades, Parcialidad 1 de X.
	*      "subTotal"				=>	number_format($subtotal,2,'.',''),	//(REQUERIDO)Representar la suma de los importes antes de descuentos e impuestos.
	*      "total"					=>	number_format($total,2,'.',''),		//(REQUERIDO)Representar la suma del subtotal, menos los descuentos aplicables, más los impuestos trasladados, menos los impuestos retenidos.
	*      "metodoDePago"			=>	'Efectivo|Credito|...',				//(REQUERIDO)Atributo requerido de texto libre para expresar el método de pago de los bienes o servicios amparados por el comprobante. Se entiende como método de pago leyendas tales como: cheque, tarjeta de crédito o debito, depósito en cuenta, etc.
	*      "tipoDeComprobante"		=>	'ingreso|egreso',					//(REQUERIDO)Expresar el efecto del comprobante fiscal para el contribuyente emisor.
	*      "LugarExpedicion"		=>	'Ensenada, Baja California',		//(REQUERIDO)Incorporar el lugar de expedición del comprobante.
	*      "certificado"			=>	'unchingodecaracteres',				//(REQUERIDO)Expresar el certificado de sello digital que ampara al comprobante como texto, en formato base 64.
	*      "noCertificado"			=>	'00000000000000000000'				//(REQUERIDO)Expresar el número de serie del certificado de sello digital que ampara al comprobante, de acuerdo al acuse correspondiente a 20 posiciones otorgado por el sistema del SAT.
	*      "sello"					=>	'unchingo decaracteres'				//(REQUERIDO)Contener el sello digital del comprobante fiscal, al que hacen referencia las reglas de resolución miscelánea aplicable. El sello deberá ser expresado cómo una cadena de texto en formato Base 64.
	*      "Moneda"				=>	'MXN|USD',							//(OPCIONAL)Expresar la moneda utilizada para expresar los montos
	* 		"serie"					=>	'AAA'								//(OPCIONAL)Precisar la serie para control interno del contribuyente. Este atributo acepta una cadena de caracteres alfabéticos de 1 a 25 caracteres sin incluir caracteres acentuados.
	*  	"folio"					=>	'123'								//(OPCIONAL)Control interno del contribuyente que acepta un valor numérico entero superior a 0 que expresa el folio del comprobante.
	*  	"condicionesDePago"		=>	''									//(OPCIONAL)Expresar las condiciones comerciales aplicables para el pago del comprobante fiscal digital a través de Internet.
	*  	"NumCtaPago"			=>	'0000',								//(OPCIONAL)Incorporar al menos los cuatro últimos digitos del número de cuenta con la que se realizó el pago.
	*  	"descuento"				=>	000.00, 							//(OPCIONAL)Representar el importe total de los descuentos aplicables antes de impuestos.
	*  	"motivoDescuento"		=>	'x motivo',							//(OPCIONAL)Expresar el motivo del descuento aplicable.
	*  	"TipoCambio"			=>	'x',								//(OPCIONAL)Representar el tipo de cambio conforme a la moneda usada
	*  	"FolioFiscalOrig"		=>	'xxxxx',							//(OPCIONAL)Señalar el número de folio fiscal del comprobante que se hubiese expedido por el valor total del comprobante, tratándose del pago en parcialidades.
	*  	"SerieFolioFiscalOrig"	=>	'ABC',								//(OPCIONAL)Señalar la serie del folio del comprobante que se hubiese expedido por el valor total del comprobante, tratándose del pago en parcialidades.
	*  	"FechaFolioFiscalOrig" 	=>	date("Y-m-d\TH:i:s")				//(OPCIONAL)Señalar la fecha de expedición del comprobante que se hubiese emitido por el valor total del comprobante, tratándose del pago en parcialidades. Se expresa en la forma aaaa-mm-ddThh:mm:ss, de acuerdo con la especificación ISO 8601.
	*  	"MontoFolioFiscalOrig"	=>	'123.00'							//(OPCIONAL)Señalar el total del comprobante que se hubiese expedido por el valor total de la operación, tratándose del pago en parcialidades
	* );
	* Nota: el sello se agregara despues
	* 
	* @return none
	*/
	public function comprobante($datos){
		//insertar nodo pricipal
		$this->root=$this->xmlfile->appendChild($this->xmlfile->createElementNS("http://www.sat.gob.mx/cfd/3","cfdi:Comprobante"));
		//y sus atributos NS
		$this->root->setAttributeNS('http://www.w3.org/2001/XMLSchema-instance' ,'xsi:schemaLocation', 'http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv32.xsd');
		//agregar atributos de arreglo: version, folio, etc...
		foreach ($datos as $key => $value) {
			$this->agregarAtributo($key,$value,$this->root);
		}
	}
 
	/**
	 * timbre
	 * Crea nodo comprobante e inserta en el el TimbreFiscalDigital, datos que retorna el PAC
	 * 
	 * @param  array $datos (datos de timbrado atributo=>valor)
	 * array(
	 * 		"FechaTimbrado"		=>	date("Y-m-d\TH:i:s")  						//Expresar la fecha y hora de la generación del timbre por la certificación digital del SAT. Se expresa en la forma aaaa-mm-ddThh:mm:ss, de acuerdo con la especificación ISO 8601
	 *   	"UUID"				=>	"3A821563-A6DA-48CA-BA26-FFE6C5463D9F" 		//Expresar los 36 caracteres del folio fiscal (UUID) de la transacción de timbrado conforme al estándar RFC 4122
	 *    	"noCertificadoSAT", =>	"00000000000000000000" 						//Expresar el número de serie del certificado del SAT usado para generar el sello digital del Timbre Fiscal Digital
	 *     	"selloCFD"			=> 	'unchingodecaracteres', 					//Contener el sello digital del comprobante fiscal, que será timbrado. El sello deberá ser expresado cómo una cadena de texto en formato Base 64.
	 *      "selloSAT"			=> 	'unchingodecaracteres', 					//Contener el sello digital del Timbre Fiscal Digital, al que hacen referencia las reglas de resolución miscelánea aplicable. El sello deberá ser expresado cómo una cadena de texto en formato Base 64.
	 *      "version" 			=>	'1.0'										//Expresión de la versión del estándar del Timbre Fiscal Digital
	 * )
	 * @return none
	 */
	public function timbre($datos){
		//Crear e insertar nodo "Complemento"
		$complemento=$this->root->appendChild($this->xmlfile->createElement('cfdi:Complemento'));
		//Crear nodo "TimbreFiscalDigital" e insertarlo en complemento
		$timbre=$complemento->appendChild($this->xmlfile->createElementNS("http://www.sat.gob.mx/TimbreFiscalDigital","tfd:TimbreFiscalDigital"));
		//Agregar atributo xsi:schemaLocation
		$this->agregarAtributo("xsi:schemaLocation","http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/TimbreFiscalDigital/TimbreFiscalDigital.xsd",$timbre);
		//Y los datos del array timbre
		foreach ($datos as $key => $value) {
			$this->agregarAtributo($key,$value,$timbre);
		}
	}
 
 
	/**
	 * emisor
	 * Crea nodo emisor y agrega sus propiedades asi como nodos hijo
	 * @param  array $datos (datos del emisor atributo => valor)
	 * array(
	 * 		"rfc"		=>	'12-13 caracteres' 			//(REQUERIDO) Clave del Registro Federal de Contribuyentes correspondiente al contribuyente emisor del comprobante sin guiones o espacios
	 *   	"nombre"	=>	'nombre de emisor' 			//(REQUERIDO) Nombre, denominación o razón social del contribuyente emisor del comprobante.
	 *    	"domicilio"	=>	array(
	 *     						"calle"			=>	'calle'				//(REQUERIDO) Avenida, calle, camino o carretera donde se da la ubicación.
	 *           				"noExterior"	=>	'123234'			//(OPCIONAL) Número particular en donde se da la ubicación sobre una calle dada,
	 *               			"noInterior"	=>	'A-0000'			//(OPCIONAL) Información adicional para especificar la ubicación,
	 *                  		"colonia"		=>	'Centro'			//(OPCIONAL) Colonia en donde se da la ubicación cuando se desea ser más específico en casos de ubicaciones urbanas,
	 *                    		"localidad"		=>	'Ensenada'			//(OPCIONAL) precisar la ciudad o población donde se da la ubicación,
	 *                      	"referencia"	=>	'opcional'			//(OPCIONAL) Referencia de ubicación adicional,
	 *                       	"municipio"		=>	'Ensenada'			//(REQUERIDO) precisar el municipio o delegación (en el caso del Distrito Federal) en donde se da la ubicación
	 *                        	"estado"		=>	'Baja California'	//(REQUERIDO) Recisar el estado o entidad federativa donde se da la ubicación
	 *                         	"pais"			=>	'México'			//(REQUERIDO) País donde se da la ubicación
	 *                          "codigoPostal"	=>	'22800'				//(REQUERIDO) Código postal en donde se da la ubicación
	 *     	),
	 *      "regimen"	=>	'General'									//(REQUERIDO) Nombre del régimen en el que tributa el contribuyente emisor.
	 * )
	 */
	function emisor($datos){
		//Crear e insertar nodo 'Emisor' y asignarle los atributos 'rfc' y 'nombre'
		$emisor=$this->root->appendChild($this->xmlfile->createElement('cfdi:Emisor'));
		$this->agregarAtributo('rfc',$datos['rfc'],$emisor);
		$this->agregarAtributo('nombre',$datos['nombre'],$emisor);
		//solo crear nodo 'RegimenFiscal' y agregar sus atributos
		$regimen=$this->xmlfile->createElement('cfdi:RegimenFiscal');
		$this->agregarAtributo('Regimen',$datos['Regimen'],$regimen);
		//insertar nodo 'DomicilioFiscal'
		$domicilio=$emisor->appendChild($this->xmlfile->createElement('cfdi:DomicilioFiscal'));
		//y como ya solo quedan sus atributos, insertarlos
		foreach ($datos['domicilio'] as $key => $value) {
			$this->agregarAtributo($key,$value,$domicilio);
		}
		//por ultimo agregar nodo 'RegimenFiscal' al nodo emisor
		$emisor->appendChild($regimen);
	}
 
 
	/**
	 * receptor
	 * Agregar nodo 'Receptor' al XML
	 * @param  array $datos (datos del receptor)
	 * array(
	 * 		"rfc"		=> '12-13 caracteres'				//(REQUERIDO) Clave del Registro Federal de Contribuyentes correspondiente al contribuyente receptor del comprobante
	 *   	"nombre"	=> 'nombre de receptor'				//(OPCIONAL) Nombre, denominación o razón social del contribuyente receptor del comprobante
	 *    	"domicilio"	=>	array(
	 *     						"calle"			=>	'calle'				//(OPCIONAL) Avenida, calle, camino o carretera donde se da la ubicación.
	 *           				"noExterior"	=>	'123234'			//(OPCIONAL) Número particular en donde se da la ubicación sobre una calle dada,
	 *               			"noInterior"	=>	'A-0000'			//(OPCIONAL) Información adicional para especificar la ubicación,
	 *                  		"colonia"		=>	'Centro'			//(OPCIONAL) Colonia en donde se da la ubicación cuando se desea ser más específico en casos de ubicaciones urbanas,
	 *                    		"localidad"		=>	'Ensenada'			//(OPCIONAL) precisar la ciudad o población donde se da la ubicación,
	 *                      	"referencia"	=>	'opcional'			//(OPCIONAL) Referencia de ubicación adicional,
	 *                       	"municipio"		=>	'Ensenada'			//(OPCIONAL) precisar el municipio o delegación (en el caso del Distrito Federal) en donde se da la ubicación
	 *                        	"estado"		=>	'Baja California'	//(OPCIONAL) Recisar el estado o entidad federativa donde se da la ubicación
	 *                         	"pais"			=>	'México'			//(REQUERIDO) País donde se da la ubicación
	 *                          "codigoPostal"	=>	'22800'				//(OPCIONAL) Código postal en donde se da la ubicación
	 *     )
	 * )
	 */
	function receptor($datos){
		//crear nodo y atributos 'rfc' y 'nombre'
		$receptor=$this->root->appendChild($this->xmlfile->createElement('cfdi:Receptor'));
		$this->agregarAtributo('rfc',$datos['rfc'],$receptor);
		$this->agregarAtributo('nombre',$datos['nombre'],$receptor);
		$domicilio=$receptor->appendChild($this->xmlfile->createElement('cfdi:Domicilio'));
		//y como ya solo quedan sus atributos, insertarlos
		foreach ($datos['domicilio'] as $key => $value) {
			$this->agregarAtributo($key,$value,$domicilio);
		}
	}
 
 
	/**
	 * conceptos
	 * Crear nodo 'Conceptos' y nodos hijos de este (array(atributo=>valor),array(atributo=>valor))
	 * array(
	 * 		array(
	 *   		"cantidad" => numero, 					//(REQUERIDO) Cantidad de bienes o servicios del tipo particular definido por el presente concepto
	 *     		"unidad" => 'pieza|litro',				//(REQUERIDO) Unidad de medida aplicable para la cantidad expresada en el concepto
	 *       	"noIdentificacion" => 'cadena',			//(OPCIONAL) Número de serie del bien o identificador del servicio amparado por el presente concepto
	 *        	"descripcion" => 'descripcion xxx',		//(REQUERIDO) Descripción del bien o servicio cubierto por el presente concepto
	 *         	"valorUnitario" => 'precio unitario',	//(REQUERIDO) Valor o precio unitario del bien o servicio cubierto por el presente concepto
	 *          "importe" => 'cantidad x precio u'		//(REQUERIDO) Importe total de los bienes o servicios del presente concepto. Debe ser equivalente al resultado de multiplicar la cantidad por el valor unitario expresado en el concepto
	 *   	),
	 *    	array(),array()
	 * )
	 * @param  array $conceptos (array de arrays)
	 */			
	function conceptos($conceptos){
		//crear nodo padre 'Conceptos'
		$nodo_conceptos=$this->root->appendChild($this->xmlfile->createElement('cfdi:Conceptos'));
		foreach($conceptos as $concepto){
			//insertar nodo 'Concepto' y atributos
			$nodo_concepto=$nodo_conceptos->appendChild($this->xmlfile->createElement('cfdi:Concepto'));
			foreach ($concepto as $key => $value) {
				$this->agregarAtributo($key,$value,$nodo_concepto);
			}
		}
	}
 
 
	/**
	 * impuestos
	 * Agregar el nodo 'Impuestos' e hijos (Retenciones,Traslados) 
	 * @param  array $datos Arreglo con los impuestos aplicados
	 * @return none
	 */
	function impuestos($datos){
		//crear y agregar el nodo 'Impuestos'
		$impuestos=$this->root->appendChild($this->xmlfile->createElement('cfdi:Impuestos'));
		//si existen retenidos, crear el nodo y sus hijos
		if(isset($datos['retenciones'])){
			//creo y agrego el nodo de retenciones al nodo impuestos
			$retenciones=$impuestos->appendChild($this->xmlfile->createElement('cfdi:Retenciones'));
			$total_retenciones=0;
			//crear y agregar cada retencion al nodo retenciones
			foreach($datos['retenciones'] as $r){
				$retencion=$retenciones->appendChild($this->xmlfile->createElement('cfdi:Retencion'));
				$total_retenciones+=$r['importe'];
				foreach($r as $key=>$value){
					$this->agregarAtributo($key,$value,$retencion);
				}
			}
			//al final agrego el total de retenciones al nodo Impuestos
			$this->agregarAtributo('totalImpuestosRetenidos',$total_retenciones,$impuestos);
		}
		if(isset($datos['traslados'])){
			//creo y agrego el nodo de traslados al nodo impuestos
			$retenciones=$impuestos->appendChild($this->xmlfile->createElement('cfdi:Traslados'));
			$total_traslados=0;
			//crear y agregar cada traslado al nodo traslados
			foreach($datos['traslados'] as $r){
				$retencion=$retenciones->appendChild($this->xmlfile->createElement('cfdi:Traslado'));
				$total_traslados+=$r['importe'];
				foreach($r as $key=>$value){
					$this->agregarAtributo($key,$value,$retencion);
				}
			}
			//al final agrego el total de retenciones al nodo Impuestos
			$this->agregarAtributo('totalImpuestosTrasladados',$total_traslados,$impuestos);
		}
	}
 
 
	/**
	 * agregarAtributo
	 * Agregar atributo al nodo
	 * @param  string $attr  nombre del atributo
	 * @param  string $value valor del atributo
	 * @param  object $nodo  nodo al que se le aplicara el atributo
	 * @return none
	 */
	private function agregarAtributo($attr,$value,$nodo){
		$atributo=$this->xmlfile->createAttribute($attr);
		$atributo->value=$value;
		$nodo->appendChild($atributo);
	}
 
 
	/**
	 * getxml
	 * @return XML|false Retorna el archivo XML
	 */
	function getxml(){
		$this->xmlfile->formatOutput=true;
		return $this->xmlfile->saveXML();
	}
 
	/**
	 * saveXML
	 * @param  string $full_path Ruta donde se guardara el archivo
	 * @return número de bytes escritos o FALSE
	 */
	function saveXML($full_path){
		$this->xmlfile->formatOutput=true;
		return $this->xmlfile->save($full_path);
	}
 
	/**
	 * agregarsello
	 * @param  string $sello Sello en base 64
	 * @return none
	 */
	function agregarsello($sello){$this->agregarAtributo("sello",$sello,$this->root);}
 
 
}
 
//Prubas
 

 

 
?>