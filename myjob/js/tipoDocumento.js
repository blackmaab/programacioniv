
function addTipoDocumento(){
    if($.validarCampos("#frmTipoDocumento")){
            
        $.post('modules/procedure/tipoDocumento.procedure.php',
        {
            txtTipoDocumento:$('#txtTipoDocumento').attr('value'),
            txtType:"add"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Tipo Documento agregado exitosamente','i');				
                $.limpiarCampos("#frmTipoDocumento");                
            }else{                    
                $.mensajeInformativo('Hubo un error al guardar el Tipo Documento. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}

function searchTipoDocumento(){
    if($.validarCampos("#frmSearchTipoDocumento")){
        $.ajax({
            type: 'POST',
            url: 'modules/procedure/tipoDocumento.procedure.php',
            dataType:'html',
            data: {
                txtTipoDocumento: $('#txtSearchTipoDocumento').attr('value'), 
                txtType: "search"
            },
            success:function(response){
                $('#searchTipoDocumento').html(response);
            }
        }
                        
        );

           
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}
function selTipoDocumento(id,des){
    $("#txtIdTipoDocumento").attr("value", id);
    $("#txtTipoDocumento").attr("value",des);
    $("#btnTipoDocumento").attr("value","Guardar");
}

function updateTipoDocumento(){
    if($.validarCampos("#frmTipoDocumento")){
            
        $.post('modules/procedure/TipoDocumento.procedure.php',
        {
            txtIdTipoDocumento:$('#txtIdTipoDocumento').attr('value'),
            txtTipoDocumento:$('#txtTipoDocumento').attr('value'),
            txtType:"update"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Tipo Documento actualizado exitosamente','i');				
                $.limpiarCampos("#frmTipoDocumento");
                //restableciendo botones
                $("#btnTipoDocumento").attr("value","Agregar");
                searchTipoDocumento();                
            }else{                    
                $.mensajeInformativo('Hubo un error al modificar el Tipo Documento. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
    
}


function deleteTipoDocumento(id){
    var res=confirm("Desea eliminar el registro");   
    if(res==true){
        $.post('modules/procedure/tipoDocumento.procedure.php',
        {
            txtIdTipoDocumento:id,            
            txtType:"delete"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Tipo Documento eliminado exitosamente','i');				                
                $.limpiarCampos("#frmTipoDocumento");
                //restableciendo botones
                $("#btnTipoDocumento").attr("value","Agregar");
                searchTipoDocumento();                 
            }else{                                    
                $.mensajeInformativo('Hubo un error al eliminar el Tipo Documento. Intente de nuevo.','e');					
            }							
        }
        );
    }
}


