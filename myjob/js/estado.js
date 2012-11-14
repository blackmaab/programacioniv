function addEstado(){   
    if($.validarCampos("#frmEstado")){
            
        $.post('modules/procedure/estado.procedure.php',
        {
            txtEstado:$('#txtEstado').attr('value'),
            txtType:"add",
            selPaisEstado:$("#selEstadoEstado").attr('value')
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Estado agregado exitosamente','i');				
                $.limpiarCampos("#frmEstado");                
            }else{                    
                $.mensajeInformativo('Hubo un error al guardar el estado. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}

function searchEstado(){
    if($.validarCampos("#frmSearchEstado")){
        $.ajax({
            type: 'POST',
            url: 'modules/procedure/estado.procedure.php',
            dataType:'html',
            data: {
                txtEstado: $('#txtSearchEstado').attr('value'), 
                txtType: "search"
            },
            success:function(response){
                $('#searchEstado').html(response);
            }
        }
                        
        );

           
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}
function selEstado(id,des,idPais){
    $("#txtIdEstado").attr("value", id);
    $("#txtEstado").attr("value",des);
    $("#selEstadoEstado").attr("value",idPais);
    $("#btnEstado").attr("value","Guardar");
}

function updateEstado(){
    if($.validarCampos("#frmEstado")){
            
        $.post('modules/procedure/estado.procedure.php',
        {
            txtIdEstado:$('#txtIdEstado').attr('value'),
            txtEstado:$('#txtEstado').attr('value'),
            selPaisEstado:$("#selEstadoEstado").attr('value'),
            txtType:"update"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Estado actualizado exitosamente','i');				
                $.limpiarCampos("#frmEstado");
                //restableciendo botones
                $("#btnEstado").attr("value","Agregar");
                searchEstado();                
            }else{                    
                $.mensajeInformativo('Hubo un error al modificar el estado. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
    
}


function deleteEstado(id){
    var res=confirm("Desea eliminar el registro");   
    if(res==true){
        $.post('modules/procedure/estado.procedure.php',
        {
            txtIdEstado:id,            
            txtType:"delete"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Estado eliminado exitosamente','i');				                
                $.limpiarCampos("#frmEstado");
                //restableciendo botones
                $("#btnEstado").attr("value","Agregar");
                searchEstado();                 
            }else{                                    
                $.mensajeInformativo('Hubo un error al eliminar el estado. Intente de nuevo.','e');					
            }							
        }
        );
    }
}
