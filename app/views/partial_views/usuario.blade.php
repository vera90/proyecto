<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>
        Tus Datos Fiscales
    </h3>
</div>

<div id="add-campaign-modal-body" class="modal-body">
    <label class="control-label" for="rfc">
        RFC:
    </label>
    <input class="input-large" id="rfc" name="rfc" type="text" maxlength="50" value="">
    
    <label class="control-label" for="nombre_razon_social">
        Nombre o Razón Social:
    </label>
    <input class="input-large" id="nombre_razon_social" name="nombre_razon_social" type="text" maxlength="50" value="">
    
    <label class="control-label" for="tipo_factura">
        Tipo de Factura:
    </label>
    <select id="tipo_factura" name="tipo_factura">
        {{--<option value="0">Selecciona tipo factura...</option>--}}
        {{--<option value="1">Factura</option>--}}
    </select>
        
    <label class="control-label" for="calle">
        Calle:
    </label>
    <input class="input-large" id="calle" name="calle" type="text" maxlength="50" value="">
        
    <label class="control-label" for="num_ext">
        Número Exterior:
    </label>
    <input class="input-large" id="num_ext" name="num_ext" type="text" maxlength="50" value="">
    
    <label class="control-label" for="num_int">
        Número Interior:
    </label>
    <input class="input-large" id="num_int" name="num_int" type="text" maxlength="50" value="">
        
    <label class="control-label" for="colonia">
        Colonia:
    </label>
    <input class="input-large" id="colonia" name="colonia" type="text" maxlength="50" value="">
        
    <label class="control-label" for="cp">
        C.P.:
    </label>
    <input class="input-large" id="cp" name="cp" type="text" maxlength="50" value="">
        
    <label class="control-label" for="ciudad">
        Ciudad, Población, Localidad:
    </label>
    <input class="input-large" id="ciudad" name="ciudad" type="text" maxlength="50" value="">
    
    <label class="control-label" for="municipio">
        Municipio / Delegación:
    </label>
    <input class="input-large" id="municipio" name="municipio" type="text" maxlength="50" value="">
        
    <label class="control-label" for="estado">
        Estado:
    </label>
    <input class="input-large" id="estado" name="estado" type="text" maxlength="50" value="">
        
    <label class="control-label" for="pais">
        País:
    </label>
    <input class="input-large" id="pais" name="pais" type="text" maxlength="50" value="">
        
    <label class="control-label" for="regimen_fis">
        Regimen Fiscal:
    </label>
    <input class="input-large" id="regimen_fis" name="regimen_fis" type="text" maxlength="50" value="">
        
    <label class="control-label" for="expedicion">
        Lugar de Expedición:
    </label>
    <input class="input-large" id="expedicion" name="expedicion" type="text" maxlength="50" value="">
    
    <label class="control-label" for="telefono">
        Telefono:
    </label>
    <input class="input-large" id="telefono" name="telefono" type="text" maxlength="50" value="">
    <br/>
    Sucursal:
    
    <label class="control-label" for="suc_nombre">
        Nombre Sucursal:
    </label>
    <input class="input-large" id="suc_nombre" name="suc_nombre" type="text" maxlength="50" value="">
    
    <label class="control-label" for="suc_calle">
        Calle:
    </label>
    <input class="input-large" id="suc_calle" name="suc_calle" type="text" maxlength="50" value="">
    
    <label class="control-label" for="suc_num_ext">
        Numero exterior:
    </label>
    <input class="input-large" id="suc_num_ext" name="suc_num_ext" type="text" maxlength="50" value="">
    
    <label class="control-label" for="suc_num_int">
        Numero interior:
    </label>
    <input class="input-large" id="suc_num_int" name="suc_num_int" type="text" maxlength="50" value="">
    
    <label class="control-label" for="suc_col">
        Colonia:
    </label>
    <input class="input-large" id="suc_col" name="suc_col" type="text" maxlength="50" value="">
    
    <label class="control-label" for="suc_cp">
        C.P.:
    </label>
    <input class="input-large" id="suc_cp" name="suc_cp" type="text" maxlength="50" value="">
    
    <label class="control-label" for="suc_ciudad">
        Ciudad, Población, Localidad:
    </label>
    <input class="input-large" id="suc_ciudad" name="suc_ciudad" type="text" maxlength="50" value="">
    
    <label class="control-label" for="suc_mun">
        Municipio / Delegación:
    </label>
    <input class="input-large" id="suc_mun" name="suc_mun" type="text" maxlength="50" value="">
    
    <label class="control-label" for="suc_estado">
        Estado:
    </label>
    <input class="input-large" id="suc_estado" name="suc_estado" type="text" maxlength="50" value="">
</div>

<div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
    <a href="#" class="btn btn-primary" id="guardarUsuario">Guardar</a>
</div>