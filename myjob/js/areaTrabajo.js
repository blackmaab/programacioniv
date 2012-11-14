function addAreaTrabajo(){
    if($.validarCampos("#frmAreaTrabajo")){
            
        $.post('modules/procedure/areaTrabajo.procedure.php',
        {
            txtDescripcionArea:$('#txtDescripcionArea').attr('value'),
            txtType:"add"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('AreaTrabajo agregado exitosamente','i');				
                $.limpiarCampos("#frmAreaTrabajo");  
                cargarComboAreaTrabajo("#selArea", "-");
            }else{                    
                $.mensajeInformativo('Hubo un error al guardar el areaTrabajo. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}

function searchAreaTrabajo(){
    if($.validarCampos("#frmSearchAreaTrabajo")){
        $.ajax({
            type: 'POST',
            url: 'modules/procedure/areaTrabajo.procedure.php',
            dataType:'html',
            data: {
                txtDescripcionArea: $('#txtSearchAreaTrabajo').attr('value'), 
                txtType: "search"
            },
            success:function(response){
                $('#searchAreaTrabajo').html(response);
            }
        }
                        
        );

           
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}
function selAreaTrabajo(id,des){
    $("#txtIdAreaTrabajo").attr("value", id);
    $("#txtDescripcionArea").attr("value",des);
    $("#btnArea").attr("value","Guardar");
}

function updateAreaTrabajo(){
    if($.validarCampos("#frmAreaTrabajo")){
            
        $.post('modules/procedure/areaTrabajo.procedure.php',
        {
            txtIdAreaTrabajo:$('#txtIdAreaTrabajo').attr('value'),
            txtDescripcionArea:$('#txtDescripcionArea').attr('value'),
            txtType:"update"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('AreaTrabajo actualizado exitosamente','i');				
                $.limpiarCampos("#frmAreaTrabajo");
                //restableciendo botones
                $("#btnAreaTrabajo").attr("value","Agregar");
                searchAreaTrabajo();     
                cargarComboAreaTrabajo("#selArea", "-");
            }else{                    
                $.mensajeInformativo('Hubo un error al modificar el areaTrabajo. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
    
}


function deleteAreaTrabajo(id){
    var res=confirm("Desea eliminar el registro");   
    if(res==true){
        $.post('modules/procedure/areaTrabajo.procedure.php',
        {
            txtIdAreaTrabajo:id,            
            txtType:"delete"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('AreaTrabajo eliminado exitosamente','i');				                
                $.limpiarCampos("#frmAreaTrabajo");
                //restableciendo botones
                $("#btnAreaTrabajo").attr("value","Agregar");
                searchAreaTrabajo();  
                cargarComboAreaTrabajo("#selArea", "-");
            }else{                                    
                $.mensajeInformativo('Hubo un error al eliminar el areaTrabajo. Intente de nuevo.','e');					
            }							
        }
        );
    }
}

function cargarComboAreaTrabajo(idCaja,fijar){
    $.post('modules/procedure/areaTrabajo.procedure.php',
    {
        //txtIdPais:id,            
        txtType:"cargar",
        txtFijar:fijar
    },
    function(data){            
        $(idCaja).html(data);
    }
    );
}

