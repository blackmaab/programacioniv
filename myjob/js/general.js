$(document).ready(function(){
    
    //efectos en las cajas
    $('#divFormulario [title]').tipsy({
        trigger: 'focus', 
        gravity: 'w'
    });
    
    //validacion de login
    $("#btnLogin:button").button();
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
    
    //validacion de updateAccount
    $("#btnUpdateAccount:button").button();
    $("#btnUpdateAccount").click(function(){
        if($.validarCampos("#frmUpdateAccount")){
            if($("#txtPassword").attr("value")==$("#txtPasswordConfirm").attr("value")){
                $.mensajeInformativo('Contraseña actualizada', 'i');
                $.limpiarCampos("#frmUpdateAccount");
            }else{
                $.mensajeInformativo('Contraseñas no coiciden', 'e');
            }
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
     
     
    //validacion de formulario de nuevo usuario 
    $("#btnNewUser:button").button();
    $("#btnNewUser").click(function(){
        if($.validarCampos("#frmNewUser")){
                        
            if($("#txtNewPassword").attr("value")==$("#txtNewPasswordConfirm").attr("value")){
                $.mensajeInformativo('Cuenta creada exitosamente', 'i');
            //$.limpiarCampos("#frmNewUser");
            }else{
                $.mensajeInformativo('Contraseñas no coiciden', 'e');
            }
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    
    $("#selNewTipoUser").change(function(){
        if($(this).attr("value")=='c'){            
            $(".rowInstitucion").show();            
            $(".rowPersona").hide();            
        }else if($(this).attr("value")=='u'){
            $(".rowInstitucion").hide();
            $(".rowPersona").show();
        }else{
            $(".rowInstitucion").hide();
            $(".rowPersona").hide();
        }
    });
    
    $('#txtNewNombres').keypress(function(event){
        return $.validarTecla(event,'#txtNewNombres','nombre');
    });
    
    $('#txtNewApellidos').keypress(function(event){
        return $.validarTecla(event,'#txtNewApellidos','nombre');
    });
    
    
    //validacion de formulario departamento | estado
    $("#btnEstado:button").button();
    $("#btnEstado").click(function(){
        if($.validarCampos("#frmEstado")){
            $.mensajeInformativo('Departamento | Estado agregado exitosamente','i');
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    $('#txtEstado').keypress(function(event){
        return $.validarTecla(event,'#txtEstado','nombre');
    });
    
});
