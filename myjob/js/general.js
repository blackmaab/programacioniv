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
    
    /*$("#selNewTipoUser").change(function(){
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
    });*/
    
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
            $.limpiarCampos("#frmEstado");
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    $('#txtEstado').keypress(function(event){
        return $.validarTecla(event,'#txtEstado','nombre');
    });
   
    //validacion de formulario institucion educativa
    $("#btnInstitucion:button").button();
    $("#btnInstitucion").click(function(){
        if($.validarCampos("#frmInstitucion")){
            $.mensajeInformativo('Institución agregada exitosamente','i');
            $.limpiarCampos("#frmInstitucion");
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    $('#txtDescripcionEquipo').keypress(function(event){
        return $.validarTecla(event,'#txtDescripcionEquipo','nombre');
    });
    
    //validacion de formulario equipo herramientas
    $("#btnEH:button").button();
    $("#btnEH").click(function(){
        if($.validarCampos("#frmEquipo")){
            $.mensajeInformativo('Tipo de Equipos Herramientas agregada exitosamente','i');
            $.limpiarCampos("#frmEquipo");
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    $('#txtDescripcionEH').keypress(function(event){
        return $.validarTecla(event,'#txtDescripcionEH','nombre');
    });
    
    //validacion de formulario equipo herramientas
    $("#btnEH:button").button();
    $("#btnEH").click(function(){
        if($.validarCampos("#frmEquipo")){
            $.mensajeInformativo('Equipo o Herramienta agregada exitosamente','i');
            $.limpiarCampos("#frmEquipo");
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    $('#txtDescripcionEH').keypress(function(event){
        return $.validarTecla(event,'#txtDescripcionEH','nombre');
    });
    
    //validacion de formulario institucion educativa
    $("#btnArea:button").button();
    $("#btnArea").click(function(){
        if($.validarCampos("#frmAreaTrabajo")){
            $.mensajeInformativo('Area de empleo agregada exitosamente','i');
            $.limpiarCampos("#frmAreaTrabajo");
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    $('#txtDescripcionArea').keypress(function(event){
        return $.validarTecla(event,'#txtDescripcionArea','nombre');
    });
    //validacion de formulario carrera
    $("#btnCarrera:button").button();
    $("#btnCarrera").click(function(){
        if($.validarCampos("#frmCarrera")){
            $.mensajeInformativo('Carrera agregada exitosamente','i');
            $.limpiarCampos("#frmCarrera");
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    $('#txtDescripcionCarrera').keypress(function(event){
        return $.validarTecla(event,'#txtDescripcionCarrera','nombre');
    });
    
    //validacion de formulario carrera
    $("#btnTipoEmpleo:button").button();
    $("#btnTipoEmpleo").click(function(){
        if($.validarCampos("#frmTipoEmpleo")){
            $.mensajeInformativo('Tipo de Empleo agregado exitosamente','i');
            $.limpiarCampos("#frmTipoEmpleo");
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    $('#txtTipoEmpleo').keypress(function(event){
        return $.validarTecla(event,'#txtTipoEmpleo','nombre');
    });
    
    //validacion de Nivel de Estudio
    $("#btnNivelEstudio:button").button();
    $("#btnNivelEstudio").click(function(){
        if($.validarCampos("#frmNivelEstudio")){
            $.mensajeInformativo('Nivel Estudio agregado exitosamente','i');
            $.limpiarCampos("#frmNivelEstudio");
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    $('#txtNivelEstudio').keypress(function(event){
        return $.validarTecla(event,'#txtNivelEstudio','nombre');
    });
    
    //validacion de Tipo de Documento
    $("#btnTipoDocumento:button").button();
    $("#btnTipoDocumento").click(function(){
        if($.validarCampos("#frmTipoDocumento")){
            $.mensajeInformativo('Tipo de documento agregado exitosamente','i');
            $.limpiarCampos("#frmTipoDocumento");
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    $('#txtTipoDocumento').keypress(function(event){
        return $.validarTecla(event,'#txtTipoDocumento','nombre');
    });
    //validacion de Parentesco
    $("#btnParentesco:button").button();
    $("#btnParentesco").click(function(){
        if($.validarCampos("#frmParentesco")){
            $.mensajeInformativo('Parentesco agregado exitosamente','i');
            $.limpiarCampos("#frmParentesco");
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    $('#txtParentesco').keypress(function(event){
        return $.validarTecla(event,'#txtParentesco','nombre');
    });
   
   
    //validacion de formulario de publicacion de nuevo anuncio
    $("#btnNewAnuncio:button").button();
    $("#btnNewAnuncio").click(function(){
        if($.validarCampos("#frmNewAnuncio")){
            $.mensajeInformativo('Anuncio publicado exitosamente','i');
            $.limpiarCampos("#frmNewAnuncio");
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    $('#txtNewVacantes').keypress(function(event){
        return $.validarTecla(event,'#txtNewVacantes','numero');
    });
    $('#txtNewSalarioMinimo').keypress(function(event){
        return $.validarTecla(event,'#txtNewSalarioMinimo','dinero');
    });
    $('#txtNewSalarioMaximo').keypress(function(event){
        return $.validarTecla(event,'#txtNewSalarioMaximo','numero');
    });
    
    //validacion de formulario curriculum
    $("#btnNewCurriculum:button").button();
    $("#btnNewCurriculum").click(function(){
        var frm1=$.validarCampos("#frmEstudios");
        var frm2=$.validarCampos("#frmDatosPersonales");
        var frm3=$.validarCampos("#frmReferenciaPersonal");
        if(frm1==true && frm2==true && frm3==true){            
            $.mensajeInformativo('Curriculum creado exitosamente','i');
            $.limpiarCampos("#frmDatosPersonales");
            $.limpiarCampos("#frmEstudios");
            $.limpiarCampos("#frmExperenciaLaboral");
            $.limpiarCampos("#frmCapacitaciones");
            $.limpiarCampos("#frmDiplomas");
            $.limpiarCampos("#frmReferenciaPersonal");
            $.limpiarCampos("#frmReferenciaLaboral");
                       
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    
    
    $('#txtNewNombresCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewNombresCu','nombre');
    });
    $('#txtNewApellidosCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewApellidosCu','nombre');
    });
    
    $( "#txtNewFechaNacimientoCu" ).datepicker();
            
    $('#txtNewNoDocCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewNoDocCu','numero');
    });
    
    $('#txtNewTelefonoCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewTelefonoCu','telefono');
    });
    
    $('#txtNewMovilCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewMovilCu','telefono');
    });
    
    $('#txtNewOficinaCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewOficinaCu','telefono');
    });
    
    $('#txtNewExtCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewExtCu','numero');
    });
    
    $('#txtNewEmailCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewEmailCu','email');
    });
    
    $('#txtNewAnioIniCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewAnioIniCu','anio');
    });
    
    $('#txtNewAnioFinCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewAnioFinCu','anio');
    });
    
    $('#txtNewJefeCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewJefeCu','nombre');
    });
    
    $( "#txtNewPeriodoIniCu" ).datepicker();
    
    $( "#txtNewPeriodoFinCu" ).datepicker();
    
    $('#txtNewTelefonoCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewTelefonoCu','telefono');
    });
    
    $('#txtNewExtJefeCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewExtJefeCu','numero');
    });
    
    $('#txtNewAnioCapCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewAnioCapCu','anio');
    });
    
    $('#txtNewRePeCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewRePeCu','nombre');
    });
    
    $('#txtNewTePeCu').keypress(function(event){
        return $.validarTecla(event,'#txtNewTePeCu','telefono');
    });
    
    $('#txtNombreReLabCu').keypress(function(event){
        return $.validarTecla(event,'#txtNombreReLabCu','nombre');
    });
    
    $('#txtTelReLabCu').keypress(function(event){
        return $.validarTecla(event,'#txtTelReLabCu','telefono');
    });
    
    $('#txtExtReLabCu').keypress(function(event){
        return $.validarTecla(event,'#txtExtReLabCu','numero');
    });
    
    
    
});
