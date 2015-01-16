<div class="modal-header">
    {{--<button type="button" class="close" data-dismiss="modal">×</button--}}
    <h3>
        Cliente
    </h3>
</div>

<div id="add-campaign-modal-body" class="modal-body">
    <label class="control-label" for="clien_num">
        Numero Cliente:
    </label>
    <input class="input-medium" id="clien_num" name="clien_num" type="text" maxlength="50" value="">
    
    <label class="control-label" for="clien_rfc">
        RFC:
    </label>
    <input class="input-medium" id="clien_rfc" name="clien_rfc" type="text" maxlength="50" value="">
    
    <label class="control-label" for="clien_nombre">
        Nombre Cliente:
    </label>
    <input class="input-medium" id="clien_nombre" name="clien_nombre" type="text" maxlength="50" value="">

    <label class="control-label" for="clien_calle">
        Calle:
    </label>
    <input class="input-medium" id="clien_calle" name="clien_calle" type="text" maxlength="50" value="">

    <label class="control-label" for="clien_exterior">
        Numero Exterior:
    </label>
    <input class="input-medium" id="clien_exterior" name="clien_exterior" type="text" maxlength="50" value="">
    
    <label class="control-label" for="clien_interior">
        Numero Interior:
    </label>
    <input class="input-medium" id="clien_interior" name="clien_interior" type="text" maxlength="50" value="">

    <label class="control-label" for="clien_col">
        Colonia:
    </label>
    <input class="input-medium" id="clien_col" name="clien_col" type="text" maxlength="50" value="">

    <label class="control-label" for="clien_cp">
        C.P.:
    </label>
    <input class="input-medium" id="clien_cp" name="clien_cp" type="text" maxlength="50" value="">

    <label class="control-label" for="clien_ciudad">
        Ciudad, Población, Localidad:
    </label>
    <input class="input-medium" id="clien_ciudad" name="clien_ciudad" type="text" maxlength="50" value="">

    <label class="control-label" for="clien_mun">
        Municipio / Delgación:
    </label>
    <input class="input-medium" id="clien_mun" name="clien_mun" type="text" maxlength="50" value="">

    <label class="control-label" for="clien_edo">
        Estado:
    </label>
    <input class="input-medium" id="clien_edo" name="clien_edo" type="text" maxlength="50" value="">

    <label class="control-label" for="clien_pais">
        País:
    </label>
    <input class="input-medium" id="clien_pais" name="clien_pais" type="text" maxlength="50" value="">

    <label class="control-label" for="clien_email">
        Email:
    </label>
    <input class="input-medium" id="clien_email" name="clien_email" type="text" maxlength="50" value="">

    <label class="control-label" for="clien_tel">
        Telefono:
    </label>
    <input class="input-medium" id="clien_tel" name="clien_tel" type="text" maxlength="50" value>
    
    <label class="control-label" for="clien_met_pago">
        Método de Pago:
    </label>
    <select id="clien_met_pago" name="clien_met_pago">

    </select>

    <label class="control-label" for="clien_ult_dig">
        Ultimos 4 digitos:
    </label>
    <input class="input-medium" id="clien_ult_dig" name="clien_ult_dig" type="text" maxlength="50" value="">
    
    {{-- ------------Configuración impuestos------------- --}}
    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}
    <label class="control-label" for="clien_ret_iva">
        Aplicar Retención de IVA:
    </label>
    <input class="input-medium" id="clien_ret_iva" name="clien_ret_iva" type="checkbox" maxlength="50" value="">

    <label class="control-label" for="clien_ret_isr">
        Aplicar Retención de ISR:
    </label>
    <input class="input-medium" id="clien_ret_isr" name="clien_ret_isr" type="checkbox" maxlength="50" value="">

    <label class="control-label" for="clien_por_isr">
        Porcentaje:
    </label>
    <input class="input-medium" id="clien_por_isr" name="clien_por_isr" type="text" maxlength="50" value="">
    
    <label class="control-label" for="clien_apl_impuesto">
        Aplicar Impuesto:
    </label>
    <input class="input-medium" id="clien_apl_impuesto" name="clien_apl_impuesto" type="checkbox" maxlength="50" value="">

    <label class="control-label" for="clien_impuesto">
        Tipo Impuesto:
    </label>
    <select id="clien_impuesto" name="clien_impuesto">
        
    </select>

    <label class="control-label" for="clien_porcentaje">
        Porcentaje:
    </label>
    <input class="input-medium" id="clien_porcentaje" name="clien_porcentaje" type="text" maxlength="50" value="">
    {{-- ----------------inputs hidden------------------- --}}
    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}
    <input type="hidden" id="id-cliente">
    <input type="hidden" id="id-impuesto-conf">
</div>
    
<div class="modal-footer">
    <a href="#" id="cerrar-cliente" class="btn" data-dismiss="modal">Cerrar</a>
    <a href="#" class="btn btn-primary" id="guardarCliente">Guardar</a>
</div>