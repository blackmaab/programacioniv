<?php

/**
 * Description of TipoEquipoHerramienta
 *
 * @author malvarado
 */
include_once 'DataSource.class.php';

class TipoEquipoHerramienta extends DataSource {

//Código Fuente

    public $idTipoEquipoHerramienta = null;
    public $descripcion;
    public $fijar;

    public function __construct() {
        $this->conexion(); //inicializa la conexion a la base de datos
        $this->conection->query("SET NAMES 'utf8'");
    }

    public function addTipoEquipoHerramienta() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "INSERT INTO tipo_equipo_herramienta VALUES('',:descripcion)";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al guardar el TipoEquipoHerramienta: " . $e->getMessage() . "\n");
        }
    }

    public function searchTipoEquipoHerramienta() {
        try {

            $this->sqlQuery = "SELECT * FROM tipo_equipo_herramienta WHERE descripcion like :descripcion";
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
                    echo "<td align='center'><input type='image' src='images/edit.png' onclick='selTipoEquipoHerramienta(\"" . $row["idtipo_equipo_herramienta"] . "\",\"" . $row["descripcion"] . "\")'></td>";
                    echo "<td align='center'><input type='image' src='images/del.png' onclick='deleteTipoEquipoHerramienta(\"" . $row["idtipo_equipo_herramienta"] . "\")'></td></tr>";
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
            print_r("Error al consultar el TipoEquipoHerramienta: " . $e->getMessage() . "\n");
        }
    }

    public function updateTipoEquipoHerramienta() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "UPDATE tipo_equipo_herramienta SET descripcion=:descripcion WHERE idtipo_equipo_herramienta=:idTipoEquipoHerramienta";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":idTipoEquipoHerramienta", $this->idTipoEquipoHerramienta);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al actualizar la TipoEquipoHerramienta: " . $e->getMessage() . "\n";
        }
    }

    public function deleteTipoEquipoHerramienta() {

        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "DELETE FROM tipo_equipo_herramienta WHERE idtipo_equipo_herramienta=:idTipoEquipoHerramienta";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":idTipoEquipoHerramienta", $this->idTipoEquipoHerramienta);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al eliminar TipoEquipoHerramienta: " . $e->getMessage() . "\n";
        }
    }

    public function cargarTipoEquipoHerramienta() {
        try {

            $this->sqlQuery = "SELECT * FROM tipo_equipo_herramienta ORDER BY descripcion ASC";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            //$this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $coicidencias = $this->resultSet->rowCount();
            if ($coicidencias > 0) {
                echo "<option value='-'>Elija un tipo de equipo</option>";
                $seleccionar = "";
                while ($row = $this->resultSet->fetch(PDO::FETCH_ASSOC)) {
                    if ($this->fijar == $row["idtipo_equipo_herramienta"]) {
                        $seleccionar = "selected='selected'";
                    }
                    echo "<option value='" . $row["idtipo_equipo_herramienta"] . "' " . $seleccionar . ">" . $row["descripcion"] . "</option>";
                    $seleccionar = "";
                }
            } else {
                echo "<option value='-'>No hay datos</option>";
            }


            $this->borrarCache();
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al cargar el tipoEquipoHerramienta: " . $e->getMessage() . "\n");
        }
    }

}

?>
