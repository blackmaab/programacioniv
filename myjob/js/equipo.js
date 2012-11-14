function addEquipo(){
    if($.validarCampos("#frmEquipo")){
            
        $.post('modules/procedure/equipo.procedure.php',
        {
            txtEquipo:$('#txtDescripcionEH').attr('value'),
            txtType:"add",
            selEH:$('#selEH').attr('value')
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Equipo agregado exitosamente','i');				
                $.limpiarCampos("#frmEquipo");                                
            }else{                    
                $.mensajeInformativo('Hubo un error al guardar el equipo. Intente de nuevo.','e');					                
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}

function searchEquipo(){
    if($.validarCampos("#frmSearchEquipo")){
        $.ajax({
            type: 'POST',
            url: 'modules/procedure/equipo.procedure.php',
            dataType:'html',
            data: {
                txtEquipo: $('#txtSearchEquipo').attr('value'), 
                txtType: "search"
            },
            success:function(response){
                $('#searchEquipo').html(response);
            }
        }
                        
        );

           
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}
function selEquipo(id,des,idTipo){
    $("#txtIdEquipo").attr("value", id);
    $("#txtDescripcionEH").attr("value",des);
    $("#btnEH").attr("value","Guardar");
    cargarComboTipoEquipoHerramienta("#selEH", idTipo);
}

function updateEquipo(){
    if($.validarCampos("#frmEquipo")){
            
        $.post('modules/procedure/equipo.procedure.php',
        {
            txtIdEquipo:$('#txtIdEquipo').attr('value'),
            txtEquipo:$('#txtDescripcionEH').attr('value'),
            txtType:"update",
            selEH:$('#selEH').attr('value')
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Equipo actualizado exitosamente','i');				
                $.limpiarCampos("#frmEquipo");
                //restableciendo botones
                $("#btnEquipo").attr("value","Agregar");
                searchEquipo();                   
            }else{                    
                $.mensajeInformativo('Hubo un error al modificar el equipo. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
    
}


function deleteEquipo(id){
    var res=confirm("Desea eliminar el registro");   
    if(res==true){
        $.post('modules/procedure/equipo.procedure.php',
        {
            txtIdEquipo:id,            
            txtType:"delete"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Equipo eliminado exitosamente','i');				                
                $.limpiarCampos("#frmEquipo");
                //restableciendo botones
                $("#btnEquipo").attr("value","Agregar");
                searchEquipo();                  
            }else{                                    
                $.mensajeInformativo('Hubo un error al eliminar el equipo. Intente de nuevo.','e');					
            }							
        }
        );
    }
}


function cargarComboEquipo(idCaja){
    $.post('modules/procedure/equipo.procedure.php',
    {
        //txtIdEquipo:id,            
        txtType:"cargar"
    },
    function(data){            
        $(idCaja).html(data);
    }
    );
}