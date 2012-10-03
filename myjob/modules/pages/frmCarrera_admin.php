<frm name="frmCarrera" id="frmCarrera" action="#">
    <table>
        <tr>
            <td>Universidad:</td>
            <td><select name="selInstitucion" id="selInstitucion" class="defaultSelect">
                    <option value="-">--Seleccione--</option>
                    <option value="1">Universidad Francisco Gavidia</option>
                    <option value="2">Universidad El Salvador</option>
                    <option value="3">Universidad Don Bosco</option>
                    <option value="4">Universidad Tecnol&oacute;gica</option>
                    <option value="5">Universidad Evang&eacute;lica de El Salvador</option>
                    <option value="6">Universidad Centroam&eacute;ricana Jos&eacute; Sime&oacute;n Ca&ntilde;as</option>
                    
                </select></td>
        </tr>
        <tr>
            <td>Nombre de institución:</td>
            <td>
                <input type="text" name="txtDescripcionCarrera" id="txtDescripcionInst" title="Campo Requerido" class="defaultText">
            </td>
        </tr>    
        <tr>
            <td colspan="2" align="right"> 
                <input type="button" id="btnCarrera" name="btnCarrera" value="Agregar">
            </td>
        </tr>
    </table>
</frm>
