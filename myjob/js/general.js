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
        if($(this).attr("value")=="Agregar"){
            addPais();            
        }else{
            updatePais();
        }
        
    });
    
    $('#txtPais').keypress(function(event){
        return $.validarTecla(event,'#txtPais','nombre');
    });
    
    $("#btnSearchPais:button").button();
    $("#btnSearchPais:button").click(function(){
        searchPais();
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
        if($(this).attr("value")=="Agregar"){
            addEstado();            
        }else{
            updateEstado();
        }
    });
    $('#txtEstado').keypress(function(event){
        return $.validarTecla(event,'#txtEstado','nombre');
    });
     
    $("#btnSearchEstado:button").button();
    $("#btnSearchEstado:button").click(function(){
        searchEstado();
    });
    
    //validacion de formulario Empresa
    $("#btnEmpresaCurriculum:button").button();
    $("#btnEmpresaCurriculum").click(function(){
        if($(this).attr("value")=="Agregar"){
            addEmpresaCurriculum();            
        }else{
            updateEmpresaCurriculum();
        }
    });
    $('#txtDescripcionEmpresa').keypress(function(event){
        return $.validarTecla(event,'#txtDescripcionEmpresa','nombre');
    });
    
    $("#btnSearchEmpresaCurriculum:button").button();
    $("#btnSearchEmpresaCurriculum:button").click(function(){
        searchEmpresaCurriculum();
    });
    
    //validacion de formulario Empresa
    $("#btnEstadoCarrera:button").button();
    $("#btnEstadoCarrera").click(function(){
        if($(this).attr("value")=="Agregar"){
            addEstadoCarrera();            
        }else{
            updateEstadoCarrera();
        }
    });
    $('#txtDescripcionEstadoCarrera').keypress(function(event){
        return $.validarTecla(event,'#txtDescripcionEstadoCarrera','nombre');
    });
    
    $("#btnSearchEstadoCarrera:button").button();
    $("#btnSearchEstadoCarrera:button").click(function(){
        searchEstadoCarrera();
    });
   
    //validacion de formulario institucion educativa
    $("#btnInstitucion:button").button();
    $("#btnInstitucion").click(function(){
        if($(this).attr("value")=="Agregar"){
            addInstitucion();            
        }else{
            updateInstitucion();
        }
    });
    $('#txtDescripcionEquipo').keypress(function(event){
        return $.validarTecla(event,'#txtDescripcionEquipo','nombre');
    });
    
    $("#btnSearchInstitucion:button").button();
    $("#btnSearchInstitucion:button").click(function(){
        searchInstitucion();
    });
    
    //validacion de formulario equipo herramientas
    $("#btnEH:button").button();
    $("#btnEH").click(function(){
        if($(this).attr("value")=="Agregar"){
            addEquipo();            
        }else{
            updateEquipo();
        }
    });
    $('#txtDescripcionEH').keypress(function(event){
        return $.validarTecla(event,'#txtDescripcionEH','nombre');
    });
    
    $("#btnSearchEquipo:button").button();
    $("#btnSearchEquipo:button").click(function(){
        searchEquipo();
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
        if($(this).attr("value")=="Agregar"){
            addAreaTrabajo();            
        }else{
            updateAreaTrabajo();
        }
    });
    $('#txtDescripcionArea').keypress(function(event){
        return $.validarTecla(event,'#txtDescripcionArea','nombre');
    });
    
    $("#btnSearchAreaTrabajo:button").button();
    $("#btnSearchAreaTrabajo:button").click(function(){
        searchAreaTrabajo();
    });
    
    //validacion de formulario carrera
    $("#btnCarrera:button").button();
    $("#btnCarrera").click(function(){
        if($(this).attr("value")=="Agregar"){
            addCarrera();            
        }else{
            updateCarrera()
        }
    });
    $('#txtDescripcionCarrera').keypress(function(event){
        return $.validarTecla(event,'#txtDescripcionCarrera','nombre');
    });
    
    $("#btnSearchCarrera:button").button();
    $("#btnSearchCarrera:button").click(function(){
        searchCarrera();
    });
    
    //validacion de formulario carrera
    $("#btnTipoEmpleo:button").button();
    $("#btnTipoEmpleo").click(function(){
        if($(this).attr("value")=="Agregar"){
            addTipoEmpleo();
        }else{
            updateTipoEmpleo();
        }
    });
    $('#txtTipoEmpleo').keypress(function(event){
        return $.validarTecla(event,'#txtTipoEmpleo','nombre');
    });
    
    $("#btnSearchTipoEmpleo:button").button();
    $("#btnSearchTipoEmpleo:button").click(function(){
        searchTipoEmpleo();
    });
    
    //validacion de Nivel de Estudio
    $("#btnNivelEstudio:button").button();
    $("#btnNivelEstudio").click(function(){
        if($(this).attr("value")=="Agregar"){
            addNivelEstudio();            
        }else{
            updateNivelEstudio();
        }
    });
    $('#txtNivelEstudio').keypress(function(event){
        return $.validarTecla(event,'#txtNivelEstudio','nombre');
    });
    $("#btnSearchNivelEstudio:button").button();
    $("#btnSearchNivelEstudio:button").click(function(){
        searchNivelEstudio();
    });
    
    
    //validacion de Tipo de Documento
    $("#btnTipoDocumento:button").button();
    $("#btnTipoDocumento").click(function(){
        if($(this).attr("value")=="Agregar"){
            addTipoDocumento();            
        }else{
            updateTipoDocumento();
        }
    });
    $('#txtTipoDocumento').keypress(function(event){
        return $.validarTecla(event,'#txtTipoDocumento','nombre');
    });
    $("#btnSearchTipoDocumento:button").button();
    $("#btnSearchTipoDocumento:button").click(function(){
        searchTipoDocumento();
    });
    
    
    //validacion de Parentesco
    $("#btnParentesco:button").button();
    $("#btnParentesco").click(function(){
        if($(this).attr("value")=="Agregar"){
            addParentesco();
        }else{
            updateParentesco();
        }
    });
    $('#txtParentesco').keypress(function(event){
        return $.validarTecla(event,'#txtParentesco','nombre');
    });
    
    $("#btnSearchParentesco:button").button();
    $("#btnSearchParentesco:button").click(function(){
        searchParentesco();
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
        return $.validarTecla(event,'#txtNewSalarioMaximo','dinero');
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
    
    
    //validacion de datos empresa
    $("#btnDatosEmpresa:button").button();
    $("#btnDatosEmpresa").click(function(){        
        if($.validarCampos("#frmDatosCompany")){            
            $.mensajeInformativo('Datos actualizados exitosamente','i');
            $.limpiarCampos("#frmDatosCompany");                                  
        }else{
            $.mensajeInformativo('Faltan campos por llenar','e');
        }
    });
    
    $('#txtTelefonoEmpresa').keypress(function(event){
        return $.validarTecla(event,'#txtTelefonoEmpresa','telefono');
    });
    
    $('#txtEmailEmpresa').keypress(function(event){
        return $.validarTecla(event,'#txtEmailEmpresa','email');
    });
    
    //validacion del formulario tipo de equipo
    $("#btnTipoEquipoHerramienta:button").button();
    $("#btnTipoEquipoHerramienta").click(function(){        
        if($(this).attr("value")=="Agregar"){
            addTipoEquipoHerramienta();            
        }else{
            updateTipoEquipoHerramienta();
        }
    });
    
    $("#btnSearchTipoEquipoHerramienta:button").button();
    $("#btnSearchTipoEquipoHerramienta:button").click(function(){
        searchTipoEquipoHerramienta();
    });
    
    
    $("#selPaisInstitucion").change(function(){
        cargarComboEstado("#selPaisInstitucion","#selEstadoInstitucion","-");       
    });
    

    //inicializando valores de los combobox
    cargarComboPais("#selPaisInstitucion");
    cargarComboPais("#selEstadoEstado");
    cargarComboNivelEstudio("#selNivelEstudioInstitucion");
    cargarComboInstitucion("#selCarreraInstitucion", "-");
    cargarComboTipoEquipoHerramienta("#selEH", "-");
    cargarComboAreaTrabajo("#selAreaTipoEmpleo", "-");

});

//incluyendo mas archivos
document.write("<script type='text/javascript' src='js/pais.js'></script>");
document.write("<script type='text/javascript' src='js/estadoCarrera.js'></script>");
document.write("<script type='text/javascript' src='js/nivelEstudio.js'></script>");
document.write("<script type='text/javascript' src='js/tipoDocumento.js'></script>");
document.write("<script type='text/javascript' src='js/parentesco.js'></script>");
document.write("<script type='text/javascript' src='js/tipoEquipoHerramienta.js'></script>");
document.write("<script type='text/javascript' src='js/areaTrabajo.js'></script>");
document.write("<script type='text/javascript' src='js/empresaCurriculum.js'></script>");
document.write("<script type='text/javascript' src='js/estado.js'></script>");
document.write("<script type='text/javascript' src='js/institucion.js'></script>");
document.write("<script type='text/javascript' src='js/carrera.js'></script>");
document.write("<script type='text/javascript' src='js/equipo.js'></script>");
document.write("<script type='text/javascript' src='js/tipoEmpleo.js'></script>");