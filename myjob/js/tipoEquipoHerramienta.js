function addTipoEquipoHerramienta(){    
    if($.validarCampos("#frmTipoEquipoHerramienta")){
            
        $.post('modules/procedure/tipoEquipoHerramienta.procedure.php',
        {
            txtDescripcionTipoEquipoHerramienta:$('#txtDescripcionTipoEquipoHerramienta').attr('value'),
            txtType:"add"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('TipoEquipoHerramienta agregado exitosamente','i');				
                $.limpiarCampos("#frmTipoEquipoHerramienta");  
                cargarComboTipoEquipoHerramienta("#selEH", "-");
            }else{                    
                $.mensajeInformativo('Hubo un error al guardar el TipoEquipoHerramienta. Intente de nuevo.','e');					                
                
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}

function searchTipoEquipoHerramienta(){    
    if($.validarCampos("#frmSearchTipoEquipoHerramienta")){
        $.ajax({
            type: 'POST',
            url: 'modules/procedure/tipoEquipoHerramienta.procedure.php',
            dataType:'html',
            data: {
                txtDescripcionTipoEquipoHerramienta: $('#txtSearchTipoEquipoHerramienta').attr('value'), 
                txtType: "search"
            },
            success:function(response){
                $('#searchTipoEquipoHerramienta').html(response);
            }
        }
                        
        );

           
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}
function selTipoEquipoHerramienta(id,des){
    $("#txtIdTipoEquipoHerramienta").attr("value", id);
    $("#txtDescripcionTipoEquipoHerramienta").attr("value",des);
    $("#btnTipoEquipoHerramienta").attr("value","Guardar");
}

function updateTipoEquipoHerramienta(){
    if($.validarCampos("#frmTipoEquipoHerramienta")){
            
        $.post('modules/procedure/tipoEquipoHerramienta.procedure.php',
        {
            txtIdTipoEquipoHerramienta:$('#txtIdTipoEquipoHerramienta').attr('value'),
            txtDescripcionTipoEquipoHerramienta:$('#txtDescripcionTipoEquipoHerramienta').attr('value'),
            txtType:"update"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('TipoEquipoHerramienta actualizado exitosamente','i');				
                $.limpiarCampos("#frmTipoEquipoHerramienta");
                //restableciendo botones
                $("#btnTipoEquipoHerramienta").attr("value","Agregar");
                searchTipoEquipoHerramienta();       
                cargarComboTipoEquipoHerramienta("#selEH", "-");
            }else{                    
                $.mensajeInformativo('Hubo un error al modificar el TipoEquipoHerramienta. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
    
}


function deleteTipoEquipoHerramienta(id){   
    var res=confirm("Desea eliminar el registro");   
    if(res==true){
        $.post('modules/procedure/tipoEquipoHerramienta.procedure.php',
        {
            txtIdTipoEquipoHerramienta:id,            
            txtType:"delete"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('TipoEquipoHerramienta eliminado exitosamente','i');				                
                $.limpiarCampos("#frmTipoEquipoHerramienta");
                //restableciendo botones
                $("#btnTipoEquipoHerramienta").attr("value","Agregar");
                searchTipoEquipoHerramienta(); 
                cargarComboTipoEquipoHerramienta("#selEH", "-");                
            }else{                                    
                $.mensajeInformativo('Hubo un error al eliminar el TipoEquipoHerramienta. Intente de nuevo.','e');					                
            }							
        }
        );
    }
}


function cargarComboTipoEquipoHerramienta(idCaja,fijar){
    $.post('modules/procedure/tipoEquipoHerramienta.procedure.php',
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


