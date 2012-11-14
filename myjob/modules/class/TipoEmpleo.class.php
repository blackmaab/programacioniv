<?php

/**
 * Description of TipoEmpleo
 *
 * @author malvarado
 */
include_once 'DataSource.class.php';

class TipoEmpleo extends DataSource {

    //Código Fuente

    public $idTipoEmpleo = null;
    public $descripcion;
    public $idAreaEmpleo;

    public function __construct() {
        $this->conexion(); //inicializa la conexion a la base de datos
        $this->conection->query("SET NAMES 'utf8'");
    }

    public function addTipoEmpleo() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "INSERT INTO cargo_empleo VALUES('',:descripcion,:fk_areaEmpleo)";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":fk_areaEmpleo", $this->idAreaEmpleo);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al guardar el tipoEmpleo: " . $e->getMessage() . "\n");
        }
    }

    public function searchTipoEmpleo() {
        try {

            $this->sqlQuery = "SELECT a.* , b.descripcion as area ";
            $this->sqlQuery.="FROM cargo_empleo AS a ";
            $this->sqlQuery.="INNER JOIN area_empleo AS b ON a.fk_areaEmpleo = b.idarea_empleo ";
            $this->sqlQuery.="WHERE a.descripcion LIKE :descripcion ";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $coicidencias = $this->resultSet->rowCount();
            $datos = "";
            if ($coicidencias > 0) {
                echo "<table class='ui-widget ui-widget-content' >";
                echo "<thead>";
                echo "<tr class='ui-widget-header'>";
                echo "<th>#</th>";
                echo "<th>Descripción</th>";
                echo "<th>Area</th>";
                echo "<th>Editar</th>";
                echo "<th>Eliminar</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $cont = 1;
                while ($row = $this->resultSet->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td><b>" . ($cont++) . "</b></td>";
                    echo "<td>" . $row["descripcion"] . "</td>";
                    echo "<td>" . $row["area"] . "</td>";
                    echo "<td align='center'><input type='image' src='images/edit.png' onclick='selTipoEmpleo(\"" . $row["idcargo_empleo"] . "\",\"" . $row["descripcion"] . "\",\"".$row["fk_areaEmpleo"]."\")'></td>";
                    echo "<td align='center'><input type='image' src='images/del.png' onclick='deleteTipoEmpleo(\"" . $row["idcargo_empleo"] . "\")'></td></tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<h1>No se encontraron coicidencias</h1>";
            }


            $this->borrarCache();
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al consultar el tipoEmpleo: " . $e->getMessage() . "\n");
        }
    }

    public function updateTipoEmpleo() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "UPDATE cargo_empleo SET descripcion=:descripcion,fk_areaEmpleo=:fk_areaEmpleo WHERE idcargo_empleo=:idtipoEmpleo";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":fk_areaEmpleo", $this->idAreaEmpleo);
            $this->resultSet->bindParam(":idtipoEmpleo", $this->idTipoEmpleo);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al actualizar la tipoEmpleo: " . $e->getMessage() . "\n";
        }
    }

    public function deleteTipoEmpleo() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "DELETE FROM cargo_empleo WHERE idcargo_empleo=:idtipoEmpleo";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":idtipoEmpleo", $this->idTipoEmpleo);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al eliminar tipoEmpleo: " . $e->getMessage() . "\n";
        }
    }

    public function cargarComboTipoEmpleo() {
        try {

            $this->sqlQuery = "SELECT * FROM tipoEmpleo ORDER BY descripcion ASC";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            //$this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $coicidencias = $this->resultSet->rowCount();
            if ($coicidencias > 0) {
                echo "<option value='-'>Elija un tipoEmpleo</option>";
                while ($row = $this->resultSet->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row["idtipoEmpleo"] . "'>" . $row["descripcion"] . "</option>";
                }
            } else {
                echo "<option value='-'>No hay datos</option>";
            }


            $this->borrarCache();
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al cargar el tipoEmpleo: " . $e->getMessage() . "\n");
        }
    }

}

?>
