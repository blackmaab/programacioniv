<?php

/**
 * Description of AreaTrabajo
 *
 * @author malvarado
 */
include_once 'DataSource.class.php';

class AreaTrabajo extends DataSource {

    //Código Fuente

    public $idAreaTrabajo = null;
    public $descripcion;
    public $fijar;

    public function __construct() {
        $this->conexion(); //inicializa la conexion a la base de datos
        $this->conection->query("SET NAMES 'utf8'");
    }

    public function addAreaTrabajo() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "INSERT INTO area_empleo VALUES('',:descripcion)";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al guardar el AreaTrabajo: " . $e->getMessage() . "\n");
        }
    }

    public function searchAreaTrabajo() {
        try {

            $this->sqlQuery = "SELECT * FROM area_empleo WHERE descripcion like :descripcion";
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
                echo "<th>Editar</th>";
                echo "<th>Eliminar</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $cont = 1;
                while ($row = $this->resultSet->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td><b>" . ($cont++) . "</b></td>";
                    echo "<td>" . $row["descripcion"] . "</td>";
                    echo "<td align='center'><input type='image' src='images/edit.png' onclick='selAreaTrabajo(\"" . $row["idarea_empleo"] . "\",\"" . $row["descripcion"] . "\")'></td>";
                    echo "<td align='center'><input type='image' src='images/del.png' onclick='deleteAreaTrabajo(\"" . $row["idarea_empleo"] . "\")'></td></tr>";
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
            print_r("Error al consultar el AreaTrabajo: " . $e->getMessage() . "\n");
        }
    }

    public function updateAreaTrabajo() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "UPDATE area_empleo SET descripcion=:descripcion WHERE idarea_empleo=:idAreaTrabajo";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":idAreaTrabajo", $this->idAreaTrabajo);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al actualizar la AreaTrabajo: " . $e->getMessage() . "\n";
        }
    }

    public function deleteAreaTrabajo() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "DELETE FROM area_empleo WHERE idarea_empleo=:idAreaTrabajo";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":idAreaTrabajo", $this->idAreaTrabajo);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al eliminar AreaTrabajo: " . $e->getMessage() . "\n";
        }
    }

    public function cargarComboAreaTrabajo() {
        try {

            $this->sqlQuery = "SELECT * FROM area_empleo ORDER BY descripcion ASC";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            //$this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $coicidencias = $this->resultSet->rowCount();
            if ($coicidencias > 0) {
                $seleccionar = "";
                echo "<option value='-'>Elija un area de empleo</option>";
                while ($row = $this->resultSet->fetch(PDO::FETCH_ASSOC)) {
                    if ($this->fijar == $row["idarea_empleo"]) {
                        $seleccionar = "selected='selected'";
                    }
                    echo "<option value='" . $row["idarea_empleo"] . "' " . $seleccionar . ">" . $row["descripcion"] . "</option>";
                    $seleccionar = "";
                }
            } else {
                echo "<option value='-'>No hay datos</option>";
            }


            $this->borrarCache();
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al cargar el pais: " . $e->getMessage() . "\n");
        }
    }

}

?>
