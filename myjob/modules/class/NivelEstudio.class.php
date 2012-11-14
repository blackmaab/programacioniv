<?php

/**
 * Nombre de Archivo: NivelEstudio.class.php
 * @author Mario Alvarado
 */

include_once 'DataSource.class.php';

class NivelEstudio extends DataSource {
//Código Fuente
    
    //Código Fuente

    public $idNivelEstudio = null;
    public $descripcion;

    public function __construct() {
        $this->conexion(); //inicializa la conexion a la base de datos
        $this->conection->query("SET NAMES 'utf8'");
    }

    public function addNivelEstudio() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "INSERT INTO nivel_estudio VALUES('',:descripcion)";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al guardar el NivelEstudio: " . $e->getMessage() . "\n");
        }
    }

    public function searchNivelEstudio() {
        try {

            $this->sqlQuery = "SELECT * FROM nivel_estudio WHERE descripcion like :descripcion";
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
                    echo "<td align='center'><input type='image' src='images/edit.png' onclick='selNivelEstudio(\"" . $row["idnivel_estudio"] . "\",\"" . $row["descripcion"] . "\")'></td>";
                    echo "<td align='center'><input type='image' src='images/del.png' onclick='deleteNivelEstudio(\"" . $row["idnivel_estudio"] . "\")'></td></tr>";
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
            print_r("Error al consultar el NivelEstudio: " . $e->getMessage() . "\n");
        }
    }

    public function updateNivelEstudio() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "UPDATE nivel_estudio SET descripcion=:descripcion WHERE idnivel_estudio=:idNivelEstudio";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":idNivelEstudio", $this->idNivelEstudio);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al actualizar la NivelEstudio: " . $e->getMessage() . "\n";
        }
    }

    public function deleteNivelEstudio() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "DELETE FROM nivel_estudio WHERE idnivel_estudio=:idNivelEstudio";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":idNivelEstudio", $this->idNivelEstudio);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al eliminar NivelEstudio: " . $e->getMessage() . "\n";
        }
    }

}

?>
