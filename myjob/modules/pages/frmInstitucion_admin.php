<frm name="frmInstitucion" id="frmInstitucion" action="#">
    <table>
        <tr>
            <td>Pais:</td>
            <td>
                <select name="selPaisInstitucion" id="selPaisInstitucion" class="defaultSelect" title="Campo Requerido" alt="*">
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
            <td>Estado | Departamento:</td>
            <td>
                <select name="selEstadoInstitucion" id="selEstadoInstitucion" class="defaultSelect" title="Campo Requerido" alt="*">
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
            <td>Nivel de estudio:</td>
            <td><select name="selNivelEstudioInstitucion" id="selNivelEstudioInstitucion" class="defaultSelect" title="Campo Requerido" alt="*">
                    <option value="-">--Seleccione--</option>
                    <option value="1">Bachillerato</option>
                    <option value="2">Universidad</option>
                    <option value="3">Maestría</option>
                    <option value="4">Básica</option>
                </select></td>
        </tr>
        <tr>
            <td>Nombre de institución:</td>
            <td>
                <input type="text" name="txtDescripcionInst" id="txtDescripcionInst" title="Campo Requerido" class="defaultText" alt="*">
            </td>
        </tr>    
        <tr>
            <td colspan="2" align="right"> 
                <input type="button" id="btnInstitucion" name="btnInstitucion" value="Agregar">
            </td>
        </tr>
    </table>
</frm>
