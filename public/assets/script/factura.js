jQuery(document).ready(function () {    
    $("#guardarUsuario").click(function(){
        callbacksUsuario.updateUsuario();
    });
    
    $("#guardarCliente").click(function(){
        if($('#id-cliente').val() != "" && $('#id-impuesto-conf').val() != "")
            callbacksCliente.modificarCliente(callbacksCliente.datosModalCliente($('#id-cliente').val(),$('#id-impuesto-conf').val()));
        else
            callbacksCliente.crearCliente(callbacksProducto.datosModalProducto("",""));
    });
    
    $('#guardarProducto').click(function(){
        if($('#id-producto').val() != "")
            callbacksProducto.modificarProducto(callbacksProducto.datosModalProducto($('#id-producto').val()));
        else
            callbacksProducto.agregarProducto(callbacksProducto.datosModalProducto(""));
    });
    
    $('#cerrar-producto').click(function(){
        $('#id-producto').val("");
    });
    
    $('#cerrar-cliente').click(function(){
        $('#id-cliente').val("");
        $('#id-impuesto-conf').val("");
    });
    
    $('#listarProductos').on("click", ".editProducto", function () {
        $('#lista-productos').trigger("click");
        $('#modal-producto').trigger("click");
        $('#id-producto').val($(this).data("id"));
    });
    
    $('#listarProductos').on("click", ".deleteProducto", function () {
        callbacksProducto.eliminarProducto($(this).data("id"));
    });
    
    $('#listarClientes').on("click", ".editCliente", function () {
        $('#lista-clientes').trigger("click");
        $('#modal-cliente').trigger("click");
        $('#id-cliente').val($(this).data("id"));
        $('#id-impuesto-conf').val($(this).data('impuesto-conf-id'));
    });
    
    $('#listarClientes').on("click", ".deleteCliente", function () {
        alert($(this).data("id"));
    });
    
    callbacksUsuario.tiposFactura();
    
    callbacksUsuario.obtenerUsuario();

    callbacksCliente.listarClientes();

    callbacksCliente.metodosPago();

    callbacksCliente.tiposImpuesto();
    
    callbacksProducto.listarProductos();
});

