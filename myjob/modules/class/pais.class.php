<?php

/**
 * Nombre de Archivo: pais.class.php
 * @author Mario Alvarado
 */
include_once 'DataSource.class.php';

class Pais extends DataSource {

//Código Fuente

    public $idPais = null;
    public $descripcion;

    public function __construct() {
        $this->conexion(); //inicializa la conexion a la base de datos
        $this->conection->query("SET NAMES 'utf8'");
    }

    public function addPais() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "INSERT INTO pais VALUES('',:descripcion)";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al guardar el pais: " . $e->getMessage() . "\n");
        }
    }

    public function searchPais() {
        try {

            $this->sqlQuery = "SELECT * FROM pais WHERE descripcion like :descripcion";
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
                    echo "<td align='center'><input type='image' src='images/edit.png' onclick='selPais(\"" . $row["idpais"] . "\",\"" . $row["descripcion"] . "\")'></td>";
                    echo "<td align='center'><input type='image' src='images/del.png' onclick='deletePais(\"" . $row["idpais"] . "\")'></td></tr>";
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
            print_r("Error al consultar el pais: " . $e->getMessage() . "\n");
        }
    }

    public function updatePais() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "UPDATE pais SET descripcion=:descripcion WHERE idpais=:idpais";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":idpais", $this->idPais);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al actualizar la pais: " . $e->getMessage() . "\n";
        }
    }

    public function deletePais() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "DELETE FROM pais WHERE idpais=:idpais";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":idpais", $this->idPais);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al eliminar pais: " . $e->getMessage() . "\n";
        }
    }

    public function cargarComboPais() {
        try {

            $this->sqlQuery = "SELECT * FROM pais ORDER BY descripcion ASC";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            //$this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $coicidencias = $this->resultSet->rowCount();
            if ($coicidencias > 0) {
                echo "<option value='-'>Elija un pais</option>";
                while ($row = $this->resultSet->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row["idpais"] . "'>" . $row["descripcion"] . "</option>";
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
