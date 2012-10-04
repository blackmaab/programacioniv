<frm name="frmEstado" id="frmEstado" action="#">
    <table>
        <tr>
            <td>Pais:</td>
            <td>
                <select name="selPaisEstado" id="selPaisEstado" class="defaultSelect" title="Campo Requerido" alt="*">
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
            <td>Nombre de nuevo estado:</td>
            <td>
                <input type="text" name="txtEstado" id="txtEstado" title="Campo Requerido" class="defaultText" alt="*">
            </td>
        </tr>    
        <tr>
            <td colspan="2" align="right"> 
                <input type="button" id="btnEstado" name="btnEstado" value="Agregar">
            </td>
        </tr>
    </table>
</frm>
