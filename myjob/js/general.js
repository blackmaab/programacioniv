$(document).ready(function(){
    
     //efectos en las cajas
    $('#divFormulario [title]').tipsy({
        trigger: 'focus', 
        gravity: 'w'
    });
    
    $("#btnLogin").click(function(){
    //verificacion que los campos esten llenos
        if($.validarCampos("#frmLogin")==true){
            $.mensajeInformativo('Correcto','i');
        }else{
            $.mensajeInformativo('Verifique los campos','e');
        }    
    });
    
    
    //validando datos en tiempo real
    /*$('#txtNombre').keypress(function(event){
        return $.validarTecla(event,'#txtNombre','nombre');
    });*/
});
