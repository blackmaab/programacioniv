<div id="divFormulario">
    <h1>Creaci&oacute;n de oferta de empleo</h1>
    <frm name="frmNewAnuncio" id="frmNewAnuncio" action="#">
        <table>
            <tr>
                <td>Titulo:</td>
                <td>
                    <input type="text" name="txtNewTitulo" id="txtNewTitulo" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Area empleo:</td>
                <td>
                    <select name="selNewAreaEmpleo" id="selNewAreaEmpleo" class="defaultSelect" title="Campo Requerido" alt="*">
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td>Cargo:</td>
                <td>
                    <select name="selNewCargoEmpleo" id="selNewCargoEmpleo" class="defaultSelect" title="Campo Requerido" alt="*">
                        <option value="-">seleccione el area de empleo</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Vacantes:</td>
                <td>
                    <input type="text" name="txtNewVacantes" id="txtNewVacantes" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Tipo de Contrataci&oacute;n:</td>
                <td>
                    <input type="text" name="txtNewContratacion" id="txtNewContratacion" class="defaultText" title="Campo Requerido" alt="*"> 
                </td>
            </tr>
            <tr>
                <td>Nivel de Experiencia:</td>
                <td>
                    <input type="text" name="txtNewNivelExperiencia" id="txtNewNivelExperiencia" class="defaultText" title="Campo Requerido" alt="*">
                </td>                    
            </tr>
            <tr>
                <td>Genero:</td>
                <td>
                    <input type="text" name="txtNewGenero" id="txtNewGenero" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Rango de Edad:</td>
                <td>
                    <input type="text" name="txtNewRangoEdad" id="txtNewRangoEdad" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Salario Minimo:</td>
                <td>
                    <input type="text" name="txtNewSalarioMinimo" id="txtNewSalarioMinimo" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Salario M&aacute;ximo:</td>
                <td>
                    <input type="text" name="txtNewSalarioMaximo" id="txtNewSalarioMaximo" class="defaultText" title="Campo Requerido" alt="*">
                </td>
            </tr>
            <tr>
                <td>Pais:</td>
                <td>
                    <select name="selNewPais" id="selNewPais" class="defaultSelect" title="Campo Requerido" alt="*">
                        <option value="-">--Seleccione--</option>
                        <option value="1">El Salvador</option>
                        <option value="2">Honduras</option>
                        <option value="3">Guatemala</option>
                        <option value="4">Costa Rica</option>
                        <option value="5">M&eacute;xico</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Departamento | Estado:</td>
                <td>
                    <select name="selNewDep" id="selNewDep" class="defaultSelect" title="Campo Requerido" alt="*">
                        <option value="-">--Seleccione--</option>
                        <option value="1">San Salvador</option>
                        <option value="2">Managua</option>
                        <option value="3">San Jos&eacute;</option>
                        <option value="4">Guatemala</option>
                        <option value="5">M&eacute;xico D.F.</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Requisitos:</td>
                <td>
                    <textarea cols="16" rows="6" name="txtNewRequisitos" id="txtNewRequisitos" class="defaultText" title="Campo Requerido" alt="*"></textarea>
                </td>
            </tr>
            <tr>
                <td>Descripci&oacute; del Empleo:</td>
                <td>
                    <textarea cols="16" rows="6" name="txtNewEmpleo" id="txtNewEmpleo" class="defaultText" title="Campo Requerido" alt="*"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="button" name="btnNewAnuncio" id="btnNewAnuncio" value="Publicar">
                </td>
            </tr>
        </table>
    </frm>
</div>