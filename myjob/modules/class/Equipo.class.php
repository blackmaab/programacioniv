<?php

/**
 * Description of Equipo
 *
 * @author malvarado
 */
include_once 'DataSource.class.php';

class Equipo extends DataSource {

    //Código Fuente

    public $idEquipo = null;
    public $descripcion;
    public $idTipoEquipo;

    public function __construct() {
        $this->conexion(); //inicializa la conexion a la base de datos
        $this->conection->query("SET NAMES 'utf8'");
    }

    public function addEquipo() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "INSERT INTO herramienta_equipo VALUES('',:descripcion,:fk_equipo)";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":fk_equipo", $this->idTipoEquipo);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al guardar el equipo: " . $e->getMessage() . "\n");
        }
    }

    public function searchEquipo() {
        try {

            $this->sqlQuery = "SELECT a.* , b.descripcion AS tipo ";
            $this->sqlQuery.="FROM herramienta_equipo AS a ";
            $this->sqlQuery.="INNER JOIN tipo_equipo_herramienta AS b ON a.fk_equipo = b.idtipo_equipo_herramienta ";
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
                echo "<th>Tipo de Equipo</th>";
                echo "<th>Editar</th>";
                echo "<th>Eliminar</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $cont = 1;
                while ($row = $this->resultSet->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td><b>" . ($cont++) . "</b></td>";
                    echo "<td>" . $row["descripcion"] . "</td>";
                    echo "<td>" . $row["tipo"] . "</td>";
                    echo "<td align='center'><input type='image' src='images/edit.png' onclick='selEquipo(\"" . $row["idherramienta_equipo"] . "\",\"" . $row["descripcion"] . "\",\"" . $row["fk_equipo"] . "\")'></td>";
                    echo "<td align='center'><input type='image' src='images/del.png' onclick='deleteEquipo(\"" . $row["idherramienta_equipo"] . "\")'></td></tr>";
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
            print_r("Error al consultar el equipo: " . $e->getMessage() . "\n");
        }
    }

    public function updateEquipo() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "UPDATE herramienta_equipo SET descripcion=:descripcion,fk_equipo=:fk_equipo WHERE idherramienta_equipo=:idequipo";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":fk_equipo", $this->idTipoEquipo);
            $this->resultSet->bindParam(":idequipo", $this->idEquipo);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al actualizar la equipo: " . $e->getMessage() . "\n";
        }
    }

    public function deleteEquipo() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "DELETE FROM herramienta_equipo WHERE idherramienta_equipo=:idequipo";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":idequipo", $this->idEquipo);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al eliminar equipo: " . $e->getMessage() . "\n";
        }
    }

    public function cargarComboEquipo() {
        try {

            $this->sqlQuery = "SELECT * FROM equipo ORDER BY descripcion ASC";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            //$this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $coicidencias = $this->resultSet->rowCount();
            if ($coicidencias > 0) {
                echo "<option value='-'>Elija un equipo</option>";
                while ($row = $this->resultSet->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row["idequipo"] . "'>" . $row["descripcion"] . "</option>";
                }
            } else {
                echo "<option value='-'>No hay datos</option>";
            }


            $this->borrarCache();
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al cargar el equipo: " . $e->getMessage() . "\n");
        }
    }

}

?>
