<?php

/**
 * Nombre de Archivo: Parentesco.class.php
 * @author Mario Alvarado
 */
include_once 'DataSource.class.php';

class Parentesco extends DataSource {

    //Código Fuente

    public $idParentesco = null;
    public $descripcion;

    public function __construct() {
        $this->conexion(); //inicializa la conexion a la base de datos
        $this->conection->query("SET NAMES 'utf8'");
    }

    public function addParentesco() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "INSERT INTO parentesco VALUES('',:descripcion)";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al guardar el Parentesco: " . $e->getMessage() . "\n");
        }
    }

    public function searchParentesco() {
        try {

            $this->sqlQuery = "SELECT * FROM parentesco WHERE descripcion like :descripcion";
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
                    echo "<td align='center'><input type='image' src='images/edit.png' onclick='selParentesco(\"" . $row["idparentesco"] . "\",\"" . $row["descripcion"] . "\")'></td>";
                    echo "<td align='center'><input type='image' src='images/del.png' onclick='deleteParentesco(\"" . $row["idparentesco"] . "\")'></td></tr>";
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
            print_r("Error al consultar el Parentesco: " . $e->getMessage() . "\n");
        }
    }

    public function updateParentesco() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "UPDATE parentesco SET descripcion=:descripcion WHERE idparentesco=:idParentesco";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":idParentesco", $this->idParentesco);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al actualizar la Parentesco: " . $e->getMessage() . "\n";
        }
    }

    public function deleteParentesco() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "DELETE FROM parentesco WHERE idparentesco=:idParentesco";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":idParentesco", $this->idParentesco);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al eliminar Parentesco: " . $e->getMessage() . "\n";
        }
    }

}

?>
