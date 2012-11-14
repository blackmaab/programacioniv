function addEstadoCarrera(){
           
    if($.validarCampos("#frmEstadoCarrera")){
            
        $.post('modules/procedure/estadoCarrera.procedure.php',
        {
            txtDescripcionEstadoCarrera:$('#txtDescripcionEstadoCarrera').attr('value'),
            txtType:"add"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Estado Carrera agregado exitosamente','i');				
                $.limpiarCampos("#frmEstadoCarrera");                
            }else{                    
               // $.mensajeInformativo('Hubo un error al guardar el EstadoCarrera. Intente de nuevo.','e');					
               alert(data);
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}

function searchEstadoCarrera(){
    if($.validarCampos("#frmSearchEstadoCarrera")){
        $.ajax({
            type: 'POST',
            url: 'modules/procedure/estadoCarrera.procedure.php',
            dataType:'html',
            data: {
                txtDescripcionEstadoCarrera: $('#txtSearchEstadoCarrera').attr('value'), 
                txtType: "search"
            },
            success:function(response){
                $('#searchEstadoCarrera').html(response);
            }
        }
                        
        );

           
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}
function selEstadoCarrera(id,des){
    $("#txtIdEstadoCarrera").attr("value", id);
    $("#txtDescripcionEstadoCarrera").attr("value",des);
    $("#btnEstadoCarrera").attr("value","Guardar");
}

function updateEstadoCarrera(){
    if($.validarCampos("#frmEstadoCarrera")){
            
        $.post('modules/procedure/estadoCarrera.procedure.php',
        {
            txtIdEstadoCarrera:$('#txtIdEstadoCarrera').attr('value'),
            txtDescripcionEstadoCarrera:$('#txtDescripcionEstadoCarrera').attr('value'),
            txtType:"update"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Estado Carrera actualizado exitosamente','i');				
                $.limpiarCampos("#frmEstadoCarrera");
                //restableciendo botones
                $("#btnEstadoCarrera").attr("value","Agregar");
                searchEstadoCarrera();                
            }else{                    
                $.mensajeInformativo('Hubo un error al modificar el Estado Carrera. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
    
}


function deleteEstadoCarrera(id){
    var res=confirm("Desea eliminar el registro");   
    if(res==true){
        $.post('modules/procedure/estadoCarrera.procedure.php',
        {
            txtIdEstadoCarrera:id,            
            txtType:"delete"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Estado Carrera eliminado exitosamente','i');				                
                $.limpiarCampos("#frmEstadoCarrera");
                //restableciendo botones
                $("#btnEstadoCarrera").attr("value","Agregar");
                searchEstadoCarrera();                 
            }else{                                    
                $.mensajeInformativo('Hubo un error al eliminar el Estado Carrera. Intente de nuevo.','e');					
            }							
        }
        );
    }
}
