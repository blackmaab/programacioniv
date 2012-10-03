<div id="divFormulario">
    <h1>Identificaci&oacute;n</h1>
    <frm name="frmLogin" id="frmLogin" action="#">
        <table>
            <tr>
                <td>Usuario:</td>
                <td><input type="text" name="txtUsuario" id="txtUsuario" title="Campo Requerido" class="defaultText"></td>
            </tr>
            <tr>
                <td>Contrase&ntilde;a:</td>
                <td>
                    <input type="password" name="txtPassword" id="txtPassword" title="Campo Requerido" class="defaultText">
                </td>
            </tr>
            <tr>                
                <td colspan="2" align="right">
                    <input type="button" name="btnLogin" id="btnLogin" value="Entrar">                         
                </td>
            </tr>            
        </table>
    </frm>
    <strong>*Usuarios: admin, empresa, user; password es igual al nombre.</strong>
    <br>
    <br>
    <br>
    <br>
    <hr>
    <br>
    <br>      
    <h1>Registrate</h1>
    <frm name="frmNewUser" id="frmNewUser" action="#">
        <table>
            <tr>
                <td>Nombre de Usuario:</td>
                <td>
                    <input type="text" name="txtNewUser" id="txtNewUser" title="Campo Requerido" class="defaultText">
                </td>
            </tr>
            <tr>
                <td>Contrase&ntilde;a:</td>
                <td>
                    <input type="password" name="txtNewPassword" id="txtNewPassword" title="Campo Requerido" class="defaultText">
                </td>                    
            </tr>
            <tr>
                <td>Confirmaci&oacute;n de Contrase&ntilde;a:</td>
                <td>
                    <input type="password" name="txtNewPasswordConfirm" id="txtNewPasswordConfirm" title="Campo Requerido" class="defaultText">
                </td>
            </tr>
            <tr>
                <td>Tipo de usuario:</td>
                <td>
                    <select name="selNewTipoUser" id="selNewTipoUser" title="Campo Requerido" class="defaultSelect">
                        <option value="-">--Elige--</option>
                        <option value="c">Instituci&oacute;n | Empresa</option>
                        <option value="u">Persona</option>
                    </select>
                </td>
            </tr>

            <tr class="rowInstitucion">
                <td>Nombre de Instituci&oacute;n | Empresa:</td>
                <td>
                    <input type="text" name="txtNewEmpresa" id="txtNewEmpresa" class="defaultText" title="Campo Requerido">
                </td>
            </tr>

            <tr class="rowPersona">
                <td>Nombres:</td>
                <td>
                    <input type="text" name="txtNewNombres" id="txtNewNombres" class="defaultText" title="Campo Requerido">
                </td>                
            </tr>
            <tr class="rowPersona">
                <td>Apellidos:</td>
                <td>
                    <input type="text" name="txtNewApellidos" id="txtNewApellidos" class="defaultText" title="Campo Requerido">
                </td>
            </tr>


            <tr>
                <td colspan="2" align="right">
                    <input type="button" name="btnNewUser" id="btnNewUser" value="Registrar">
                </td>
            </tr>
        </table>
    </frm>
</div>
