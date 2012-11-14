
function addParentesco(){
    if($.validarCampos("#frmParentesco")){
            
        $.post('modules/procedure/parentesco.procedure.php',
        {
            txtParentesco:$('#txtParentesco').attr('value'),
            txtType:"add"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Parentesco agregado exitosamente','i');				
                $.limpiarCampos("#frmParentesco");                
            }else{                    
                $.mensajeInformativo('Hubo un error al guardar el Parentesco. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}

function searchParentesco(){
    if($.validarCampos("#frmSearchParentesco")){
        $.ajax({
            type: 'POST',
            url: 'modules/procedure/parentesco.procedure.php',
            dataType:'html',
            data: {
                txtParentesco: $('#txtSearchParentesco').attr('value'), 
                txtType: "search"
            },
            success:function(response){
                $('#searchParentesco').html(response);
            }
        }
                        
        );

           
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}
function selParentesco(id,des){
    $("#txtIdParentesco").attr("value", id);
    $("#txtParentesco").attr("value",des);
    $("#btnParentesco").attr("value","Guardar");
}

function updateParentesco(){
    if($.validarCampos("#frmParentesco")){
            
        $.post('modules/procedure/parentesco.procedure.php',
        {
            txtIdParentesco:$('#txtIdParentesco').attr('value'),
            txtParentesco:$('#txtParentesco').attr('value'),
            txtType:"update"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Parentesco actualizado exitosamente','i');				
                $.limpiarCampos("#frmParentesco");
                //restableciendo botones
                $("#btnParentesco").attr("value","Agregar");
                searchParentesco();                
            }else{                    
                $.mensajeInformativo('Hubo un error al modificar el Parentesco. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
    
}


function deleteParentesco(id){
    var res=confirm("Desea eliminar el registro");   
    if(res==true){
        $.post('modules/procedure/parentesco.procedure.php',
        {
            txtIdParentesco:id,            
            txtType:"delete"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Parentesco eliminado exitosamente','i');				                
                $.limpiarCampos("#frmParentesco");
                //restableciendo botones
                $("#btnParentesco").attr("value","Agregar");
                searchParentesco();                 
            }else{                                    
                $.mensajeInformativo('Hubo un error al eliminar el Parentesco. Intente de nuevo.','e');					
            }							
        }
        );
    }
}

