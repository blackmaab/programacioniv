

function addNivelEstudio(){
    if($.validarCampos("#frmNivelEstudio")){
            
        $.post('modules/procedure/nivelEstudio.procedure.php',
        {
            txtNivelEstudio:$('#txtNivelEstudio').attr('value'),
            txtType:"add"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Nivel Estudio agregado exitosamente','i');				
                $.limpiarCampos("#frmNivelEstudio");                
            }else{                    
                $.mensajeInformativo('Hubo un error al guardar el NivelEstudio. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}

function searchNivelEstudio(){
    if($.validarCampos("#frmSearchNivelEstudio")){
        $.ajax({
            type: 'POST',
            url: 'modules/procedure/nivelEstudio.procedure.php',
            dataType:'html',
            data: {
                txtNivelEstudio: $('#txtSearchNivelEstudio').attr('value'), 
                txtType: "search"
            },
            success:function(response){
                $('#searchNivelEstudio').html(response);
            }
        }
                        
        );

           
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}
function selNivelEstudio(id,des){
    $("#txtIdNivelEstudio").attr("value", id);
    $("#txtNivelEstudio").attr("value",des);
    $("#btnNivelEstudio").attr("value","Guardar");
}

function updateNivelEstudio(){
    if($.validarCampos("#frmNivelEstudio")){
            
        $.post('modules/procedure/nivelEstudio.procedure.php',
        {
            txtIdNivelEstudio:$('#txtIdNivelEstudio').attr('value'),
            txtNivelEstudio:$('#txtNivelEstudio').attr('value'),
            txtType:"update"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('NivelEstudio actualizado exitosamente','i');				
                $.limpiarCampos("#frmNivelEstudio");
                //restableciendo botones
                $("#btnNivelEstudio").attr("value","Agregar");
                searchNivelEstudio();                
            }else{                    
                $.mensajeInformativo('Hubo un error al modificar el NivelEstudio. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
    
}


function deleteNivelEstudio(id){
    var res=confirm("Desea eliminar el registro");   
    if(res==true){
        $.post('modules/procedure/nivelEstudio.procedure.php',
        {
            txtIdNivelEstudio:id,            
            txtType:"delete"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('NivelEstudio eliminado exitosamente','i');				                
                $.limpiarCampos("#frmNivelEstudio");
                //restableciendo botones
                $("#btnNivelEstudio").attr("value","Agregar");
                searchNivelEstudio();                 
            }else{                                    
                $.mensajeInformativo('Hubo un error al eliminar el NivelEstudio. Intente de nuevo.','e');					
            }							
        }
        );
    }
}

