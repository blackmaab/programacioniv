<?php

/**
 * Nombre de Archivo: pais.procedure.php
 * Fecha Creación: 11-08-2012 
 * Hora: 09:05:22 PM
 * @author Mario Alvarado
 */
if (isset($_POST["txtType"])) {
    if ($_POST["txtType"] == "add") {
        if (isset($_POST["txtPais"])) {
            include_once '../class/Pais.class.php';
            $newPais = new Pais();
            $newPais->descripcion = strtoupper($_POST["txtPais"]);
            $newPais->addPais();
        } else if ($_POST["txtType"] == "search") {
            
        }
    }
}
include_once '../class/Pais.class.php';
$pais = new Pais();
////$pais->descripcion="EL SALVADO%";
$pais->descripcion=  strtoupper($_GET["term"])+"%";

$pais->searchPais();
//echo "[\"Choice1\", \"Choice2\"]";
/*$var=$_GET["term"];
echo '["Mario","'+$var+'"]';*/
?>
