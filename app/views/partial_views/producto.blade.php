<div class="modal-header">
    {{--<button type="button" class="close" data-dismiss="modal">×</button>--}}
    <h3>
        Producto
    </h3>
</div>

<div id="add-campaign-modal-body" class="modal-body">
    <label class="control-label" for="prod_precio">
        Precio:
    </label>
    <input class="input-large" id="prod_precio" name="prod_precio" type="text" maxlength="50" value="">
    
    <label class="control-label" for="prod_unidad_medida">
        Unidad de Medida:
    </label>
    <input class="input-large" id="prod_unidad_medida" name="prod_unidad_medida" type="text" maxlength="50" value="">
    
    <label class="control-label" for="prod_tasa_iva">
        Tasa IVA:
    </label>
    <select id="prod_tasa_iva" name="prod_tasa_iva">
        <option value="16">16</option>
        <option value="4">4</option>
        <option value="0">0</option>
        <option value="Excento">Excento</option>
    </select>
    
    <label class="control-label" for="prod_descripcion">
        Descripción:
    </label>
    <input class="input-large" id="prod_descripcion" name="prod_descripcion" type="text" maxlength="50" value="">
    <input type="hidden" id="id-producto">
</div>

<div class="modal-footer">
    <a href="#" id="cerrar-producto" class="btn" data-dismiss="modal">Cerrar</a>
    <input type="submit" class="btn btn-primary" id="guardarProducto" value="Guardar"/>
</div>