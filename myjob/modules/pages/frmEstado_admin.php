<frm name="frmEstado" id="frmEstado" action="?mod=guardarEstado">
    <table>
        <tr>
            <td>Pais:</td>
            <td>
                <select name="selPaisEstado" id="selPaisEstado" class="defaultSelect" title="Campo Requerido" alt="*">
                    <option value='0'>Elija un pais</option>
                    <?php 
                    $consulta=$obj->consultar_paises();
                    while($row=$consulta->fetch(PDO::FETCH_OBJ)){
                        echo "<option value='".$row->idpais."'>".$row->descripcion."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nombre de nuevo estado:</td>
            <td>
                <input type="text" name="txtEstado" id="txtEstado" title="Campo Requerido" class="defaultText" alt="*">
            </td>
        </tr>    
        <tr>
            <td colspan="2" align="right"> 
                <input type="button" id="btnEstado" name="btnEstado" value="Agregar">
            </td>
        </tr>
    </table>
</frm>
