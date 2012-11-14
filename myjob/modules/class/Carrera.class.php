<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carrera
 *
 * @author malvarado
 */
include_once 'DataSource.class.php';

class Carrera extends DataSource {

//Código Fuente

    public $idCarrera = null;
    public $descripcion;
    public $idInstitucion;

    public function __construct() {
        $this->conexion(); //inicializa la conexion a la base de datos
        $this->conection->query("SET NAMES 'utf8'");
    }

    public function addCarrera() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "INSERT INTO carrera VALUES('',:descripcion,:fk_institucion)";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":fk_institucion", $this->idInstitucion);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al guardar el carrera: " . $e->getMessage() . "\n");
        }
    }

    public function searchCarrera() {
        try {
            $this->sqlQuery = "SELECT a.* , b.descripcion AS universidad ";
            $this->sqlQuery.="FROM carrera AS a ";
            $this->sqlQuery.="INNER JOIN institucion AS b ON a.fk_institucion = b.idinstitucion ";
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
                echo "<th>Editar</th>";
                echo "<th>Eliminar</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $cont = 1;
                while ($row = $this->resultSet->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td><b>" . ($cont++) . "</b></td>";
                    echo "<td>" . $row["descripcion"] . "</td>";
                    echo "<td align='center'><input type='image' src='images/edit.png' onclick='selCarrera(\"" . $row["idcarrera"] . "\",\"" . $row["descripcion"] . "\",\"" . $row["fk_institucion"] . "\")'></td>";
                    echo "<td align='center'><input type='image' src='images/del.png' onclick='deleteCarrera(\"" . $row["idcarrera"] . "\")'></td></tr>";
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
            print_r("Error al consultar el carrera: " . $e->getMessage() . "\n");
        }
    }

    public function updateCarrera() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "UPDATE carrera SET descripcion=:descripcion,fk_institucion=:fk_institucion WHERE idcarrera=:idcarrera";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":fk_institucion", $this->idInstitucion);
            $this->resultSet->bindParam(":idcarrera", $this->idCarrera);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al actualizar la carrera: " . $e->getMessage() . "\n";
        }
    }

    public function deleteCarrera() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "DELETE FROM carrera WHERE idcarrera=:idcarrera";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":idcarrera", $this->idCarrera);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al eliminar carrera: " . $e->getMessage() . "\n";
        }
    }

    public function cargarComboCarrera() {
        try {

            $this->sqlQuery = "SELECT * FROM carrera ORDER BY descripcion ASC";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            //$this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $coicidencias = $this->resultSet->rowCount();
            if ($coicidencias > 0) {
                echo "<option value='-'>Elija un carrera</option>";
                while ($row = $this->resultSet->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row["idcarrera"] . "'>" . $row["descripcion"] . "</option>";
                }
            } else {
                echo "<option value='-'>No hay datos</option>";
            }


            $this->borrarCache();
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al cargar el carrera: " . $e->getMessage() . "\n");
        }
    }

}

?>