var callbacksUsuario = {
    tiposFactura: function(){
    $.ajax({
        url: '/tipoFacturas',
        type: 'POST',
        data: null,
        contentType: 'application/x-www-form-urlencoded',
    }).done(function(data) {
        if(data.tiposFactura.length > 0)
            {
                var options = "<option value='0'>Selecciona tipo factura...</option>";
               for(var i=0; i<data.tiposFactura.length; i++){
                   options += "<option value='" + data.tiposFactura[i].id + "'>" + data.tiposFactura[i].tipo + "</option>";
               }
                
                $('#tipo_factura').append(options);
            }
    }).fail(function() {
        alert("Error");
    });
},
    obtenerUsuario: function(){
        $.ajax({
        url: '/getUsuario',
        type: 'POST',
        data: null,
        contentType: 'application/x-www-form-urlencoded',
    }).done(function(data) {
        if(data.usuario.length > 0)
            {
                $('#idusuario').val(data.usuario[0].id);
                $('#rfc').val(data.usuario[0].rfc);
                $('#nombre_razon_social').val(data.usuario[0].nombre);
                $('#tipo_factura').val(data.usuario[0].tipo_factura_id);
                $('#calle').val(data.usuario[0].calle);
                $('#num_ext').val(data.usuario[0].num_ext);
                $('#num_int').val(data.usuario[0].num_int);
                $('#colonia').val(data.usuario[0].colonia);
                $('#cp').val(data.usuario[0].cp);
                $('#ciudad').val(data.usuario[0].ciudad);
                $('#municipio').val(data.usuario[0].municipio);
                $('#estado').val(data.usuario[0].estado);
                $('#pais').val(data.usuario[0].pais);
                $('#regimen_fis').val(data.usuario[0].regimen_fiscal);
                $('#expedicion').val(data.usuario[0].lugar_expedicion);
                $('#telefono').val(data.usuario[0].telefono);
                $('#suc_nombre').val(data.sucursal[0].nombre);
                $('#suc_calle').val(data.sucursal[0].calle);
                $('#suc_num_ext').val(data.sucursal[0].num_ext);
                $('#suc_num_int').val(data.sucursal[0].num_int);
                $('#suc_col').val(data.sucursal[0].colonia);
                $('#suc_cp').val(data.sucursal[0].cp);
                $('#suc_ciudad').val(data.sucursal[0].ciudad);
                $('#suc_mun').val(data.sucursal[0].municipio);
                $('#suc_estado').val(data.sucursal[0].estado);
            }
    }).fail(function() {
        alert("Error");
    });
    },

    updateUsuario: function(){
        var obj = new Object();
        obj.id                  = $('#idusuario').val();
        obj.rfc                 = $('#rfc').val();
        obj.nombre_usuario      = $('#nombre_razon_social').val();
        obj.calle               = $('#calle').val();
        obj.num_ext             = $('#num_ext').val();
        obj.num_int             = $('#num_int').val();
        obj.colonia             = $('#colonia').val();
        obj.cp                  = $('#cp').val();
        obj.ciudad              = $('#ciudad').val();
        obj.municipio           = $('#municipio').val();
        obj.estado              = $('#estado').val();
        obj.pais                = $('#pais').val();
        obj.regimen_fiscal      = $('#regimen_fis').val();
        obj.lugar_expedicion    = $('#expedicion').val();
        obj.telefono            = $('#telefono').val();
        obj.tipo_factura_id     = $('#tipo_factura').val();
        //sucursal------------------------------------------------------------------------------
        obj.nombre_sucursal     = $('#suc_nombre').val();
        obj.calle               = $('#suc_calle').val();
        obj.suc_num_ext         = $('#suc_num_ext').val();
        obj.num_int             = $('#suc_num_int').val();
        obj.colonia             = $('#suc_col').val();
        obj.cp                  = $('#suc_cp').val();
        obj.ciudad              = $('#suc_ciudad').val();
        obj.municipio           = $('#suc_mun').val();
        obj.estado              = $('#suc_estado').val();

        $.ajax({
        url: '/updateUsuario',
        type: 'POST',
        data: obj,
        contentType: 'application/x-www-form-urlencoded',
    }).done(function(data) {
        if(data.usuario.length > 0)
            {
                $('#idusuario').val(data.usuario[0].id);
                $('#rfc').val(data.usuario[0].rfc);
                $('#nombre_razon_social').val(data.usuario[0].nombre);
                $('#tipo_factura').val(data.usuario[0].tipo_factura_id);
                $('#calle').val(data.usuario[0].calle);
                $('#num_ext').val(data.usuario[0].num_ext);
                $('#num_int').val(data.usuario[0].num_int);
                $('#colonia').val(data.usuario[0].colonia);
                $('#cp').val(data.usuario[0].cp);
                $('#ciudad').val(data.usuario[0].ciudad);
                $('#municipio').val(data.usuario[0].municipio);
                $('#estado').val(data.usuario[0].estado);
                $('#pais').val(data.usuario[0].pais);
                $('#regimen_fis').val(data.usuario[0].regimen_fiscal);
                $('#expedicion').val(data.usuario[0].lugar_expedicion);
                $('#telefono').val(data.usuario[0].telefono);
                $('#suc_nombre').val(data.sucursal[0].nombre);
                $('#suc_calle').val(data.sucursal[0].calle);
                $('#suc_num_ext').val(data.sucursal[0].num_ext);
                $('#suc_num_int').val(data.sucursal[0].num_int);
                $('#suc_col').val(data.sucursal[0].colonia);
                $('#suc_cp').val(data.sucursal[0].cp);
                $('#suc_ciudad').val(data.sucursal[0].ciudad);
                $('#suc_mun').val(data.sucursal[0].municipio);
                $('#suc_estado').val(data.sucursal[0].estado);
            }
    }).fail(function() {
        alert("Error");
    });
    }
};

