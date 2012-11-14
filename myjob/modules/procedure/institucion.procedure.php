<?php

include_once '../class/Institucion.class.php';
$newInstitucion = new Institucion();
if (isset($_POST["txtType"])) {
    if ($_POST["txtType"] == "add") {
        $newInstitucion->descripcion = strtoupper($_POST["txtInstitucion"]);
        $newInstitucion->idPais = $_POST["selPaisInstitucion"];
        $newInstitucion->idEstado = $_POST["selEstadoInstitucion"];
        $newInstitucion->idNivelEstudio = $_POST["selNivelEstudioInstitucion"];
        $newInstitucion->addInstitucion();
    } else if ($_POST["txtType"] == "search") {
        $newInstitucion->descripcion = strtoupper($_POST["txtInstitucion"]) . "%";
        $newInstitucion->searchInstitucion();
    } else if ($_POST["txtType"] == "update") {
        $newInstitucion->idInstitucion = $_POST["txtIdInstitucion"];
        $newInstitucion->descripcion = strtoupper($_POST["txtInstitucion"]);
        $newInstitucion->idPais = $_POST["selPaisInstitucion"];
        $newInstitucion->idEstado = $_POST["selEstadoInstitucion"];
        $newInstitucion->idNivelEstudio = $_POST["selNivelEstudioInstitucion"];
        $newInstitucion->updateInstitucion();
    } else if ($_POST["txtType"] == "delete") {
        $newInstitucion->idInstitucion = $_POST["txtIdInstitucion"];
        $newInstitucion->deleteInstitucion();
    } else if ($_POST["txtType"] == "cargar") {
        //$newInstitucion->idInstitucion = $_POST["txtIdInstitucion"];
        $newInstitucion->fijar = $_POST["txtFijar"];
        $newInstitucion->cargarComboInstitucion();
    }
}
?>
