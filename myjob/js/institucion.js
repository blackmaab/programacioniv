
function addInstitucion(){
    if($.validarCampos("#frmInstitucion")){
            
        $.post('modules/procedure/institucion.procedure.php',
        {
            txtInstitucion:$('#txtDescripcionInst').attr('value'),
            txtType:"add",
            selPaisInstitucion:$('#selPaisInstitucion').attr("value"),
            selEstadoInstitucion:$('#selEstadoInstitucion').attr("value"),
            selNivelEstudioInstitucion:$('#selNivelEstudioInstitucion').attr("value")
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Institucion agregado exitosamente','i');				
                $.limpiarCampos("#frmInstitucion");                                
                cargarComboInstitucion("#selInstitucion", "-");
            }else{                    
                $.mensajeInformativo('Hubo un error al guardar el institucion. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}

function searchInstitucion(){
    if($.validarCampos("#frmSearchInstitucion")){
        $.ajax({
            type: 'POST',
            url: 'modules/procedure/institucion.procedure.php',
            dataType:'html',
            data: {
                txtInstitucion: $('#txtSearchInstitucion').attr('value'), 
                txtType: "search"
            },
            success:function(response){
                $('#searchInstitucion').html(response);
            }
        }
                        
        );

           
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}
function selInstitucion(id,des,idPais,idEstado,idNivel){
    $("#txtIdInstitucion").attr("value", id);
    $("#txtDescripcionInst").attr("value",des);
    $("#selPaisInstitucion").attr("value",idPais);
    //cargando el estado departamento antes de seleccionarlo
    cargarComboEstado("#selPaisInstitucion","#selEstadoInstitucion",idEstado);      
    //$("#selEstadoInstitucion").attr("value",idEstado);
    $("#selNivelEstudioInstitucion").attr("value",idNivel);
    $("#btnInstitucion").attr("value","Guardar");
    
}

function updateInstitucion(){
    if($.validarCampos("#frmInstitucion")){
            
        $.post('modules/procedure/institucion.procedure.php',
        {
            txtIdInstitucion:$('#txtIdInstitucion').attr('value'),
            txtInstitucion:$('#txtDescripcionInst').attr('value'),
            txtType:"update",
            selPaisInstitucion:$('#selPaisInstitucion').attr("value"),
            selEstadoInstitucion:$('#selEstadoInstitucion').attr("value"),
            selNivelEstudioInstitucion:$('#selNivelEstudioInstitucion').attr("value")
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Institucion actualizado exitosamente','i');				
                $.limpiarCampos("#frmInstitucion");
                //restableciendo botones
                $("#btnInstitucion").attr("value","Agregar");
                searchInstitucion();      
                cargarComboInstitucion("#selInstitucion", "-");
            }else{                    
                $.mensajeInformativo('Hubo un error al modificar el institucion. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
    
}


function deleteInstitucion(id){
    var res=confirm("Desea eliminar el registro");   
    if(res==true){
        $.post('modules/procedure/institucion.procedure.php',
        {
            txtIdInstitucion:id,            
            txtType:"delete"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Institucion eliminado exitosamente','i');				                
                $.limpiarCampos("#frmInstitucion");
                //restableciendo botones
                $("#btnInstitucion").attr("value","Agregar");
                searchInstitucion();    
                cargarComboInstitucion("#selInstitucion", "-");
            }else{                                    
                $.mensajeInformativo('Hubo un error al eliminar el institucion. Intente de nuevo.','e');					
            }							
        }
        );
    }
}


function cargarComboInstitucion(idCajaCargar,fijar){
    $.post('modules/procedure/institucion.procedure.php',
    {
        //selPaisEstado:$(idCajaValor).attr("value"),
        txtType:"cargar",
        txtFijar:fijar
    },
    function(data){            
        $(idCajaCargar).html(data);
    }
    );
}