var callbacksCliente = {
    datosModalCliente: function(id, id_impuesto_conf){
        var objCliente = new Object();
        //configuracion impuestos
        objCliente.apl_retencion_iva    = ($('#clien_ret_iva').is(':checked') ? 1 : 0);
        objCliente.apl_retencion_isr    = ($('#clien_ret_isr').is(':checked') ? 1 : 0);
        objCliente.porc_isr             = $('#clien_por_isr').val();
        objCliente.apl_impuesto         = ($('#clien_apl_impuesto').is(':checked') ? 1 : 0);
        objCliente.porc_impuesto        = $('#clien_porcentaje').val();
        objCliente.tipos_impuesto_id    = $('#clien_impuesto').val();
        //cliente
        objCliente.numero               = $('#clien_num').val();
        objCliente.rfc                  = $('#clien_rfc').val();
        objCliente.nombre               = $('#clien_nombre').val();
        objCliente.calle                = $('#clien_calle').val();
        objCliente.num_ext              = $('#clien_exterior').val();
        objCliente.num_int              = $('#clien_interior').val();
        objCliente.colonia              = $('#clien_col').val();
        objCliente.cp                   = $('#clien_cp').val();
        objCliente.ciudad               = $('#clien_ciudad').val();
        objCliente.municipio            = $('#clien_mun').val();
        objCliente.estado               = $('#clien_edo').val();
        objCliente.pais                 = $('#clien_pais').val();
        objCliente.email                = $('#clien_email').val();
        objCliente.telefono             = $('#clien_tel').val();
        objCliente.metodo_pago_id       = $('#clien_met_pago').val();
        objCliente.ult_cuatro_dig       = $('#clien_ult_dig').val();
        objCliente.usuarios_id          = $('#idusuario').val();
        
        if(id != "" && id_impuesto_conf != ""){
            objCliente.id = id;
            objCliente.impuesto_conf_id = id_impuesto_conf;
        }
        return objCliente;
    },
    crearCliente: function(objCliente){
        
        $.ajax({
            url: '/createCliente',
            type: 'POST',
            data: objCliente,
            contentType: 'application/x-www-form-urlencoded',
        }).done(function(data) {
            callbacksCliente.listarClientes();
            limpiarInputs('#clien_num,#clien_rfc,#clien_nombre,#clien_calle,#clien_exterior,#clien_interior,#clien_col,#clien_cp,#clien_ciudad,#clien_mun,#clien_edo,#clien_pais,#clien_email,#clien_tel,#clien_ult_dig,#clien_por_isr,#clien_porcentaje');
    }).fail(function() {
        alert("Error");
        });
    },
    modificarCliente: function(objCliente){
        
        $.ajax({
            url: '/updateCliente',
            type: 'POST',
            data: objCliente,
            contentType: 'application/x-www-form-urlencoded',
        }).done(function(data) {
            callbacksCliente.listarClientes();
            limpiarInputs('#clien_num,#clien_rfc,#clien_nombre,#clien_calle,#clien_exterior,#clien_interior,#clien_col,#clien_cp,#clien_ciudad,#clien_mun,#clien_edo,#clien_pais,#clien_email,#clien_tel,#clien_ult_dig,#clien_por_isr,#clien_porcentaje');
    }).fail(function() {
        alert("Error");
        });
    },
    listarClientes: function(){
        $.ajax({
                url: '/getClientes',
                type: 'POST',
                data: null,
                contentType: 'application/x-www-form-urlencoded',
            }).done(function(data) {
                if(data.clientes.length > 0){
                    var lista = "";
                    for (var i = 0; i < data.clientes.length; i++) {
                        lista += "<tr>";
                        lista += "  <td>" + data.clientes[i].rfc + "</td>";
                        lista += "  <td>" + data.clientes[i].nombre + "</td>";
                        lista += "  <td>" + data.clientes[i].calle + "</td>";
                        lista += "  <td>" + data.clientes[i].num_ext + "</td>";
                        lista += "  <td>" + data.clientes[i].colonia + "</td>";
                        lista += "  <td><a class='btn btn-mini btn-info ttip_t editCliente' data-id='" + data.clientes[i].id + "' data-impuesto-conf-id='" + data.clientes[i].impuesto_conf_id + "'><i class='icon-eye-open icon-white'></i></a><a class='btn btn-mini btn-danger ttip_t deleteCliente' data-toggle='modal' data-backdrop='static' aria-describedby='ui-tooltip-3' data-id='" + data.clientes[i].id + "' title='Eliminar " + data.clientes[i].id + "'><i class='icon-trash icon-white'></i></a></td>";
                        lista += "</tr>";
                    };
                    
                    $('#listarClientes').empty();
                    $('#listarClientes').append(lista);
                }
            }).fail(function() {
               alert("Error");
            });
    },
    metodosPago: function(){
        $.ajax({
                url: '/metodosPago',
                type: 'POST',
                data: null,
                contentType: 'application/x-www-form-urlencoded',
            }).done(function(data) {
                if(data.metodosPago.length > 0){
                    var lista = "<option value='0'>Selecciona Método Pago...</option>";
                    for (var i = 0; i < data.metodosPago.length; i++) {
                        lista += "<option value='" + data.metodosPago[i].id + "'>" + data.metodosPago[i].metodo_pago + "</option>";
                    };

                    $('#clien_met_pago').append(lista);
                }
            }).fail(function() {
               alert("Error");
            });
    },
    tiposImpuesto: function(){
        $.ajax({
                url: '/tiposImpuesto',
                type: 'POST',
                data: null,
                contentType: 'application/x-www-form-urlencoded',
            }).done(function(data) {
                if(data.tiposImpuesto.length > 0){
                    var lista = "";
                    for (var i = 0; i < data.tiposImpuesto.length; i++) {
                        lista += "<option value='" + data.tiposImpuesto[i].id + "'>" + data.tiposImpuesto[i].tipo_impuesto + "</option>";
                    };

                    $('#clien_impuesto').append(lista);
                }
            }).fail(function() {
               alert("Error");
            });
    }
};

