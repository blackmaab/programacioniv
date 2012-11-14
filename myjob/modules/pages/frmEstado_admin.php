<frm name="frmEstado" id="frmEstado" action="?mod=guardarEstado">
    <table>
        <tr>
            <td>Estado:</td>
            <td>
                <select name="selEstadoEstado" id="selEstadoEstado" class="defaultSelect" title="Campo Requerido" alt="*">
                </select>
            </td>
        </tr>
        <tr>
            <td>Nombre de nuevo estado:</td>
            <td>
                <input type="text" name="txtEstado" id="txtEstado" title="Campo Requerido" class="defaultText" alt="*">        
                <input type="button" id="btnEstado" name="btnEstado" value="Agregar">
                <input type="hidden" id="txtIdEstado">
            </td>
        </tr>
    </table>
</frm>

<frm name="frmSearchEstado" id="frmSearchEstado">
    <table>
        <tr>
            <td>
                Buscar:
            </td>
            <td>
                <input type="text" name="txtSearchEstado" id="txtSearchEstado" title="Campo Requerido" class="defaultText" alt="*">
            </td>
            <td>
                <input type="button" name="btnSearchEstado" id="btnSearchEstado" value="Buscar">
            </td>
        </tr>
    </table>
</frm>
<hr>
<div id="searchEstado" align="center"></div>
