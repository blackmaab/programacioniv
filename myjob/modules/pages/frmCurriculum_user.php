<div id="divFormulario">
    <h1>Datos Personales</h1>
    <frm name="frmDatosPersonales" id="frmDatosPersonales" action="#">
        <table>
            <tr>                
                <td colspan="2" align="right">
                    <input type="button" name="btnNewCurriculum" id="btnNewCurriculum" value="Finalizar Curriculum">
                </td>
            </tr>
            <tr>
                <td>Nombres:</td>
                <td>
                    <input type="text" name="txtNewNombresCu" id="txtNewNombresCu" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Apellidos:</td>
                <td>
                    <input type="text" name="txtNewApellidosCu" id="txtNewApellidosCu" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Fecha de nacimiento:</td>
                <td>
                    <input type="text" name="txtNewFechaNacimientoCu" id="txtNewFechaNacimientoCu" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Sexo:</td>
                <td>
                    <select name="selNewSexoCu" id="selNewSexoCu" class="defaultSelect" title="Campo Requerido" alt="*">
                        <option value="-">--Seleccione--</option>
                        <option value="f">Femenino</option>
                        <option value="m">Masculino</option>                            
                    </select>                        
                </td>
            </tr>
            <tr>
                <td>Estado Civil:</td>
                <td>
                    <select name="selNewEstadoCivilCu" id="selNewEstadoCivilCu" class="defaultSelect" title="Campo Requerido" alt="*">
                        <option value="-">--Seleccione--</option>
                        <option value="s">Soltero</option>
                        <option value="c">Casado</option>                            
                        <option value="d">Divorciado</option>
                        <option value="v">Viudo</option>
                        <option value="a">Acompa&ntilde;ado</option>
                    </select>                        
                </td>
            </tr>
            <tr>
                <td>Foto:</td>
                <td>
                    <input type="file" name="txtNewFotoCu" id="txtNewFotoCu" > 
                </td>
            </tr>
            <tr>
                <td>Tipo de documento:</td>
                <td>
                    <select name="selNewTipoDocCu" id="selNewTipoDocCu" class="defaultSelect" title="Campo Requerido" alt="*">
                        <option value="-" selected="selected">--Seleccione--</option>
                        <option value="1">DUI</option>
                        <option value="2">NIT</option>                            
                        <option value="3">Pasaporte</option>
                        <option value="4">ONI</option>                        
                    </select>                        
                </td>
            </tr>
            <tr>
                <td>No. Documento:</td>
                <td>
                    <input type="text" name="txtNewNoDocCu" id="txtNewNoDocCu" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Pa&iacute;s:</td>
                <td>
                    <select name="selNewPaisCu" id="selNewPaisCu" class="defaultSelect" title="Campo Requerido" alt="*">
                        <option value="-" selected="selected">--Seleccione--</option>
                        <option value="1">El Salvador</option>
                        <option value="2">Honduras</option>
                        <option value="3">Guatemala</option>
                        <option value="4">Costa Rica</option>
                        <option value="5">M&eacute;xico</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Departamento | Estado:</td>
                <td>
                    <select name="selNewDepCu" id="selNewDepCu" class="defaultSelect" title="Campo Requerido" alt="*">
                        <option value="-" selected="selected">--Seleccione--</option>
                        <option value="1">San Salvador</option>
                        <option value="2">Managua</option>
                        <option value="3">San Jos&eacute;</option>
                        <option value="4">Guatemala</option>
                        <option value="5">M&eacute;xico D.F.</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Direcci&oacute;n:</td>
                <td>
                    <textarea rows="5" cols="16" name="txtNewDireccionCu" id="txtNewDireccionCu" class="defaultText" title="Campo Requerido" alt="*"></textarea>
                </td>                    
            </tr>
            <tr>
                <td>Tel&eacute;fono Casa:</td>
                <td>
                    <input type="text" name="txtNewTelefonoCu" id="txtNewTelefonoCu" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Tel&eacute;fono M&oacute;vil:</td>
                <td>
                    <input type="text" name="txtNewMovilCu" id="txtNewMovilCu" class="defaultText">
                </td>                                      
            </tr>
            <tr>
                <td>Tel&eacute;fono Oficina:</td>
                <td>
                    <input type="text" name="txtNewOficinaCu" id="txtNewOficinaCu" class="defaultText">
                </td>                    
            </tr>
            <tr>
                <td>No. Ext. Oficina:</td>
                <td>
                    <input type="text" name="txtNewExtCu" id="txtNewExtCu" class="defaultText">
                </td>
            </tr>
            <tr>
                <td>Correo Electronico:</td>
                <td>
                    <input type="text" name="txtNewEmailCu" id="txtNewEmailCu" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>            
        </table>        
    </frm>
    <hr>
    <h1>Estudios Realizados</h1>
    <frm name="frmEstudios" id="frmEstudios" action="#">
        <table>
            <tr>
                <td>Nivel de estudio:</td>
                <td>
                    <select name="selNewEstuddiosCu" id="selNewEstudiosCu" class="defaultSelect" title="Campo Requerido" alt="*">
                        <option value="-" selected="selected">--Seleccione--</option>
                        <option value="1">Primaria</option>
                        <option value="2">Secundaria</option>
                        <option value="3">Superior</option>
                    </select>
                </td>                
            </tr>
            <tr>
                <td>Instituci&oacute;n:</td>
                <td>
                    <select name="selNewInstitucionCu" id="selNewInstitucionCu" class="defaultSelect" title="Campo Requerido" alt="*">
                        <option value="-" selected="selected">--Seleccione--</option>
                        <option value="1">Escuela y</option>
                        <option value="2">Universidad x</option>
                        <option value="3">Colegio z</option>
                    </select>
                </td>                
            </tr>
            <tr>
                <td>Carrera:</td>
                <td>
                    <select name="selNewCarreraCu" id="selNewCarreraCu" class="defaultSelect" title="Campo Requerido" alt="*">
                        <option value="-" selected="selected">--Seleccione--</option>
                        <option value="1">Bachillerato General</option>
                        <option value="2">Ing. Industrial</option>
                        <option value="3">Lic. en Contabilidad</option>
                    </select>
                </td>                
            </tr>
            <tr>
                <td>Estado de la Carrera:</td>
                <td>
                    <select name="selNewEstadoCarreraCu" id="selNewEstadoCarreraCu" class="defaultSelect" title="Campo Requerido" alt="*">
                        <option value="-" selected="selected">--Seleccione--</option>
                        <option value="1">En proceso</option>
                        <option value="2">Finalizada</option>
                        <option value="3">Egresado</option>
                    </select>
                </td>                
            </tr>
            <tr>
                <td>A&ntilde;o de Inicio:</td>
                <td>
                    <input type="text" name="txtNewAnioIniCu" id="txtNewAnioIniCu" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>A&ntilde;o de Finalizaci&oacute;n:</td>
                <td>
                    <input type="text" name="txtNewAnioFinCu" id="txtNewAnioFinCu" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Observaciones:</td>
                <td>
                    <textarea rows="5" cols="16" name="txtNewObservacionCu" id="txtNewObservacionCu" class="defaultText"></textarea>
                </td>
            </tr>
        </table>
    </frm>
    <hr>
    <h1>Experiencia Laboral</h1>
    <frm name="frmExperenciaLaboral" id="frmExperenciaLaboral" action="#">
        <table>
            <tr>
                <td>Empresa:</td>
                <td>
                    <select name="selNewEmpresa" id="selNewEmpresa" class="defaultSelect">
                        <option value="-" selected="selected">--Seleccione--</option>
                        <option value="1">Siman</option>
                        <option value="2">Tipo</option>
                        <option value="3">Claro</option>
                        <option value="4">Eset</option>
                        <option value="5">Otros</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Periodo de inicio:</td>
                <td>
                    <input type="text" name="txtNewPeriodoIniCu" id="txtNewPeriodoIniCu" class="defaultText">
                </td>
            </tr>
            <tr>
                <td>Periodo de finalizaci&oacute;n:</td>
                <td>
                    <input type="text" name="txtNewPeriodoFinCu" id="txtNewPeriodoFinCu" class="defaultText">
                </td>
            </tr>
            <tr>
                <td>Cargo:</td>
                <td>
                    <input type="text" name="txtNewCargoCu" id="txtNewCargoCu" class="defaultText">
                </td>
            </tr>
            <tr>
                <td>Jefe inmediato:</td>
                <td>
                    <input type="text" name="txtNewJefeCu" id="txtNewJefeCu" class="defaultText">
                </td>
            </tr>
            <tr>
                <td>Tel&eacute;fono:</td>
                <td>
                    <input type="text" name="txtNewTelefonoCu" id="txtNewTelefonoCu" class="defaultText">
                </td>
            </tr>
            <tr>
                <td>No. Ext.:</td>
                <td>
                    <input type="text" name="txtNewExtJefeCu" id="txtNewExtJefeCu" class="defaultText">
                </td>
            </tr>            
        </table>
    </frm>
    <hr>
    <h1>Capacitaciones</h1>
    <form name="frmCapacitaciones" id="frmCapacitaciones" action="#">
        <table>
            <tr>
                <td>Descripci&oacute;n de Capacitaci&oacute;n:</td>
                <td>
                    <textarea rows="5" cols="16" name="txtNewCapacitacionCu" id="txtNewCapacitacionCu" class="defaultText"></textarea>                    
                </td>
            </tr>
            <tr>
                <td>A&ntilde;o de Capacitaci&oacute;n:</td>
                <td>
                    <input type="text" name="txtNewAnioCapCu" id="txtNewAnioCapCu" class="defaultText">
                </td>
            </tr>
        </table>        
    </form>
    <hr>
    <h1>Diplomas / Otros conocimientos</h1>
    <frm name="frmDiplomas" id="frmDiplomas" action="#">
        <table>
            <tr>
                <td>Descripci&oacute;n:</td>
                <td>
                    <textarea rows="5" cols="16" name="txtNewConocimientoCu" id="txtNewConocimientoCu" class="defaultText"></textarea>
                </td>
            </tr>
        </table>
    </frm>

    <hr>
    <h1>Experiencia de Equipo</h1>
    <frm name="frmNewExperienciaEquipo" id="frmNewExperienciaEquipo" action="#">
        <table>
            <tr>
                <td>Tipo de Equipo:</td>
                <td>
                    <select name="selNewTipoEquipo" id="selNewTipoEquipo" class="defaultSelect">                       
                        <option value="-">--Seleccione--</option>
                        <option value="1">El&eacute;ctrico</option>
                        <option value="2">Inform&aacute;tico</option>
                        <option value="3">Industrial</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Equipo Utilizado:</td>
                <td>
                    <select name="selNewEquipo" id="selNewEquipo" class="defaultSelect">                       
                        <option value="-">--Seleccione--</option>
                        <option value="1">Computadora</option>
                        <option value="2">Fresadora</option>
                        <option value="3">Contometro</option>
                    </select>
                </td>
            </tr>
        </table>
    </frm>

    <hr>
    <h1>Referencias Personales</h1>
    <frm name="frmReferenciaPersonal" id="frmReferenciaPersonal" action="#">
        <table>
            <tr>
                <td>Nombre:</td>
                <td>
                    <input type="text" name="txtNewRePeCu" id="txtNewRePeCu" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Tel&eacute;fono:</td>
                <td>
                    <input type="text" name="txtNewTePeCu" id="txtNewTePeCu" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Parentesco:</td>
                <td>
                    <select name="selNewPaPeCu" id="selNewPaPeCu" class="defaultSelect" title="Campo Requerido" alt="*">
                        <option value="-" selected="selected">--Seleccione--</option>
                        <option value="1">Padre</option>
                        <option value="2">Madre</option>
                        <option value="3">Amigo</option>
                        <option value="-">Vecino</option>
                    </select>
                </td>
            </tr>
        </table>                
    </frm>
    <hr>
    <h1>Referencias Laborales</h1>
    <frm name="frmReferenciaLaboral" id="frmReferenciaLaboral" action="#">
        <table>
            <tr>
                <td>Nombre:</td>
                <td>
                    <input type="text" name="txtNombreReLabCu" id="txtNombreReLabCu" class="defaultText">
                </td>
            </tr>
            <tr>
                <td>Tel&eacute;fono:</td>
                <td>
                    <input type="text" name="txtTelReLabCu" id="txtTelReLabCu" class="defaultText">
                </td>
            </tr>
            <tr>
                <td>No. Ext.:</td>
                <td>
                    <input type="text" name="txtExtReLabCu" id="txtExtReLabCu" class="defaultText">
                </td>
            </tr>            
        </table>
    </frm>
</div>