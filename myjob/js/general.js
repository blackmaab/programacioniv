$(document).ready(function(){
    
    //efectos en las cajas
    $('#divFormulario [title]').tipsy({
        trigger: 'focus', 
        gravity: 'w'
    });
    
    $("#btnLogin").click(function(){
        //verificacion que los campos esten llenos
        if($.validarCampos("#frmLogin")==true){
            var user=$("#txtUsuario").attr("value");
            var password=$("#txtPassword").attr("value");
            
            if(user==password){
                if(user=="admin"){
                    $.mensajeInformativo('Bienvenido Administrador','loginAdmin');
                }else if(user=="empresa"){
                    $.mensajeInformativo('Bienvenida Empresa','loginEmpresa');
                    
                }else{
                    $.mensajeInformativo('Bienvenido Usuario','loginUser');
                }
            }else{
                $.mensajeInformativo('Usuario y Contraseña incorrectos','e');
            }
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }    
    });
    
    $("#linkLogout").click(function(){
        $.mensajeInformativo('Cerrando Sesion...','logout');
    });
    
    
    //acordion
    $( "#accordion" ).accordion();
    
    //validacion de formulario pais
    $("#btnPais:button").button();
    $("#btnPais").click(function(){
        if($.validarCampos("#frmPais")){
            $.mensajeInformativo('Pais agregado exitosamente', 'i');
            $.limpiarCampos("#frmPais");
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    
    $('#txtPais').keypress(function(event){
        return $.validarTecla(event,'#txtPais','nombre');
    });
    
//validando datos en tiempo real
/*$('#txtNombre').keypress(function(event){
        return $.validarTecla(event,'#txtNombre','nombre');
    });*/
});
