
function addCarrera(){    
    if($.validarCampos("#frmCarrera")){
            
        $.post('modules/procedure/carrera.procedure.php',
        {
            txtCarrera:$('#txtDescripcionCarrera').attr('value'),
            selCarreraInstitucion:$('#selCarreraInstitucion').attr('value'),
            txtType:"add"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Carrera agregado exitosamente','i');				
                $.limpiarCampos("#frmCarrera");                                
            }else{                    
                $.mensajeInformativo('Hubo un error al guardar el Carrera. Intente de nuevo.','e');					                                
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}

function searchCarrera(){
    if($.validarCampos("#frmSearchCarrera")){
        $.ajax({
            type: 'POST',
            url: 'modules/procedure/carrera.procedure.php',
            dataType:'html',
            data: {
                txtCarrera: $('#txtSearchCarrera').attr('value'), 
                txtType: "search"
            },
            success:function(response){
                $('#searchCarrera').html(response);
            }
        }
                        
        );

           
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
}
function selCarrera(id,des,idUniversidad){    
    $("#txtIdCarrera").attr("value", id);
    cargarComboInstitucion("#selCarreraInstitucion", idUniversidad);
    $("#txtDescripcionCarrera").attr("value",des);
    $("#btnCarrera").attr("value","Guardar");
}

function updateCarrera(){
    if($.validarCampos("#frmCarrera")){
            
        $.post('modules/procedure/Carrera.procedure.php',
        {
            txtIdCarrera:$('#txtIdCarrera').attr('value'),
            txtCarrera:$('#txtDescripcionCarrera').attr('value'),
            selCarreraInstitucion:$('#selCarreraInstitucion').attr('value'),
            txtType:"update"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Carrera actualizado exitosamente','i');				
                $.limpiarCampos("#frmCarrera");
                //restableciendo botones
                $("#btnCarrera").attr("value","Agregar");
                searchCarrera();                   
            }else{                    
                $.mensajeInformativo('Hubo un error al modificar el Carrera. Intente de nuevo.','e');					
            }							
        }
        );
                               
    }else{
        $.mensajeInformativo('Faltan campos por llenar','e');
    }
    
}


function deleteCarrera(id){
    var res=confirm("Desea eliminar el registro");   
    if(res==true){
        $.post('modules/procedure/Carrera.procedure.php',
        {
            txtIdCarrera:id,            
            txtType:"delete"
        },
        function(data){
            if(data=="true"){
                $.mensajeInformativo('Carrera eliminado exitosamente','i');				                
                $.limpiarCampos("#frmCarrera");
                //restableciendo botones
                $("#btnCarrera").attr("value","Agregar");
                searchCarrera();                  
            }else{                                    
                $.mensajeInformativo('Hubo un error al eliminar el Carrera. Intente de nuevo.','e');					
            }							
        }
        );
    }
}


function cargarComboCarrera(idCaja){
    $.post('modules/procedure/Carrera.procedure.php',
    {
        //txtIdCarrera:id,            
        txtType:"cargar"
    },
    function(data){            
        $(idCaja).html(data);
    }
    );
}