<?php

/**
 * Nombre de Archivo: TipoDocumento.class.php
 * @author Mario Alvarado
 */
include_once 'DataSource.class.php';

class TipoDocumento extends DataSource {

    //Código Fuente

    public $idTipoDocumento = null;
    public $descripcion;

    public function __construct() {
        $this->conexion(); //inicializa la conexion a la base de datos
        $this->conection->query("SET NAMES 'utf8'");
    }

    public function addTipoDocumento() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "INSERT INTO tipo_documento VALUES('',:descripcion)";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al guardar el TipoDocumento: " . $e->getMessage() . "\n");
        }
    }

    public function searchTipoDocumento() {
        try {

            $this->sqlQuery = "SELECT * FROM tipo_documento WHERE descripcion like :descripcion";
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
                    echo "<td align='center'><input type='image' src='images/edit.png' onclick='selTipoDocumento(\"" . $row["idtipo_documento"] . "\",\"" . $row["descripcion"] . "\")'></td>";
                    echo "<td align='center'><input type='image' src='images/del.png' onclick='deleteTipoDocumento(\"" . $row["idtipo_documento"] . "\")'></td></tr>";
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
            print_r("Error al consultar el TipoDocumento: " . $e->getMessage() . "\n");
        }
    }

    public function updateTipoDocumento() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "UPDATE tipo_documento SET descripcion=:descripcion WHERE idtipo_documento=:idTipoDocumento";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":idTipoDocumento", $this->idTipoDocumento);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al actualizar la TipoDocumento: " . $e->getMessage() . "\n";
        }
    }

    public function deleteTipoDocumento() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "DELETE FROM tipo_documento WHERE idtipo_documento=:idTipoDocumento";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":idTipoDocumento", $this->idTipoDocumento);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al eliminar TipoDocumento: " . $e->getMessage() . "\n";
        }
    }

}

?>
