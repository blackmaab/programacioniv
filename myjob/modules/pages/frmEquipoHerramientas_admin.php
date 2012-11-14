<frm name="frmEquipo" id="frmEquipo" action="#">
    <table>
        <tr>
            <td><h4>Agregar un nuevo Equipo o Herramientas.</h4></td>
        </tr>
        <tr>
            <td>Tipo Equipo/Herramienta:
                <select name="selEH" id="selEH" class="defaultSelect" title="Campo Requerido" alt="*">
                </select>
            </td>
        </tr>

        <tr>
            <td>Descripci&oacute;n:
                <input type="text" id="txtDescripcionEH" name="txtDescripcionEH" class="defaultText" title="Campo Requrido" alt="*"/>
                <input type="hidden" id="txtIdEquipo">
                <input type="button" id="btnEH" name="btnEH" value="Agregar">
            </td>
        </tr>
    </table>
</frm>

<frm name="frmSearchEquipo" id="frmSearchEquipo">
    <table>
        <tr>
            <td>
                Buscar:
            </td>
            <td>
                <input type="text" name="txtSearchEquipo" id="txtSearchEquipo" title="Campo Requerido" class="defaultText" alt="*">
            </td>
            <td>
                <input type="button" name="btnSearchEquipo" id="btnSearchEquipo" value="Buscar">
            </td>
        </tr>
    </table>
</frm>
<hr>
<div id="searchEquipo" align="center"></div>