var callbacksProducto = {
    listarProductos: function(){
        $.ajax({
            url: '/getProductos',
            type: 'POST',
            data: null,
            contentType: 'application/x-www-form-urlencoded',
        }).done(function(data) {
            if(data.productos.length > 0){
                    var lista = "";
                    for (var i = 0; i < data.productos.length; i++) {
                        lista += "<tr>";
                        lista += "  <td>" + data.productos[i].descripcion + "</td>";
                        lista += "  <td>" + data.productos[i].precio + "</td>";
                        lista += "  <td>" + data.productos[i].unidad_medida + "</td>";
                        lista += "  <td>" + data.productos[i].tasa_iva + "</td>";
                        lista += "  <td>" + data.productos[i].descripcion + "</td>";
                        lista += "  <td><a class='btn btn-mini btn-info ttip_t editProducto' data-id='"+data.productos[i].id+"'><i class='icon-eye-open icon-white'></i></a><a class='btn btn-mini btn-danger ttip_t deleteProducto' data-toggle='modal' data-backdrop='static' aria-describedby='ui-tooltip-3' data-id='" + data.productos[i].id + "' title='Eliminar " + data.productos[i].id + "'><i class='icon-trash icon-white'></i></a></td>";
                        lista += "</tr>";
                    };
                
                $('#listarProductos').empty();
                $('#listarProductos').append(lista);
            }
        }).fail(function() {
            alert("Error");
        });
    },
    datosModalProducto: function(id){
        var objProducto             = new Object();
        objProducto.precio          = $('#prod_precio').val();
        objProducto.unidad_medida   = $('#prod_unidad_medida').val();
        objProducto.tasa_iva        = $('#prod_tasa_iva').val();
        objProducto.descripcion     = $('#prod_descripcion').val();
        objProducto.usuario_id      = $('#idusuario').val();
        
        if(id != ""){
            objProducto.id = $('#id-producto').val();
        }
        
        return objProducto;
    },
    agregarProducto: function(objProducto){
        //var objProducto = callbacksProducto.datosModalProducto();
        
        $.ajax({
                url: '/createProducto',
                type: 'POST',
                data: objProducto,
                contentType: 'application/x-www-form-urlencoded',
            }).done(function(data) {
            callbacksProducto.listarProductos();
            limpiarInputs('#prod_precio,#prod_unidad_medida,#prod_descripcion');
            limpiarSelect('#prod_tasa_iva');
            }).fail(function() {
               alert("Error");
            });
    },
    eliminarProducto: function(id){
        if(id != null){
            var objProducto = new Object({id:id});
            $.ajax({
                url: '/deleteProducto',
                type: 'POST',
                data: objProducto,
                contentType: 'application/x-www-form-urlencoded',
            }).done(function(data) {
            callbacksProducto.listarProductos();
            }).fail(function() {
               alert("Error");
            });
        }
    },
    modificarProducto: function(objProducto){
        //var objProducto = callbacksProducto.datosModalProducto();
        
        $.ajax({
                url: '/updateProducto',
                type: 'POST',
                data: objProducto,
                contentType: 'application/x-www-form-urlencoded',
            }).done(function(data) {
            callbacksProducto.listarProductos();
            limpiarInputs('#prod_precio,#prod_unidad_medida,#prod_descripcion');
            limpiarSelect('#prod_tasa_iva');
            }).fail(function() {
               alert("Error");
            });
    }
};

var limpiarInputs = function(inputs){
    var input = inputs.split(',');
    
    for(var i = 0; i<input.length;i++){
        $(input[i]).val('');
    }
}

var limpiarSelect = function(selects){
    var select = selects.split(',');
    
    for(var i = 0; i<select.length;i++){
        $(select[i] + ' option').eq(0).prop('selected', 'selected')
    }
}