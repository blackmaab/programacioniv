<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Institucion
 *
 * @author malvarado
 */
include_once 'DataSource.class.php';

class Institucion extends DataSource {

    public $idInstitucion = null;
    public $descripcion;
    public $idNivelEstudio;
    public $idPais;
    public $idEstado;
    public $fijar;

    public function __construct() {
        $this->conexion(); //inicializa la conexion a la base de datos
        $this->conection->query("SET NAMES 'utf8'");
    }

    public function addInstitucion() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "INSERT INTO institucion VALUES('',:descripcion,:fk_nivelEstudio,:fk_pais,:fk_departamento)";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":fk_nivelEstudio", $this->idNivelEstudio);
            $this->resultSet->bindParam(":fk_pais", $this->idPais);
            $this->resultSet->bindParam(":fk_departamento", $this->idEstado);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al guardar el institucion: " . $e->getMessage() . "\n");
        }
    }

    public function searchInstitucion() {
        try {
            $this->sqlQuery = "SELECT a. * , b.descripcion AS pais, c.descripcion AS estado, d.descripcion AS nivel ";
            $this->sqlQuery.="FROM institucion AS a ";
            $this->sqlQuery.="INNER JOIN pais AS b ON a.fk_pais = b.idpais ";
            $this->sqlQuery.="INNER JOIN departamento_estado AS c ON a.fk_pais = c.fk_idPais ";
            $this->sqlQuery.="AND a.fk_departamento = c.iddepartamento_estado ";
            $this->sqlQuery.="INNER JOIN nivel_estudio AS d ON a.fk_nivelEstudio = d.idnivel_estudio ";
            $this->sqlQuery.="WHERE a.descripcion LIKE :descripcion ORDER BY a.descripcion ASC";

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
                echo "<th>Institucion</th>";
                echo "<th>Pais</th>";
                echo "<th>Departamento</th>";
                echo "<th>Nivel Estudio</th>";
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
                    echo "<td>" . $row["estado"] . "</td>";
                    echo "<td>" . $row["nivel"] . "</td>";
                    echo "<td align='center'><input type='image' src='images/edit.png' onclick='selInstitucion(\"" . $row["idinstitucion"] . "\",\"" . $row["descripcion"] . "\",\"" . $row["fk_pais"] . "\",\"" . $row["fk_departamento"] . "\",\"" . $row["fk_nivelEstudio"] . "\")'></td>";
                    echo "<td align='center'><input type='image' src='images/del.png' onclick='deleteInstitucion(\"" . $row["idinstitucion"] . "\")'></td></tr>";
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
            print_r("Error al consultar el institucion: " . $e->getMessage() . "\n");
        }
    }

    public function updateInstitucion() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "UPDATE institucion SET descripcion=:descripcion,fk_nivelEstudio=:fk_nivelEstudio,fk_pais=:fk_pais,fk_departamento=:fk_departamento WHERE idinstitucion=:idinstitucion";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":fk_nivelEstudio", $this->idNivelEstudio);
            $this->resultSet->bindParam(":fk_pais", $this->idPais);
            $this->resultSet->bindParam(":fk_departamento", $this->idEstado);
            $this->resultSet->bindParam(":idinstitucion", $this->idInstitucion);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al actualizar la institucion: " . $e->getMessage() . "\n";
        }
    }

    public function deleteInstitucion() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "DELETE FROM institucion WHERE idinstitucion=:idinstitucion";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":idinstitucion", $this->idInstitucion);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al eliminar institucion: " . $e->getMessage() . "\n";
        }
    }

    public function cargarComboInstitucion() {
        try {

            $this->sqlQuery = "SELECT * FROM institucion ORDER BY descripcion ASC";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            //$this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $coicidencias = $this->resultSet->rowCount();
            if ($coicidencias > 0) {
                $seleccionar = "";
                echo "<option value='-'>Elija una institucion</option>";
                while ($row = $this->resultSet->fetch(PDO::FETCH_ASSOC)) {
                    if ($this->fijar == $row["idinstitucion"]) {
                        $seleccionar = "selected='selected'";
                    }
                    echo "<option value='" . $row["idinstitucion"] . "' " . $selecionar . ">" . $row["descripcion"] . "</option>";
                    $seleccionar = "";
                }
            } else {
                echo "<option value='-'>No hay datos</option>";
            }


            $this->borrarCache();
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al cargar la institucion: " . $e->getMessage() . "\n");
        }
    }

}

?>
