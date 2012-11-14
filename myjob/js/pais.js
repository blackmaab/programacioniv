
function addPais(){
    if($.validarCampos("#frmPais")){
            
        $.post('modules/procedure/pais.procedure.php',
        {
            txtPais:$('#txtPais').attr('value'),
            txtType:"add"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Pais agregado exitosamente','i');				
                $.limpiarCampos("#frmPais");                
            }else{                    
                $.mensajeInformativo('Hubo un error al guardar el pais. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}

function searchPais(){
    if($.validarCampos("#frmSearchPais")){
        $.ajax({
            type: 'POST',
            url: 'modules/procedure/pais.procedure.php',
            dataType:'html',
            data: {
                txtPais: $('#txtSearchPais').attr('value'), 
                txtType: "search"
            },
            success:function(response){
                $('#searchPais').html(response);
            }
        }
                        
        );

           
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}
function selPais(id,des){
    $("#txtIdPais").attr("value", id);
    $("#txtPais").attr("value",des);
    $("#btnPais").attr("value","Guardar");
}

function updatePais(){
    if($.validarCampos("#frmPais")){
            
        $.post('modules/procedure/pais.procedure.php',
        {
            txtIdPais:$('#txtIdPais').attr('value'),
            txtPais:$('#txtPais').attr('value'),
            txtType:"update"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Pais actualizado exitosamente','i');				
                $.limpiarCampos("#frmPais");
                //restableciendo botones
                $("#btnPais").attr("value","Agregar");
                searchPais();                
            }else{                    
                $.mensajeInformativo('Hubo un error al modificar el pais. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
    
}


function deletePais(id){
    var res=confirm("Desea eliminar el registro");   
    if(res==true){
        $.post('modules/procedure/pais.procedure.php',
        {
            txtIdPais:id,            
            txtType:"delete"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Pais eliminado exitosamente','i');				                
                $.limpiarCampos("#frmPais");
                //restableciendo botones
                $("#btnPais").attr("value","Agregar");
                searchPais();                 
            }else{                                    
                $.mensajeInformativo('Hubo un error al eliminar el pais. Intente de nuevo.','e');					
            }							
        }
        );
    }
}


function recargar(){
    window.setInterval(function () {
        location.reload();
    }, 5000);


}

