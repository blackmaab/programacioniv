<?php

/**
 * Description of Estado
 *
 * @author malvarado
 */
include_once 'DataSource.class.php';

class Estado extends DataSource {

    //Código Fuente

    public $idEstado = null;
    public $descripcion;
    public $idPais;
    public $fijar;

    public function __construct() {
        $this->conexion(); //inicializa la conexion a la base de datos
        $this->conection->query("SET NAMES 'utf8'");
    }

    public function addEstado() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "INSERT INTO departamento_estado VALUES('',:descripcion,:fk_idPais)";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":fk_idPais", $this->idPais);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al guardar el Estado: " . $e->getMessage() . "\n");
        }
    }

    public function searchEstado() {
        try {
            $this->sqlQuery = "SELECT  a.*,b.descripcion as pais from departamento_estado as a inner join pais as b on ";
            $this->sqlQuery.=" a.fk_idPais = b.idpais where a.descripcion like :descripcion";
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
                echo "<th>Departamento / Estado</th>";
                echo "<th>Pais</th>";
                echo "<th>Editar</th>";
                echo "<th>Eliminar</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $cont = 1;
                while ($row = $this->resultSet->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td><b>" . ($cont++) . "</b></td>";
                    echo "<td>" . $row["descripcion"] . "</td>";
                    echo "<td>" . $row["pais"] . "</td>";
                    echo "<td align='center'><input type='image' src='images/edit.png' onclick='selEstado(\"" . $row["iddepartamento_estado"] . "\",\"" . $row["descripcion"] . "\",\"" . $row["fk_idPais"] . "\")'></td>";
                    echo "<td align='center'><input type='image' src='images/del.png' onclick='deleteEstado(\"" . $row["iddepartamento_estado"] . "\")'></td></tr>";
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
            print_r("Error al consultar el Estado: " . $e->getMessage() . "\n");
        }
    }

    public function updateEstado() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "UPDATE departamento_estado SET descripcion=:descripcion, fk_idPais=:fk_idPais WHERE iddepartamento_estado=:idEstado";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":fk_idPais", $this->idPais);
            $this->resultSet->bindParam(":idEstado", $this->idEstado);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al actualizar la Estado: " . $e->getMessage() . "\n";
        }
    }

    public function deleteEstado() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "DELETE FROM departamento_estado WHERE iddepartamento_estado=:idEstado";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":idEstado", $this->idEstado);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al eliminar Estado: " . $e->getMessage() . "\n";
        }
    }

    public function cargarComboEstado() {
        try {

            $this->sqlQuery = "SELECT * FROM departamento_estado WHERE fk_idPais=:fk_idPais ORDER BY descripcion ASC";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":fk_idPais", $this->idPais);
            $this->resultSet->execute();
            $coicidencias = $this->resultSet->rowCount();
            $seleccionar = "";
            if ($coicidencias > 0) {
                echo "<option value='-'>Elija un estado</option>";
                while ($row = $this->resultSet->fetch(PDO::FETCH_ASSOC)) {
                    if ($this->fijar == $row["iddepartamento_estado"]) {
                        $seleccionar = "selected='selected'";
                    }
                    echo "<option value='" . $row["iddepartamento_estado"] . "' " . $seleccionar . ">" . $row["descripcion"] . "</option>";
                }
            } else {
                echo "<option value='-'>No hay datos-" . $this->idPais . "</option>";
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
