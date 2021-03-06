<?php

class MyJob {

    //constructor
    function MyJob() {

    }
    function setName2(){
		$con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SET NAMES 'utf8'";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta

        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
 else
            return false;
        unset($dbh);
        unset($query);
	}

    function consultar_paises() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM pais";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        //$query->bindParam(":Usuario",$campos[0]);
        //$query->bindParam(":Pwd",$campos[1]);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
 		else
            return false;
        unset($dbh);
        unset($query);
    }
    function guardar_dep_estado($campos) {
        $con = new DBManager();
        $dbh = $con->conectar("mysql");
        $sql = "INSERT INTO depatarmento_estado VALUES ('',:Descripcion,:Pais)";
        $add = $dbh->prepare($sql);
        $add->bindParam(":Pais",$campos[0]);
        $add->bindParam(":Descripcion",$campos[1]);
        $add->execute();
        if ($add)
           return true;
        else
           return false;
        unset($dbh);
        unset($add);
    }
		
    function actualizar_noticia($campos) {
        $con = new DBManager();
        $dbh = $con->conectar("mysql");
        $sql = "UPDATE noticia SET Titular=:Titular,Resumen=:Resumen,Observacion=:Obser,Link=:Link,Fecha=:Fecha,Seccion=:Seccion,idMedioComunicacion=:idMedio,FechaProcesamiento=:FechaProc,Clasificacion=:Evaluacion where idNoticia=:idN)";
        echo $sql."<br>";
        $add = $dbh->prepare($sql);
        $add->bindParam(":idN",$campos[6]);
        $add->bindParam(":Titular",$campos[0]);
        $add->bindParam(":Resumen",$campos[1]);
        $add->bindParam(":Obser",$campos[2]);
        $add->bindParam(":Link",$campos[3]);
        $add->bindParam(":Fecha",$campos[4]);
        $add->bindParam(":Seccion",$campos[8]);
        $add->bindParam(":idMedio",$campos[5]);
        $add->bindParam(":FechaProc",$campos[7]);
        $add->bindParam(":Evaluacion",$campos[9]);
        $add->execute();
        if ($add)
           return true;
        else
           return false;
        unset($dbh);
        unset($add);
    }
	/************************************************************************/
	function borrar_periodista($id) {
        $con = new DBManager();
        $dbh = $con->conectar("mysql");
        $sql = "DELETE FROM noticia_periodista WHERE idNoticia=:id";
        $borrar = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $borrar->bindParam(':id', $id); // Pasamos los parametros para el where
        $borrar->execute();
        
        if ($borrar)
            return true;
        else
            return false;
        unset($dbh);
        unset($borrar);
    } 
    
    
    
}

?>
