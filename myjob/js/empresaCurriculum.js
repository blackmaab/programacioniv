function addEmpresaCurriculum(){
    if($.validarCampos("#frmEmpresaCurriculum")){
            
        $.post('modules/procedure/empresaCurriculum.procedure.php',
        {
            txtDescripcionEmpresaCurriculum:$('#txtDescripcionEmpresaCurriculum').attr('value'),
            txtType:"add"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('EmpresaCurriculum agregado exitosamente','i');				
                $.limpiarCampos("#frmEmpresaCurriculum");                
            }else{                    
                $.mensajeInformativo('Hubo un error al guardar el empresaCurriculum. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}

function searchEmpresaCurriculum(){
    if($.validarCampos("#frmSearchEmpresaCurriculum")){
        $.ajax({
            type: 'POST',
            url: 'modules/procedure/empresaCurriculum.procedure.php',
            dataType:'html',
            data: {
                txtDescripcionEmpresaCurriculum: $('#txtSearchEmpresaCurriculum').attr('value'), 
                txtType: "search"
            },
            success:function(response){
                $('#searchEmpresaCurriculum').html(response);
            }
        }
                        
        );

           
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}
function selEmpresaCurriculum(id,des){
    $("#txtIdEmpresaCurriculum").attr("value", id);
    $("#txtDescripcionEmpresaCurriculum").attr("value",des);
    $("#btnEmpresaCurriculum").attr("value","Guardar");
}

function updateEmpresaCurriculum(){
    if($.validarCampos("#frmEmpresaCurriculum")){
            
        $.post('modules/procedure/empresaCurriculum.procedure.php',
        {
            txtIdEmpresaCurriculum:$('#txtIdEmpresaCurriculum').attr('value'),
            txtDescripcionEmpresaCurriculum:$('#txtDescripcionEmpresaCurriculum').attr('value'),
            txtType:"update"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('EmpresaCurriculum actualizado exitosamente','i');				
                $.limpiarCampos("#frmEmpresaCurriculum");
                //restableciendo botones
                $("#btnEmpresaCurriculum").attr("value","Agregar");
                searchEmpresaCurriculum();                
            }else{                    
                $.mensajeInformativo('Hubo un error al modificar el empresaCurriculum. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
    
}


function deleteEmpresaCurriculum(id){
    var res=confirm("Desea eliminar el registro");   
    if(res==true){
        $.post('modules/procedure/empresaCurriculum.procedure.php',
        {
            txtIdEmpresaCurriculum:id,            
            txtType:"delete"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('EmpresaCurriculum eliminado exitosamente','i');				                
                $.limpiarCampos("#frmEmpresaCurriculum");
                //restableciendo botones
                $("#btnEmpresaCurriculum").attr("value","Agregar");
                searchEmpresaCurriculum();                 
            }else{                                    
                $.mensajeInformativo('Hubo un error al eliminar el empresaCurriculum. Intente de nuevo.','e');					
            }							
        }
        );
    }
}
