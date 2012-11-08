<frm name="frmEquipo" id="frmEquipo" action="#">
    <table>
        <tr>
            <td><h4>Agregar un nuevo Equipo o Herramientas.</h4></td>
        </tr>
        <tr>
            <td>Tipo Equipo/Herramienta:</td>
            <td><select name="selEH" id="selEH" class="defaultSelect" title="Campo Requerido" alt="*">
                    <option value="-">--Seleccione--</option>
                    <option value="1">El&eacute;ctrico</option>
                    <option value="2">Inform&aacute;tico</option>
                    <option value="3">Industrial</option>
                </select></td>
        </tr>
        
        <tr>
            <td>Descripci&oacute;n:</td>
            <td><input type="text" id="txtDescripcionEH" name="txtDescripcionEH" class="defaultText" title="Campo Requrido" alt="*"/></td>
        </tr> 
        <tr>
            <td colspan="2" align="right"> 
                <input type="button" id="btnEH" name="btnEH" value="Agregar">
            </td>
        </tr>
    </table>
</frm>
