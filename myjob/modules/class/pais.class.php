<?php

/**
 * Nombre de Archivo: pais.class.php
 * Fecha Creación: 11-08-2012 
 * Hora: 08:17:20 PM
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

    public function updateGaleria() {
        try {
            $this->conection->beginTransaction();
            $this->sqlQuery = "UPDATE galeria SET estado=:estado,id_galeria_usuario=:usuario WHERE idgaleria=:id";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":estado", $this->estado);
            $this->resultSet->bindParam(":usuario", $this->usuario);
            $this->resultSet->bindParam(":id", $this->id);
            $this->resultSet->execute();
            $this->conection->commit();
            $this->borrarCache();
            echo "true";
        } catch (PDOException $e) {
            $this->borrarCache();
            $this->conection->rollBack();
            echo "Error al actualizar la galeria: " . $e->getMessage() . "\n";
        }
    }

    public function searchPais() {
        try {

            $this->sqlQuery = "SELECT * FROM pais WHERE descripcion like :descripcion";
            $this->resultSet = $this->conection->prepare($this->sqlQuery);
            $this->resultSet->bindParam(":descripcion", $this->descripcion);
            $this->resultSet->execute();
            $coicidencias=$this->resultSet->rowCount();
//            echo "Coicidencias: ".$coicidencias;
// $dato = "[ \"Choice1\", \"Choice2\" ]";
            $dato = "";
            while ($row = $this->resultSet->fetch(PDO::FETCH_ASSOC)) {
                $dato.="[ \"Choice1\", \"Choice2\" ]";
                //echo "<option value='" . $row->idpais . "'>" . $row->descripcion . "</option>";
            }


            $this->borrarCache();
            echo $dato;
        } catch (PDOException $e) {
            $this->borrarCache();
            //$this->conection->rollBack();
            print_r("Error al consultar el pais: " . $e->getMessage() . "\n");
        }
    }

}

?>
