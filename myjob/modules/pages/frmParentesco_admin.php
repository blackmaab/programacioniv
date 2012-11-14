<frm name="frmParentesco" id="frmParentesco" action="#">
    <table>
        <tr>
            <td><h4>Agregar un nuevo Tipo de Parentesco.</h4></td>
        </tr>
        <tr>
            <td>Nuevo parentesco:</td>
            <td><input type="text" id="txtParentesco" name="txtParentesco" title="Campo Requerido"  class="defaultText" alt="*"/></td>        
            <td> 
                <input type="button" id="btnParentesco" name="btnParentesco" value="Agregar">
                <input type="hidden" id="txtIdParentesco">
            </td>
        </tr>
    </table>
</frm>
<frm name="frmSearchParentesco" id="frmSearchParentesco">
    <table>
        <tr>
            <td>
                Buscar:
            </td>
            <td>
                <input type="text" name="txtSearchParentesco" id="txtSearchParentesco" title="Campo Requerido" class="defaultText" alt="*">
            </td>
            <td>
                <input type="button" name="btnSearchParentesco" id="btnSearchParentesco" value="Buscar">
            </td>
        </tr>
    </table>
</frm>
<hr>
<div id="searchParentesco" align="center"></div>
