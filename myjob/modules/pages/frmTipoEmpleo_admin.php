<frm name="frmTipoEmpleo" id="frmTipoEmpleo" action="#">
    <table>
        <tr>
            <td>Area de Empleo:</td>
            <td><select name="selAreaTipoEmpleo" id="selAreaTipoEmpleo" class="defaultSelect" title="Campo Requerido" alt="*">

                </select></td>
        </tr>
        <tr>
            <td>Tipo de empleo:</td>
            <td>
                <input type="text" name="txtTipoEmpleo" id="txtTipoEmpleo" title="Campo Requerido" class="defaultText" alt="*">
                <input type="hidden" id="txtIdTipoEmpleo">
                <input type="button" id="btnTipoEmpleo" name="btnTipoEmpleo" value="Agregar">
            </td>
        </tr>
    </table>
</frm>

<frm name="frmSearchTipoEmpleo" id="frmSearchTipoEmpleo">
    <table>
        <tr>
            <td>
                Buscar:
            </td>
            <td>
                <input type="text" name="txtSearchTipoEmpleo" id="txtSearchTipoEmpleo" title="Campo Requerido" class="defaultText" alt="*">
            </td>
            <td>
                <input type="button" name="btnSearchTipoEmpleo" id="btnSearchTipoEmpleo" value="Buscar">
            </td>
        </tr>
    </table>
</frm>
<hr>
<div id="searchTipoEmpleo" align="center"></div>
