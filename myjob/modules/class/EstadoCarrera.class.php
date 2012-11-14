<?php

/**
 * Nombre de Archivo: EstadoCarrera.class.php
 * @author Mario Alvarado
 */
include_once 'DataSource.class.php';

class EstadoCarrera extends DataSource{
//Código Fuente
    //Código Fuente

    public $idEstadoCarrera = null;
    public $descripcion;

    public function __construct() {
        $this->conexion(); //inicializa la conexion a la base de datos
        $this->conection->query("SET NAMES 'utf8'");
    }

    public function addEstadoCarrera() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "INSERT INTO estado_carrera VALUES('',:descripcion)";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al guardar el EstadoCarrera: " . $e->getMessage() . "\n");
        }        
    }

    public function searchEstadoCarrera() {
        try {

            $this->sqlQuery = "SELECT * FROM estado_carrera WHERE descripcion like :descripcion";
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
                    echo "<td align='center'><input type='image' src='images/edit.png' onclick='selEstadoCarrera(\"" . $row["idestado_carrera"] . "\",\"" . $row["descripcion"] . "\")'></td>";
                    echo "<td align='center'><input type='image' src='images/del.png' onclick='deleteEstadoCarrera(\"" . $row["idestado_carrera"] . "\")'></td></tr>";
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
            print_r("Error al consultar el EstadoCarrera: " . $e->getMessage() . "\n");
        }
    }

    public function updateEstadoCarrera() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "UPDATE estado_carrera SET descripcion=:descripcion WHERE idestado_carrera=:idEstadoCarrera";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":idEstadoCarrera", $this->idEstadoCarrera);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al actualizar la Estado Carrera: " . $e->getMessage() . "\n";
        }
    }

    public function deleteEstadoCarrera() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "DELETE FROM estado_carrera WHERE idestado_carrera=:idEstadoCarrera";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":idEstadoCarrera", $this->idEstadoCarrera);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al eliminar Estado Carrera: " . $e->getMessage() . "\n";
        }
    }

}

?>
