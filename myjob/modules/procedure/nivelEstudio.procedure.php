<?php

/**
 * Nombre de Archivo: nivelEstudio.procedure.php 
 * @author Mario Alvarado
 */

include_once '../class/NivelEstudio.class.php';
$newNivelEstudio = new NivelEstudio();
if (isset($_POST["txtType"])) {
    if ($_POST["txtType"] == "add") {        
            $newNivelEstudio->descripcion = strtoupper($_POST["txtNivelEstudio"]);
            $newNivelEstudio->addNivelEstudio();        
    } else if ($_POST["txtType"] == "search") {
        $newNivelEstudio->descripcion = strtoupper($_POST["txtNivelEstudio"]) . "%";
        $newNivelEstudio->searchNivelEstudio();
    } else if ($_POST["txtType"] == "update") {
        $newNivelEstudio->idNivelEstudio = $_POST["txtIdNivelEstudio"];
        $newNivelEstudio->descripcion = strtoupper($_POST["txtNivelEstudio"]);
        $newNivelEstudio->updateNivelEstudio();
    } else if ($_POST["txtType"] == "delete") {
        $newNivelEstudio->idNivelEstudio = $_POST["txtIdNivelEstudio"];
        $newNivelEstudio->deleteNivelEstudio();
    }
}
?>
