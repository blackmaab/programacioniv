<frm name="frmInstitucion" id="frmInstitucion" action="#">
    <table>
        <tr>
            <td>Pais:</td>
            <td>
                <select name="selPaisInstitucion" id="selPaisInstitucion" class="defaultSelect" title="Campo Requerido" alt="*">                                      
                </select>
            </td>
        </tr>
        <tr>
            <td>Estado | Departamento:</td>
            <td>
                <select name="selEstadoInstitucion" id="selEstadoInstitucion" class="defaultSelect" title="Campo Requerido" alt="*">
                    <option value="-">--Seleccione el Pais--</option>                    
                </select>
            </td>
        </tr>
        <tr>
            <td>Nivel de estudio:</td>
            <td><select name="selNivelEstudioInstitucion" id="selNivelEstudioInstitucion" class="defaultSelect" title="Campo Requerido" alt="*">                    
                </select>
            </td>
        </tr>
        <tr>
            <td>Nombre de institución:</td>
            <td>
                <input type="text" name="txtDescripcionInst" id="txtDescripcionInst" title="Campo Requerido" class="defaultText" alt="*">

                <input type="hidden" id="txtIdInstitucion">
                <input type="button" id="btnInstitucion" name="btnInstitucion" value="Agregar">
            </td>
        </tr>
    </table>
</frm>


<frm name="frmSearchInstitucion" id="frmSearchInstitucion">
    <table>
        <tr>
            <td>
                Buscar:
            </td>
            <td>
                <input type="text" name="txtSearchInstitucion" id="txtSearchInstitucion" title="Campo Requerido" class="defaultText" alt="*">
            </td>
            <td>
                <input type="button" name="btnSearchInstitucion" id="btnSearchInstitucion" value="Buscar">
            </td>
        </tr>
    </table>
</frm>
<hr>
<div id="searchInstitucion" align="center"></div>
