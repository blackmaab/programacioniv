<?php

include_once '../class/Carrera.class.php';
$newCarrera = new Carrera();
if (isset($_POST["txtType"])) {
    if ($_POST["txtType"] == "add") {
        $newCarrera->idInstitucion = $_POST["selCarreraInstitucion"];
        $newCarrera->descripcion = strtoupper($_POST["txtCarrera"]);
        $newCarrera->addCarrera();
    } else if ($_POST["txtType"] == "search") {
        $newCarrera->descripcion = strtoupper($_POST["txtCarrera"]) . "%";
        $newCarrera->searchCarrera();
    } else if ($_POST["txtType"] == "update") {
        $newCarrera->idCarrera = $_POST["txtIdCarrera"];
        $newCarrera->descripcion = strtoupper($_POST["txtCarrera"]);
        $newCarrera->idInstitucion = $_POST["selCarreraInstitucion"];
        $newCarrera->updateCarrera();
    } else if ($_POST["txtType"] == "delete") {
        $newCarrera->idCarrera = $_POST["txtIdCarrera"];
        $newCarrera->deleteCarrera();
    } else if ($_POST["txtType"] == "cargar") {
        //$newCarrera->idCarrera = $_POST["txtIdCarrera"];
        $newCarrera->cargarComboCarrera();
    }
}
?>
