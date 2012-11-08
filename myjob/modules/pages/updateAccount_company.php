<div id="divFormulario">
    <h1>Actualizaci&oacute;n de Credenciales</h1>
    <frm name="frmUpdateAccount" id="frmUpdateAccount" action="#">
        <table>                        
            <tr>
                <td>Contrase&ntilde;a:</td>
                <td>
                    <input type="password" name="txtPassword" id="txtPassword" title="Campo Requerido" class="defaultText" alt="*">
                </td>
            </tr>
            <tr>
                <td>Confirmar contrase&ntilde;a:</td>
                <td>
                    <input type="password" name="txtPasswordConfirm" id="txtPasswordConfirm" title="Campo Requerido" class="defaultText" alt="*">
                </td>
            </tr>
            <tr>                
                <td colspan="2" align="right">
                    <input type="button" name="btnUpdateAccount" id="btnUpdateAccount" value="Actualizar">                         
                </td>
            </tr>            
        </table>
    </frm>
    <hr>
    <h1>Actualizaci&oacute;n de Datos</h1>
    <frm name="frmDatosCompany" id="frmDatosCompany" action="#">
        <table>
            <tr>
                <td>Nombre de Empresa:</td>
                <td>
                    <input type="text" id="txtNombreEmpresa" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Misi&oacute;n:</td>
                <td>
                    <textarea rows="5" cols="16" name="txtMisionEmpresa"  id="txtMisionEmpresa" class="defaultText" title="Campo Requerido" alt="*"></textarea>
                </td>
            </tr>
            <tr>
                <td>Visi&oacute;n:</td>
                <td>
                    <textarea rows="5" cols="16" name="txtVisionEmpresa"  id="txtVisionEmpresa" class="defaultText" title="Campo Requerido" alt="*"></textarea>
                </td>
            </tr>
            <tr>
                <td>Logo:</td>
                <td>
                    <input type="file" name="fileLogoEmpresa" id="fileLogoEmpresa">
                </td>
            </tr>
            <tr>
                <td>Pais:</td>
                <td>
                    <select name="selPaisEmpresa" id="selPaisEmpresa" class="defaultSelect" title="Campo Requerido" alt="*">
                        <option value="-">--Seleccione--</option>
                        <option value="1">El Salvador</option>
                        <option value="2">Guatemala</option>
                        <option value="3">Honduras</option>
                        <option value="4">Costa Rica</option>
                        <option value="5">Nicaragua</option>
                        <option value="6">Panama</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Departamento | Estado:</td>
                <td>
                    <select name="selEstadoEmpresa" id="selEstadoEmpresa" class="defaultSelect" title="Campo Requerido" alt="*">
                        <option value="-">--Seleccione--</option>
                        <option value="1">San Salvador</option>
                        <option value="2">Santa Ana</option>
                        <option value="3">San Miguel</option>
                        <option value="4">Ahuachapan</option>
                        <option value="5">Sonsonate</option>
                        <option value="6">La Libertad</option>
                        <option value="7">Cuscatlan</option>
                        <option value="8">Chalatenango</option>
                        <option value="9">Caba&ntilde;as</option>
                        <option value="9">Caba&ntilde;as</option>
                        <option value="11">La Paz</option>
                        <option value="12">Usulut&aacute;n</option>
                        <option value="13">Morazan</option>
                        <option value="14">La Unión</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Direcci&oacute;n:</td>
                <td>
                    <textarea rows="5" cols="16" name="txtDireccionEmpresa"  id="txtDirecionEmpresa" class="defaultText" title="Campo Requerido" alt="*"></textarea>
                </td>
            </tr>
            <tr>
                <td>Tel&eacute;fono:</td>
                <td>
                    <input type="text" id="txtTelefonoEmpresa" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Correo Electronico:</td>
                <td>
                    <input type="text" id="txtEmailEmpresa" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>P&aacute;gina Web:</td>
                <td>
                    <input type="text" id="txtPaginaEmpresa" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
             <tr>                 
                 <td colspan="2" align="right">
                     <input type="button" id="btnDatosEmpresa" value="Actualizar">
                </td>
            </tr>
        </table>
    </frm>
</div>