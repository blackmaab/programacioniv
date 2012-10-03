<frm name="frmTipoEmpleo" id="frmTipoEmpleo" action="#">
    <table>
        <tr>
            <td>Area de Empleo:</td>
            <td><select name="selArea" id="selArea" class="defaultSelect">
                    <option value="-">--Seleccione--</option>
                    <option value="1">Informatica</option>
                    <option value="2">Electronica</option>
                    <option value="3">Industrial</option>
                    <option value="4">Mecanica</option>
                </select></td>
        </tr>
        <tr>
            <td>Tipo de empleo:</td>
            <td>
                <input type="text" name="txtTipoEmpleo" id="txtTipoEmpleo" title="Campo Requerido" class="defaultText">
            </td>
        </tr>    
        <tr>
            <td colspan="2" align="right"> 
                <input type="button" id="btnTipoEmpleo" name="btnTipoEmpleo" value="Agregar">
            </td>
        </tr>
    </table>
</frm>
