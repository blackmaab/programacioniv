<frm name="frmCarrera" id="frmCarrera" action="#">
    <table>
        <tr>
            <td>Universidad:</td>
            <td><select name="selCarreraInstitucion" id="selCarreraInstitucion" class="defaultSelect" title="Campo Requerido" alt="*">                   
                </select>
            </td>
        </tr>
        <tr>
            <td>Carrera:</td>
            <td>
                <input type="text" name="txtDescripcionCarrera" id="txtDescripcionCarrera" title="Campo Requerido" class="defaultText" alt="*">
                <input type="button" id="btnCarrera" name="btnCarrera" value="Agregar">
                <input type="hidden" id="txtIdCarrera">
            </td>
        </tr>
    </table>
</frm>

<frm name="frmSearchCarrera" id="frmSearchCarrera">
    <table>
        <tr>
            <td>
                Buscar:
            </td>
            <td>
                <input type="text" name="txtSearchCarrera" id="txtSearchCarrera" title="Campo Requerido" class="defaultText" alt="*">
            </td>
            <td>
                <input type="button" name="btnSearchCarrera" id="btnSearchCarrera" value="Buscar">
            </td>
        </tr>
    </table>
</frm>
<hr>
<div id="searchCarrera" align="center"></div>
