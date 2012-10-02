//funcion para validacion de campos
jQuery.validarCampos=function(nameForm){
    var contadorErrores=0;
		
    //verificacion de type="text"
    $(nameForm + ' input:text').each(function(index){
        //verificacion si el campo esta vacio
        $(this).removeClass();
        if($(this).attr('value')=="" || $(this).attr('value')==null){
            $(this).attr('title','Campo requerido');
            $(this).addClass('errorText');
            contadorErrores++;
        }else{
            $(this).addClass('contact_input');		
        }
    });
		
    //verificacion de type="password"
    $(nameForm +' input:password').each(function(index){
        //verifiacion si el campo esta vacio
        $(this).removeClass();
        if($(this).attr('value')=="" || $(this).attr('value')==null){
            $(this).attr('title','Campo requerido');
            $(this).addClass('errorText');
            contadorErrores++;
        }else{
            $(this).addClass('contact_input');
        }
    });
		
    //verificacion de textarea
    $(nameForm + ' textarea').each(function(index){
        //verificacion si el campo esta vacio
        $(this).removeClass();
        if($(this).attr('value')=="" || $(this).attr('value')==null){
            $(this).attr('title','Campo requerido');
            $(this).addClass('errorTextArea');
            contadorErrores++;
        }else{
            $(this).addClass('contact_textarea');
        }
    });
		
    //verifiacion de select
    $(nameForm + ' select').each(function(){
        //verificacion si no se ha seleccionado nada
        $(this).removeClass();
        if($(this).attr('value')=="-"){
            $(this).attr('title','Campo requerido');
            $(this).addClass('errorSelect');
            contadorErrores++;
        }else{
            $(this).addClass('contact_input');
        }
    });
		
    //verifiacion de los errores
    if(contadorErrores>0){
        return false;
    }else{
        return true;
    }			
}//fin de funcion validarCampos


//validacion de tecla
jQuery.validarTecla=function(event,caja,opc){
    tecla = (document.all) ? event.keyCode : event.which;
	
    if(tecla==0 || tecla==8) return true;
    convertirTecla=String.fromCharCode(tecla);
    var valorCaja,partir,patron;
    switch(opc){
        case "nombre":
            patron=/[A-Za-zñÑáéíóúÁÉÍÓÚ\s ]{1}/;
            break;
        case "numero":
            patron=/^[0-9]{1}/;
            break;
        case "texto":
            patron=/^[0-9A-Za-zñÑáéíóúÁÉÍÓÚ\s:;,."¿?!¡ ]{1}/;
            break;	
        case "email":
            patron=/^[0-9a-z_.@]{1}/;
            break;	
        case "telefono":

            //verificacion que el primer numero sea 7 u 2
            if($(caja).attr('value').length==0){
                patron=/[27]{1}/;								
            }else if($(caja).attr('value').length<=8){
                patron=/[0-9]{1}/;
            }else{
                return false;
            }
			
            //agregando el guion
            if($(caja).attr('value').length==4){
                $(caja).attr('value',$(caja).attr('value')+'-');
            }
            //			alert($(caja).attr('value').length);
            break;						
    }//switch
    //alert(String.fromCharCode(tecla));		
    return patron.test(convertirTecla);
}//fin de funcion validarTecla

//validacion de correo
jQuery.validarEmail=function(caja){
    var patron=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/;
    if(!patron.test($(caja).attr('value'))){
        $(caja).removeClass();
        $(caja).attr('title','Email no valido');
        $(caja).addClass('errorText');
        return false
    }else{
        return true;	
    }
}

//validacion de telefono 
jQuery.validarTelefono=function(caja){
    var patron=/^[0-9]{4}[-]{1}[0-9]{4}$/;
    if(!patron.test($(caja).attr('value'))){
        $(caja).removeClass();
        $(caja).attr('title','Telefono no valido');
        $(caja).addClass('errorText');
        return false
    }else{
        return true;	
    }
}

//mensajes de informacion
jQuery.mensajeInformativo=function(mensaje,tipoError){
    var titl,image,h,w,funcion;
    funcion=function(){};
    switch (tipoError){
        case 'e':
            titl='Error';
            image='images/advertencia.png';
            w=255;
            h=135;		
            break;
            ;
		
        case 'i':
            titl='Exito';
            image='images/exito.png';
            w=270;
            h=135;
            break;
		
        case 'login':
            titl='Exito';
            image='images/exito.png';
            w=270;
            h=135;
            funcion=function(){
                window.location='?mod=home';
            };
            break;
            ;

        case 'logout':
            titl='Error';
            image='images/advertencia.png';
            w=270;
            h=135;
            funcion=function(){
                window.location='?mod=admin';
            };
            break;
            ;
    }
    if(tipoError){
	
    }
	
    $('#divMensaje')
    .html('<img src="'+image+'" class="imgInformacion"/>'+mensaje)		
    .addClass('mensInformation')
    .dialog({
        title:titl,
        draggable:false,
        width:w,
        height:h,
        resizable:false,
        show:'clip',
        modal:false, //pantalla congelada
        hide: {
            effect: 'drop', 
            direction: "down"
        } ,
        position:['right','top'],
        buttons:{
            "Ok":function(){
                $(this).dialog("close");
                funcion();
            }
        },
        close:function(){
            funcion();
        }
    });			
}



jQuery.limpiarCampos=function(nameForm){	
    //limpiando type="text"
    $(nameForm + ' input:text').each(function(index){
        $(this).attr('value','');
    });
		
    //limpiando type="password"
    $(nameForm +' input:password').each(function(index){
        $(this).attr('value','');
    });
		
    //limpiando textarea
    $(nameForm + ' textarea').each(function(index){
        $(this).attr('value','');
    });
		
    //limpiando select
    $(nameForm + ' select').each(function(){
        $(this).attr('value','-');
    });
}//fin de funcion limpiarCampos


