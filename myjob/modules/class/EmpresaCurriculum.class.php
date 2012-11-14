<?

/**
 * Description of EmpresaCurriculum
 *
 * @author malvarado
 */
include_once 'DataSource.class.php';

class EmpresaCurriculum extends DataSource {

    //Código Fuente

    public $idEmpresaCurriculum = null;
    public $descripcion;

    public function __construct() {
        $this->conexion(); //inicializa la conexion a la base de datos
        $this->conection->query("SET NAMES 'utf8'");
    }

    public function addEmpresaCurriculum() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "INSERT INTO catalogo_empresa_curriculum VALUES('',:descripcion)";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al guardar el EmpresaCurriculum: " . $e->getMessage() . "\n");
        }
    }

    public function searchEmpresaCurriculum() {
        try {

            $this->sqlQuery = "SELECT * FROM catalogo_empresa_curriculum WHERE descripcion like :descripcion";
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
                    echo "<td align='center'><input type='image' src='images/edit.png' onclick='selEmpresaCurriculum(\"" . $row["idcatalogo_empresa_curriculum"] . "\",\"" . $row["descripcion"] . "\")'></td>";
                    echo "<td align='center'><input type='image' src='images/del.png' onclick='deleteEmpresaCurriculum(\"" . $row["idcatalogo_empresa_curriculum"] . "\")'></td></tr>";
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
            print_r("Error al consultar el EmpresaCurriculum: " . $e->getMessage() . "\n");
        }
    }

    public function updateEmpresaCurriculum() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "UPDATE catalogo_empresa_curriculum SET descripcion=:descripcion WHERE idcatalogo_empresa_curriculum=:idEmpresaCurriculum";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->bindParam(":idEmpresaCurriculum", $this->idEmpresaCurriculum);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al actualizar la EmpresaCurriculum: " . $e->getMessage() . "\n";
        }
    }

    public function deleteEmpresaCurriculum() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "DELETE FROM catalogo_empresa_curriculum WHERE idcatalogo_empresa_curriculum=:idEmpresaCurriculum";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":idEmpresaCurriculum", $this->idEmpresaCurriculum);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al eliminar EmpresaCurriculum: " . $e->getMessage() . "\n";
        }
    }

}

?>
