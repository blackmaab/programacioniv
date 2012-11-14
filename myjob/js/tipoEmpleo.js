
function addTipoEmpleo(){
    if($.validarCampos("#frmTipoEmpleo")){
            
        $.post('modules/procedure/tipoEmpleo.procedure.php',
        {
            txtTipoEmpleo:$('#txtTipoEmpleo').attr('value'),
            txtType:"add"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('TipoEmpleo agregado exitosamente','i');				
                $.limpiarCampos("#frmTipoEmpleo");                
                cargarComboTipoEmpleo("#selEstadoEstado");
                cargarComboTipoEmpleo("#selTipoEmpleoInstitucion");
            }else{                    
                $.mensajeInformativo('Hubo un error al guardar el tipoEmpleo. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}

function searchTipoEmpleo(){
    if($.validarCampos("#frmSearchTipoEmpleo")){
        $.ajax({
            type: 'POST',
            url: 'modules/procedure/tipoEmpleo.procedure.php',
            dataType:'html',
            data: {
                txtTipoEmpleo: $('#txtSearchTipoEmpleo').attr('value'), 
                txtType: "search"
            },
            success:function(response){
                $('#searchTipoEmpleo').html(response);
            }
        }
                        
        );

           
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}
function selTipoEmpleo(id,des){
    $("#txtIdTipoEmpleo").attr("value", id);
    $("#txtTipoEmpleo").attr("value",des);
    $("#btnTipoEmpleo").attr("value","Guardar");
}

function updateTipoEmpleo(){
    if($.validarCampos("#frmTipoEmpleo")){
            
        $.post('modules/procedure/tipoEmpleo.procedure.php',
        {
            txtIdTipoEmpleo:$('#txtIdTipoEmpleo').attr('value'),
            txtTipoEmpleo:$('#txtTipoEmpleo').attr('value'),
            txtType:"update"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('TipoEmpleo actualizado exitosamente','i');				
                $.limpiarCampos("#frmTipoEmpleo");
                //restableciendo botones
                $("#btnTipoEmpleo").attr("value","Agregar");
                searchTipoEmpleo();   
                cargarComboTipoEmpleo("#selEstadoEstado");
                cargarComboTipoEmpleo("#selTipoEmpleoInstitucion");
            }else{                    
                $.mensajeInformativo('Hubo un error al modificar el tipoEmpleo. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
    
}


function deleteTipoEmpleo(id){
    var res=confirm("Desea eliminar el registro");   
    if(res==true){
        $.post('modules/procedure/tipoEmpleo.procedure.php',
        {
            txtIdTipoEmpleo:id,            
            txtType:"delete"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('TipoEmpleo eliminado exitosamente','i');				                
                $.limpiarCampos("#frmTipoEmpleo");
                //restableciendo botones
                $("#btnTipoEmpleo").attr("value","Agregar");
                searchTipoEmpleo();  
                cargarComboTipoEmpleo("#selEstadoEstado");
                cargarComboTipoEmpleo("#selTipoEmpleoInstitucion");
            }else{                                    
                $.mensajeInformativo('Hubo un error al eliminar el tipoEmpleo. Intente de nuevo.','e');					
            }							
        }
        );
    }
}


function cargarComboTipoEmpleo(idCaja){
    $.post('modules/procedure/tipoEmpleo.procedure.php',
    {
        //txtIdTipoEmpleo:id,            
        txtType:"cargar"
    },
    function(data){            
        $(idCaja).html(data);
    }
    );
}